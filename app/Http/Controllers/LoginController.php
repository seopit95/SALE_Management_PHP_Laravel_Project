<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class LoginController extends Controller
{
   
    public function check()
    {
        $uid = request('uid');
        $pwd = request('pwd');

        $row = Member::where('uid','=', $uid)->
                       where('pwd','=', $pwd)->first();
        
        if($row)
        {
            session()->put('uid', $row->uid);
            session()->put('name', $row->name);
            session()->put('rank', $row->rank);
        }

        return view('index');
    }

    public function logout()
    {

        session()->forget('uid');
        session()->forget('rank');
        session()->forget('name');

        return view('index');
    }
}