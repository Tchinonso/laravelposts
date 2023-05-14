<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = "ok, i have changed name";
        // first method of passing item to out pages
        // return view('pages.index',compact('title'));

        // second method of passing item to out pages
        return view('pages.index') -> with ('title' , $title);
    }

    public function about(){
        $title = "About us";
        // first method of passing item to out pages
        // return view('pages.index',compact('title'));

        // second method of passing item to out pages
        return view('pages.about') -> with ('title' , $title);
    }

    public function services(){
        // $title = "our services";
        // first method of passing item to out pages
        // return view('pages.index',compact('title'));

        // second method of passing item to out pages
        // return view('pages.services') -> with ('title' , $title);

        //you can also parse muliple item like array
        $data = array(
            'title' => 'our services',
            'services' => ['web ', 'app ', 'cloud ']
        );
        return view('pages.services') -> with ($data);
    }
}
