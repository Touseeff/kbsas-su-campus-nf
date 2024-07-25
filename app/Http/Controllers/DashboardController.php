<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(){
        // echo "testing";
    //    echo $user_id = Session::get('user_id');

    //    $data = User::where('id', $user_id)->get();
    //  echo"<pre>";
    //    print_r($row->toArray());
        // die;
        // return view('back-end.view-profile',compact('data'));
        return view('back-end.index');
    }
}
