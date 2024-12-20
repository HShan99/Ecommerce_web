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
     <link rel="shortcut icon" href="home/images/favicon.png" type="">
     <title>Famms - Fashion HTML Template</title>
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
     <!-- font awesome style -->
     <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
     <!-- Custom styles for this template -->
     <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
     <!-- responsive style -->
     <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <style>
        .table-content{
            padding-top: 50px;
            padding-left: 250px;
            width: 90%;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">

        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->



        <div class="table-content">
            @if (@session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{@session()->get('message')}}
                </div>
            @endif

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($showSpecificOrder as $showSpecificOrder )
                        <tr>
                            <th scope="row">{{$showSpecificOrder->product_title}}</th>
                            <td>{{$showSpecificOrder->quality}}</td>
                            <td>{{$showSpecificOrder->price}}</td>
                            <td>{{$showSpecificOrder->payment_status}}</td>
                            <td>{{$showSpecificOrder->delivery_status}}</td>
                            <td><img src="/product/{{$showSpecificOrder->image}}" width="40" height="40" alt="" style="border-radius: 50%; object-fit: cover;"></td>
                            <td><a href="{{url('cancel_order',$showSpecificOrder->id)}}" class="btn btn-danger"
                                onclick="return confirm('Are you sure to cancel this Order ?')">Cancel Order</a></td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>




      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
