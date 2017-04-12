<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;

class PagesController extends Controller{

    public function getIndex(){
        $posts=Post::orderBy('created_at','desc')->limit(4)->get();

        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
        $fist='Burak';
        $last='Yıldız';

        $fullname=$fist." ".$last;
        $email='burakyildiz@gmail.com';
        $data=[];
        $data['email']=$email;
        $data['fullname']=$fullname;

        return view('pages.about',array('email'=>$email,'fullname'=>$fullname));
        //return view('pages.about')->withData($data);
        //return view('pages.about')->withFullname($fullname)->withEmail($email);
       // return view('pages.about')->with('fullname',$fullname); Tek veri gönderiyor
    }

    public function getContact(){
        return view('pages.contact');
    }

}