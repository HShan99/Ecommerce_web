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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
   <body>

    @include('sweetalert::alert')

    <div class="hero_area">



        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->


      <div style= "width:85%; padding-left:250px; padding-top:70px">

        @if (@session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{@session()->get('message')}}
            </div>
        @endif

        <table class="table"  >
            <thead class="thead-light">
                {{-- thead-light thead-dark"--}}
              <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $totalPrice=0; ?>
                @foreach ( $cart as $cart )
                <tr>
                    <th scope="row">{{$cart->product_title}}</th>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td><img src="/product/{{$cart->image}}" alt="image" width="80px" height="80px"></td>
                    <td><a href="{{url('remove_cart_item',$cart->id)}}" onclick="confirmation(event)" class="btn btn-danger">Remove Product</a></td>
                  </tr>
                <?php $totalPrice += $cart->price ?>
                @endforeach
            </tbody>
          </table>

          <div style="background: rgb(238, 232, 232); margin-bottom:20px">
            <table class="table"  >
            <tr>
                <th scope="col" style="color: rgb(8, 1, 1)">Total Price </th>
                <th scope="col" style="color: rgb(8, 1, 1); text-align:right" >{{$totalPrice}}</th>
              </tr>
            </table>
          </div>

          <div style="padding-left:350px; padding-top:40px"">
            <h1 style="padding-left:80px; padding-bottom:10px">Proceed to Payment</h1>
            <a href="{{url('cash_order')}}" class="btn btn-primary">Cash on Delivery</a>
            <a href="{{url('stripe',$totalPrice)}}" class="btn btn-success">Card Payment</a>
          </div>

        </div>
      </div>


      <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

           Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
     </div>

     <script>
        function confirmation(event){
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to remove this product",
                text: "You will not be able to revers this!",
                icon: "warning",
                button: true,
                dangerModel: true,
            })
            .then((willCancel)=>{
                if(willCancel){
                    window.location.href = urlToRedirect;
                }
            });

        }
     </script>



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
