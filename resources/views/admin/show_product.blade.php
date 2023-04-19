<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
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
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))

              <div class="alert alert-success">
                {{session()->get('message')}}
              </div>
              @endif
            <div class="div_center">
            <div class="h2font">All Products</div>
    </div>
    <table class="table table-bordered text-center">
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Catagory</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Image</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                      @foreach($data as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->catagory}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->discount_price}}</td>
                    <td>
                        <img src="/product/{{$data->image}}" alt="">
                    </td>
                    <td><a onclick="return confirm('Are You Sure To Delete')"href="{{route('delete',$data->id)}}"class="btn btn-danger">Delete</a></td>
                    <td><a href="{{route('update',$data->id)}}"class="btn btn-success">Update</a></td>
                    </tr>
                    @endforeach
    </table>

</body>
</html>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>