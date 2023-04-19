<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sort;
use Response;

class AjaxController extends Controller
{
   
    public function index()
    {
        $data['tmp'] = $this->qstring();

        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);
        return view('ajax.index', $data);
    }
    
    public function getlist($text1)
    {
        $result = DB::table("sorts")->where('name', 'like', '%'.$text1.'%')->orderby('name', 'asc')->paginate(5)->appends(['text1'=>$text1]);
        if($text1==""){
            $result = DB::table("sorts")->paginate(5)->appends(['text1'=>$text1]);
        }
        return $result;
    }

    public function store(Request $request)
    {
        $row = new sort;
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return response()->json($row);
    }

    public function update(Request $request, $id)
    {
        $row = Sort::find($id);
        $this->save_row($request, $row);
    }

    public function destroy($id)
    {
        Sort::find($id)->delete();
    }
    
    public function save_row(Request $request, $row)
    {
        $request->validate([
            'name' => 'required | max:20'
        ],
        [
            'name.required'  => '이름은 필수입력입니다.',
            'name.max'       => '20자 이내로 입력해주세요.'
        ]);

        $row->name = $request->input('name');

        $row->save();
    }

    public function qstring()
    {
        $text1 = request("text1") ? request('text1') : "";
        $page = request('page') ? request('page') : "1";

        $tmp = $text1 ? "?text1 = $text1&page=$page" : "?page=$page";

        return $tmp;
    }
}