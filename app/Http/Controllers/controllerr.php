<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerr extends Controller
{
    //


    function index(){
        return view('welcome');
    }

    function contact(){
        return 'contact page';
    }

    function print_salution_with_name($salutation,$name){

        return $salutation.' '.$name;
   }
}
