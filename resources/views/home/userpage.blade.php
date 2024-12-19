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
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .form-group{
            text-align: center;
            padding-left: 500px;
        }
        .form-control{
            width: 600px;

        }
        .lable{
            padding-right: 400px;
        }
        #commentButton{
            margin-right: 400px;
        }
        .allComment{
            padding-left: 190px;
            padding-bottom: 10px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">

        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
     </div>

      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->



    <div class="form-group">
        <form action="">
          <label class="lable">Comments</label>
          <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
          <a href="" class="btn btn-primary" id="commentButton">Comment</a>
      </form>
    </div>

    <div>
      <h2 style="padding-bottom: 20px; padding-left:190px">All Comments</h2>

      <div class="allComment">
        <b>Shan</b>
        <p>This is my first comment</p>
        <a href="javascript::void(0);">Reply</a>
      </div>

      <div class="allComment">
        <b>Shan</b>
        <p>This is my first comment</p>
        <a href="javascript::void(0);">Reply</a>
      </div>

      <div class="allComment">
        <b>Shan</b>
        <p>This is my first comment</p>
        <a href="javascript::void(0);">Reply</a>
      </div>

      <div style="display:none">
        <textarea style="height: 100px; width:500px;margin-left:190px" placeholder="Write something Here..."></textarea>
        <br>
        <a href="" class="btn btn-primary" style=" margin-left: 190px; margin-bottom:10px;">Reply</a>
      </div>
    </div>



      <!-- subscribe section -->
      @include('home.subscription')
      <!-- end subscribe section -->

      <!-- client section -->
      @include('home.client')
      <!-- end client section -->

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
