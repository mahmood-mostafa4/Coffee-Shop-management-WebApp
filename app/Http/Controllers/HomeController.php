<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\User\BookingReview;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::select()->orderBy('id' , 'desc')->take('4')->get();

        $reviews = BookingReview::select()->orderBy('id' , 'desc')->take('5')->get();

        return view('home' , compact('products' , 'reviews'));
    }

    public function services(){
        return view('others.services');
        }
    public function about_us(){
        return view('others.about');
        }
    public function contact_us(){
        return view('others.contact');
        }

}
