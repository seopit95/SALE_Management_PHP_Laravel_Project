<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\sort;

class FindproductController extends Controller
{
   
    public function index(Request $request)
    {
        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);
        return view('findproduct.index', $data);
    }
    
    public function getlist($text1)
    {
        $result = Product::leftjoin('sorts','products.sort_id','=','sorts.id')->
            select('products.*','sorts.name as sorts_name')->
            where('products.name','like','%'.$text1.'%')->
            orderby('products.name','asc')->paginate(5)->
            appends(['text1'=>$text1]);

        return $result;
    }   
}