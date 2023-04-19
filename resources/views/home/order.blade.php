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
            height: 80px;
            width: 100px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      <div>
      <table class="center">
                    <tr>
                    
                      <th class="th_deg">Product Title</th>
                      <th class="th_deg">Product Quantity</th>
                      <th class="th_deg">Price $</th>
                      <th class="th_deg">Payment Status</th>
                      <th class="th_deg">Delivery Status</th>
                      <th class="th_deg">Image</th>
                      <th class="th_deg">Cancel Order</th>
                    </tr>
@foreach($order as $order)
                    <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="/product/{{$order->image}}" alt=""class="img_deg">
                    </td>

                <td>
                @if($order->delivery_status=='processing')
                    <a onclick="return confirm('Are You Sure To Cancel')"href="{{url('cancel_order',$order->id)}}"class="btn btn-danger">Cancel Order</a>
                    @else
                    <p style="color: blue;">Not Allowed</p>
                @endif
                </td>
              </tr>
             
@endforeach
                    
                  
    </table>
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