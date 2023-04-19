<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\support\Facades\validator;
use illuminate\support\facades\Auth;

class AdminController extends Controller
{

    public function add_catagory(Request $request){

    
        $data=new catagory;
        $data->catagory_name=$request->catagory_name;
        $data->save();
       
        return redirect()->back()->with('message','Catagory Added Successfully');

    }

    public function view_catagory(){
        $data=Catagory::all();

        return view('admin.catagory',compact('data'));
    } 

    public function delete_catagory($id){
        $data=Catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Ctagory Deleted Successfully' );
    }

    public function view_product(){
        if(auth::user()){
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));
    }else{
        return redirect('login');
    }
    
    }
    
    public function add_product(Request $request){
        $product=new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount;
        $product->catagory=$request->catagory;
        
        //image uploded functions
        $image=$request->image;
        $imageName=time().'.'.$request->image->extension();
        $request->image->move('product',$imageName);

        $product->image=$imageName;

        $product->save();
        return redirect()->back()->with('message','product Added Successfully');
        
    }
    
    public function show_product(){
        $data=product::all();
        return view('admin.show_product',compact('data'));
    }

    public function delete_product($id){
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message','product Deleted Successfully' );
    }

    public function update_product($id){
        $data=product::find($id);
        $catagory=Catagory::all();
        return view('admin.update_product',compact('data','catagory'));
    }

    public function update_product_confirm(Request $request,$id){
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','product Updated Successfully');
    }

    public function order(){
        if(auth::user()){
        $order=order::all();
        return view('admin.order',compact('order'));
        }else{
            returnredirect('login');
        }
    }
    
    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back()->with('message','Are You Sure This Product Is Delivered!!!');

    }

    public function print_pdf($id){
        $order=order::find($id);
        $pdf=PDF::loadview('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }
    public function send_user_email(Request $request,$id){
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email Sending Successflly...' );
    }
    public function search(Request $request){
        $searchText=$request->search;
        //$order=order::where('name','LIKE',"%$searchText%")->get();
        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));
    }
    
}
