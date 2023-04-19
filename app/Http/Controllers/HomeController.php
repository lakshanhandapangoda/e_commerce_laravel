<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\facades\Auth;
use App\models\user;
use App\models\product;
use App\models\Cart;
use App\models\Order;
use App\models\Comment;
use App\models\Reply;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        $product=Product::paginate(12);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        //dd($product);
        return view('home.userpage',compact('product','comment','reply'));
    }
    public function redirect(){

        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();

            $total_revenue=0;
            foreach($order as $order){
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

        }else{
            return view('home.userpage');
        }
    }

    public function product_details($id){
        $product=Product::find($id);
        return view('home.product_details',compact('product'));
    }
    
    //did users login?befor add to cart
    public function add_cart(Request $request,$id){
        if(auth::id()){
            $user=auth::user();
            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;
            $cart->price=$product->price * $request->quantity;
            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;

            $cart->save();
            Alert::success('Product Added Successfully','We have added product to the cart');

            return redirect()->back();
            

            //dd( $data);
            //return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function show_cart(){

        if(auth::id()){
            $id=auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }else{
            return redirect('login');
        }
        
    }

    public function delete_cart($id){
           $cart=cart::find($id);
           $cart->delete();
           
           return redirect()->back()->with('message','product Deleted Successfully' );
    }
    public function cash_order(){
           $user=Auth::user();
           $userid=$user->id;
           $data=cart::where('user_id','=',$userid)->get();

           foreach($data as $data){

            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivare';
            $order->delivery_status='processing';

            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


           }
           return redirect()->back()->with('message','We Have Reqceived Your Order.We Will Connect With You Soon...' );
    }

    public function stripe($totalprice){
            return view('home.stripe',compact('totalprice'));
    }
    
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Tethnaks For Payment." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data){

         $order=new order;

         $order->name=$data->name;
         $order->email=$data->email;
         $order->phone=$data->phone;
         $order->address=$data->address;
         $order->user_id=$data->user_id;
         $order->product_title=$data->product_title;
         $order->price=$data->price;
         $order->quantity=$data->quantity;
         $order->image=$data->image;
         $order->product_id=$data->product_id;

         $order->payment_status='paied';
         $order->delivery_status='processing';

         $order->save();
         $cart_id=$data->id;
         $cart=cart::find($cart_id);
         $cart->delete();


        }
      
        Session::flash('success', 'Payment successful!');

        return back();
              
    }

    public function show_order(){
        if(auth::id()){
            $user=auth::user()->id;
            
            $order=order::where('user_id','=',$user)->get();

            return view('home.order',compact('order'));
        }else{
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $cancel=order::find($id);
        $cancel->delivery_status='You canceled the order';
        $cancel->save();
        return redirect()->back()->with('message','order Deleted Successfully' );
    }

    public function add_comment(Request $request){
        if(auth::id()){
            $comment=new comment;

            $comment->name=auth::user()->name;
            $comment->user_id=auth::user()->id;
            $comment->comment=$request->comment;

            $comment->save();

            return redirect()->back();

        }else{
            return redirect('login');
        }
    }
    public function add_reply(Request $request){
        if(auth::id()){
          $reply=new reply;

          $reply->name=auth::user()->name;
          $reply->user_id=auth::user()->id;
          $reply->comment_id=$request->commentId;
          $reply->reply=$request->reply;

          $reply->save();
          return redirect()->back();


        }else{
            return redirect('login');
        }
    }

    public function product_search(Request $request){

        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();

        $searchText=$request->search;
        $product=product::where('title','LIKE',"%$searchText%")->OrWhere('catagory','LIKE',"%$searchText%")->paginate(12);
        return view('home.userpage',compact('product','comment','reply'));
    }
    public function products(){
        $product=Product::paginate(12);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.all_product',compact('product','comment','reply'));
    }
    
}