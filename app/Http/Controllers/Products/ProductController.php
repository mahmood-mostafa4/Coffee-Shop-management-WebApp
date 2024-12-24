<?php

namespace App\Http\Controllers\Products;

use App\Models\Product\Cart;
use Illuminate\Http\Request;
use App\Models\product\Order;
use App\Models\product\Booking;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function single_product($id)
    {

        if (isset(Auth::user()->id)) {
            $product = Product::find($id);

            $related_products = Product::where('category' , $product->category)
            ->where('id', '!=', $product->id)->take('4')->orderBy('id' , 'desc')->get();

            // check if the product is already added to the cart

            $checking_the_cart = Cart::where('product_id' , $id)
            ->where('user_id' , Auth::user()->id)
            ->count();

            return view('products/single_product' , compact('product' , 'related_products' , 'checking_the_cart' ));
        } else {
            $product = Product::find($id);

            $related_products = Product::where('category' , $product->category)
            ->where('id', '!=', $product->id)->take('4')->orderBy('id' , 'desc')->get();
            $checking_the_cart = 0;
            return view('products/single_product' , compact('product' , 'related_products' , 'checking_the_cart' ));

        }


    }

    public function add_to_cart(Request $request , $id)
    {
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
        ]);

        return Redirect::route('single_product' , $id)->with(['message'=> 'item is added successfully']);

    }



    public function cart()
    {
        $cart = Cart::where('user_id' , Auth::user()->id)
        ->orderBy('id' , 'desc')
        ->get();

        // Calculate the total price of the cart items

        $cart_total = Cart::where('user_id' , Auth::user()->id)
        ->sum('price');



        return view('products/cart' , compact('cart' , 'cart_total'));
    }

    public function remove_from_cart(Request $request)
    {
        // Find the cart item based on the user's ID and the product's ID
        $cart_item = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        // If the cart item exists, delete it
        if ($cart_item) {
            $cart_item->delete();
            return Redirect::route('cart')->with(['message' => 'Item removed successfully']);
        } else {
            return Redirect::route('cart')->with(['error' => 'Item not found in the cart']);
        }
    }


    public function prepare_checkout(Request $request)
    {
        $value = $request->price;
        $price = Session::put('price' , $value);
        $new_price = Session::get($price);

        if ($new_price > 0) {
        return Redirect::route('checkout');
        }
    }

    public function checkout()
    {
        return view('products/checkout');
    }

    public function process_checkout(Request $request)
    {
        $cart = Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'email' => $request->email,
            'price' => $request->price,
            'user_id' => Auth::user()->id,
            'status' => 'processing'
        ]);

        return view('products/pay');
    }

    public function payment_success(){


        // Clear the cart after payment
        $delete_items = Cart::where('user_id', Auth::user()->id);
        $delete_items->delete();

        if ($delete_items) {
            Session::forget('price');
        return view('products/payment_success');
        }

    }

    public function booking_tables(Request $request)
    {

    if ($request->date > date('n/j/Y'))  {

        Request()->validate([
            'first_name' =>'required|max:30',
            'last_name' =>'required|max:30',
            'date' =>'required',
            'time' =>'required',
            'phone' =>'required|numeric',
           'message' =>'required'
        ]);

    $book_table = Booking::create([
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'date' => $request->date,
    'time' => $request->time,
    'phone' => $request->phone,
    'message' => $request->message,
    'status' => 'processing',
    'user_id' => Auth::user()->id,
    ]);
    if ($book_table) {
        return Redirect::route('home')->with('message' , 'your booking request has been submitted successfully');
    }
    } else {

    return Redirect::route('home')->with('message' , 'choose a valid date');
     }

}

public function menu()
{
    $drinks = Product::select()->where('category' , 'drinks')->orderBy('id' , 'desc')->take(8)->get();

    $deserts = Product::select()->where('category' , 'deserts')->orderBy('id' , 'desc')->take(8)->get();

    return view('products/menu' , compact('drinks' , 'deserts'));
}



}
