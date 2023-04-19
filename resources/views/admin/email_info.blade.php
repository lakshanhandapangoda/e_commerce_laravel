<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
     
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 style="text-align: center; font-size: 25px;">Send Email To {{$order->email}}</h1>
    @if(session()->has('message'))

    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
    @endif

                <form action="{{url('send_user_email',$order->id)}}"method="post">
                    @csrf
                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email Greeting :</label>
                   <input type="text"name="greeting"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email FirstLing :</label>
                   <input type="text"name="firstling"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email Body :</label>
                   <input type="text"name="body"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email Button Name :</label>
                   <input type="text"name="button"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email Url :</label>
                   <input type="text"name="url"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <label>Email Last Line :</label>
                   <input type="text"name="lastline"style="color: black;">
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                   <input type="submit" value="Send Email"class="btn btn-primary"style="color: black;">
                </div>
                </form>
            </div>
        </div>
    <!-- plugins:js -->
      @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
