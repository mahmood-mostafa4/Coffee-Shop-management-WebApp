<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\product\Booking;
use App\Http\Controllers\Controller;
use App\Models\User\BookingReview;
use App\Models\User\OrderReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function user_orders_display()
    {
        $orders = Order::select()->where('user_id', Auth::user()->id)->orderBy('id' , 'desc')->get();

        return view('users/orders', compact('orders'));
    }
    public function user_bookings_display()
    {
        $bookings = Booking::select()->where('user_id', Auth::user()->id)->orderBy('id' , 'desc')->get();

        return view('users/bookings', compact( 'bookings'));
    }

    public function booking_review_view()
    {
        return view('users/booking_review');
    }

    public function booking_review(Request $request)
    {
        Request()->validate([
            'first_name' =>'required|max:30',
            'last_name' =>'required|max:30',
            'review' =>'required'
        ]);
        $review = BookingReview::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'review' => $request->review,
            'user_id' => Auth::user()->id
        ]);

        if ($review) {
            return Redirect::route('booking_review_view')->with('message' , 'Review was successfully Submitted');
        }
    }
    public function order_review_view()
    {
        return view('users/order_review');

    }
    public function order_review(Request $request)
    {
        Request()->validate([
            'first_name' =>'required|max:30',
            'last_name' =>'required|max:30',
            'review' =>'required'
        ]);
        $review = OrderReview::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'review' => $request->review,
            'user_id' => Auth::user()->id
        ]);

        if ($review) {
            return Redirect::route('order_review_view')->with('message' , 'Review was successfully Submitted');
        }
    }
}
