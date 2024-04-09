<?php

namespace App\Http\Controllers;

use Share;
use Illuminate\Http\Request;



class ShareButtonsController extends Controller
{
    public function share(){

        $data= [
            'title' => 'Laravel Share Buttons',
            'description' => 'This is a simple Laravel package to share content on social media',
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'

        ];

        $shareButtons = \Share::page(
            url('/blogpost'),
            'Here is the text',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->pinterest()
        ->reddit()
        ->telegram();

        return view('post.blogpost', compact('shareButtons'));


    }
        


}
