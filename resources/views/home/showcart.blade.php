<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .center{
            margin: auto;
            width: 50%;
            padding: 30px;

        }
        table,th,td{
            border: 1px solid grey;
        }
        .th_deg{
            font: size 30px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg{
            height: 100px;
            width: 100px;
        }
        .total_deg{
            font-size: 20px;
            padding: 20px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))

          <div class="alert alert-success">
             {{session()->get('message')}}
          </div>
         @endif

      <div>
      <table class="center">
                    <tr>
                    
                      <th class="th_deg">Product Title</th>
                      <th class="th_deg">Product Quantity</th>
                      <th class="th_deg">Price $</th>
                      <th class="th_deg">Image</th>
                      <th class="th_deg">Action</th>
                    </tr>
                    <?php $totalprice=0;?>
                  @foreach($cart as $cart)
                    <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                    <img src="/product/{{$cart->image}}" alt=""class="img_deg">
                    </td>
                    <td>
                     <a onclick="return confirm('Are You Sure To Delete')"href="{{url('delete_cart',$cart->id)}}"class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    <?php $totalprice=$totalprice + $cart->price ?>
                  @endforeach 
                  
    </table>
    <div>
        <h1 class="total_deg"><b>Total Price :$.{{$totalprice}}</b></h1>
        <h1  class="total_deg"><b>Proced To Oder</b></h1>
      <a href="{{url('cash_order')}}"class="btn btn-danger mx-2">Cash On Delivery</a>
      <a href="{{url('stripe',$totalprice)}}"class="btn btn-danger">Pay Using Cart</a>
      </div>
   </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/custom.js"></script>
   </body>
</html>