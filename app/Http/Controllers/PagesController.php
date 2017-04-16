<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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

    public function postContact(Request $request)
    {
        $this->validate($request,array(
            'email'=>'required|email',
            'subject'=>'required|min:3',
            'message'=>'required|min:10'
        ));
        $data=array(
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message,
        );

        Mail::send('emails.contact',$data,function ($message) use ($data){
            $message->from($data['email']);
            $message->to('info@burak.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your Email was Sent!');

        return redirect('/');
    }

}