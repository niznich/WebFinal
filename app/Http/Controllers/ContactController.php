<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UsersModel;

class ContactController extends Controller
{
    public function index(){
        $test=UsersModel::
            select('id', 'name','email')
                ->get();
        return view('contactteach',['users'=>$test]);
    }

}
