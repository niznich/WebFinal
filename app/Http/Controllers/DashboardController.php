<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {

        if(Auth::user()->hasRole('student')){
            return view('studentdash');
        }
        elseif(Auth::user()->hasRole('teacher')){
            return view('teacherdash');
        }

        elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
    
        } 
    
    }
    
    //STUDENT AREA
    public function myprofile()
    {
        return view('myprofile');
    }

    public function study()
    {
        return view('study');
    }

    public function learn()
    {
        return view('learn');
    }

    public function quiz()
    {
        return view('quiz');
    }

    public function contactteach()
    {
        return view('contactteach');
    }


    //TEACHERS AREA

    public function postcreate()
    {
        return view('postcreate');
    }



}