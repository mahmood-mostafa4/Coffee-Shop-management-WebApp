<?php

namespace App\Http\Controllers\admins;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\product\Booking;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login()
    {
        return view('admins.admin_login');
    }
    public function login_post(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('admin_dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }
    public function admin_dashboard()
    {
        $products = Product::count();
        $orders = Order::count();
        $bookings = Booking::count();
        $admins = Admin::count();
        return view('admins.admin_dashboard' , compact('products', 'orders', 'bookings' , 'admins'));
    }
    public function logout()
    {
    Auth::guard('admin')->logout();
    return redirect()->route('admin_login');
    }
    public function admin_admins()
    {
        $admins = Admin::all();
        return view('admins.admin_admins' , compact( 'admins'));
    }
    public function admin_orders()
    {
        $orders = Order::all();
        return view('admins.admin_orders' , compact( 'orders'));
    }
    public function admin_products()
    {
    $products = Product::all();
    return view('admins.admin_products' , compact( 'products'));
    }
    public function admin_bookings()
    {
    $bookings = Booking::all();
    return view('admins.admin_bookings' , compact( 'bookings'));
    }
    public function admin_products_create_view()
    {
        return view('admins.create.product');
    }
    public function admin_admins_create_view()
    {
        return view('admins.create.admin');
    }
    public function admin_bookings_status_view($id)
    {
        $booking = Booking::find($id);
        return view('admins.update.booking_status' , compact('booking'));
    }
    public function admin_orders_status_view($id)
    {
        $order = Order::find($id);
        return view('admins.update.order_status', compact('order'));
    }
    public function admin_bookings_status_update(Request $request , $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        if ($booking) {
            return Redirect::route('admin_bookings' , $id)->with(['message' => 'Status updated successfully']);
        }
    }
    public function admin_orders_status_update(Request $request , $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        if ($order) {
         return Redirect::route('admin_orders' , $id)->with(['message'=> 'Status updated successfully']);
        }
    }
    public function admin_products_create(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'description' =>'required',
            'category' =>'required',
            'image' =>'required',
        ]);

        $destinationPath = 'images';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
        
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $myimage,
        ]);

        if ($product) {
            return redirect()->route('admin_products')->with(['message' => 'Product created successfully']);
        }
    }
    public function admin_admins_create(Request $request)
    {
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
        ]);
        return redirect()->route('admin_admins');
    }
    public function admin_products_delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        if ($product) {
            return Redirect::route('admin_products')->with(['message' => 'Product deleted successfully']);
        }
    }
    public function admin_orders_delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        if ($order) {
            return Redirect::route('admin_orders')->with(['message' => 'Order deleted successfully']);
        }
    }
    public function admin_admins_delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        if ($admin) {
            return Redirect::route('admin_admins')->with(['message' => 'Admin deleted successfully']);
        }
    }
    public function admin_bookings_delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        if ($booking) {
            return Redirect::route('admin_bookings')->with(['message' => 'Booking deleted successfully']);
        }
    }
}
