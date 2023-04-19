<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
     
        
</style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <div class="main-panel">
            <div class="content-wrapper">
          
            <div class="div_center">
            <div class="h2font">All Orders</div>
            <div style="margin: auto; padding-bottom: 30px; color: black;">
              <form action="{{url('search')}}"method="get">
                @csrf
                <input type="text"name="search"placeholder="Search">
                <input type="submit"value="Search"class="btn btn-outline-primary">
              </form>
            </div>
    </div>
  
    <table class="table table-bordered text-center">
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Title</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>P_Status</th>
                      <th>D_Status</th>
                      <th>Image</th>
                      <th>Delivered</th>
                    </tr>
                @forelse($order as $order)
                    <tr>
                    <td>{{$order->name}}
                    <a href="{{url('print_pdf',$order->id)}}"class="btn btn-danger">Print PDF</a>
                    </td>
                    <td>{{$order->email}}
                      <a href="{{url('send_email',$order->id)}}"class="btn btn-info">Send Email</a>
                    </td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>$.{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="/product/{{$order->image}}" alt="">
                    </td>
                    <td>
                         @if($order->delivery_status=='processing')
                         <a onclick="return confirm('Are You Sure This Product Is Delevered!!!')"href="{{url('delivered',$order->id)}}"class="btn btn-primary">Delevered</a>
                        @else
                        <p>Delivered</p>
                        @endif
                    </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="16">No Data Found</td>
                    </tr>
                @endforelse

    </table>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
