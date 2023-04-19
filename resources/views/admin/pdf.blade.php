<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
</head>
<body>
    <h1>Oder Details</h1>

   Coustomer Name : <h3>{{$order->name}}</h3>
   Coustomer email : <h3>{{$order->email}}</h3>
   Coustomer address : <h3>{{$order->address}}</h3>
   Coustomer Id : <h3>{{$order->id}}</h3>
   Product Title : <h3>{{$order->product_title}}</h3>
   Product Price : <h3>$.{{$order->price}}</h3>
   Payment Status : <h3>{{$order->payment_status}}</h3>
   Product Id  : <h3>{{$order->product_id}}</h3>
   <br><br>
   <img height="250" width="450" src="product/{{$order->image}}" alt="">
    
</body>
</html>