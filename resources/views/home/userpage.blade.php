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
            width: 610px;

        }
        .lable{
            padding-right: 400px;
            padding-top: 50px;
            padding-bottom: 20px;
            font-size: 30px;
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
        <form action="{{url('add_comment')}}" method="POST">
            @csrf
          <h2 class="lable">Comments</h2>
          <textarea class="form-control"  name="comment"></textarea>
          <input type="submit" class="btn btn-primary" id="commentButton" value="Comment">
      </form>
    </div>

    <div>
      <h2 style="padding-bottom: 20px; padding-left:190px; font-size:25px">All Comments</h2>

      @foreach ($commentData as $commentData )

      <div class="allComment">
        <b>{{$commentData->name}}</b>
        <p>{{$commentData->comment}}</p>
        <a style="color:blue" href="javascript::void(0);" onclick="reply(this)" data-commentid="{{$commentData->id}}">Reply</a>

        @foreach ($replyData as $replyDatas)
            @if($replyDatas->comment_id == $commentData->id)
                <div style="padding-left:3%; padding-top:10px; padding-bottom:10px" >
                    <b>{{$replyDatas->name}}</b>
                    <p>{{$replyDatas->reply}}</p>
                    <a style="color:blue" href="javascript::void(0);" onclick="reply(this)" data-commentid="{{$commentData->id}}">Reply</a>
                </div>
            @endif

        @endforeach

      </div>

      @endforeach


      <div style="display:none" class="replyDiv">
        <form action="{{url('add_reply')}}" method="POST">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden="">
            <textarea style="height: 100px; width:500px;margin-left:190px" name="reply" placeholder="Write something Here..."></textarea>
            <br>
            <button type="submit" class="btn btn-primary" style=" margin-left: 190px; margin-bottom:10px;">Reply</button>
            <a href="javascript::void(0);" class="btn btn-danger" style=" margin-left: 7px; margin-bottom:10px;" onclick="reply_close(this)">Close</a>
        </form>
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

      <script type="text/javascript">
          function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data-commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
          }

          function reply_close(caller){
            $('.replyDiv').hide();
          }
      </script>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
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
