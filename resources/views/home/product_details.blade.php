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

        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
      </div>


         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px">

               <div class="img-box">
                  <img src="/product/{{$product_details->image}}" width="300" height="300" alt="">
               </div>
               <div class="detail-box">

                {{$product_details->title}}

                  @if ($product_details->discount_price!=null)
                       <h6 style="color: red">
                           Discount Price<br>
                           ${{$product_details->discount_price}}
                       </h6>

                       <h6 style="color: gray; text-decoration:line-through" >
                           Price <br>
                           ${{$product_details->price}}
                       </h6>
                   @else
                       <h6 style="color: gray">
                           Price <br>
                           ${{$product_details->price}}
                       </h6>
                  @endif
                  <h6>
                    Product Category : {{$product_details->price}}
                  </h6>
                  <h6>
                    Product Description : {{$product_details->description}}
                  </h6>
                  <h6>
                    Available Quantity : {{$product_details->quantity}}
                  </h6>

                  <form action="{{url('add_to_cart',$product_details->id)}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="number" min="1" name="quantity" value="1" width="100px">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary" value="Add to Cart">
                        </div>
                    </div>

                  </form>


               </div>
            </div>
         </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->


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
