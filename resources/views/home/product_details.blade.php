<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">

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
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>


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

                  <a href="" class="btn btn-primary">Add to Cart</a>

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
