<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AddGallary;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Hostels;
use Illuminate\Http\Request;

class HostelsViewController extends Controller
{
    public function index(){
  $blog =       Blog::latest()->limit(5)->get();
        return view('frontend.index' , compact('blog'));
    }


    public function gallery(){

        $gallaries =  Gallery::all();
        return view('frontend.gallery' , ['gallaries' => $gallaries]);
    }



    public function contact(){
        return view('frontend.contact');
    }



    function blog(){
        return view('frontend.blog');
    }

    function blogdetail($id , $title)  {

      $blog =   Blog::find($id);


        return view('frontend.blogdetail' , compact('blog'));

    }


    function hostels()  {

   $hostels =      Hostels::all();
        return view('frontend.all-hostel' , compact('hostels'));

    }



    function hostelsdetail($id)  {

    $hostel =      Hostels::find($id);

        return view('frontend.hostel-detail' , compact('hostel'));

    }

    public function about(){

      $hostels=   Hostels::limit(8)->get();
      $blog=   Blog::limit(8)->get();
      
        return view('frontend.about', compact('hostels' , 'blog'));
            }




            function settings() {

                return view('Dashboard.websitesettings');

            }


}
