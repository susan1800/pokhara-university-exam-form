



<!DOCTYPE html>
<html>

<!-- Mirrored from exam.ioe.edu.np/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 01:46:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <title>Examination Control Division</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" type="text/css" href="{{asset('frontend/Notice/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/Notice/bootstrap.min.css')}}">
    <link href="{{asset('frontend/lib/font-awesome-4.5.0/css/font-awesome.css')}}" rel="stylesheet">
    <script src="{{asset('frontend/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

    <script src="{{asset('frontend/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <link href="{{asset('frontend/css/simplyscroll.html')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/brand.css')}}" rel="stylesheet">
    <script src="{{asset('frontend/lib/simplyscroll.html')}}"></script>
</head>
<body id="body">

    <div class="container" style="background-color: white">
        <div class="row">
            <div class="header">

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"><img src="{{asset('/logo/cosmos.png')}}" height="90"></div>
            <div class="col-md-5">

            </div>
            <div class="col-md-2">
                <p style="margin-top: 55px;">
                    <a href="" class="studentLogin"></a>
                </p>
            </div>

			<div class="col-md-2">
                <p style="margin-top: 55px;">
                    <a href="{{route('signin')}}" class="studentLogin"><i class="fa fa-user "></i> &nbsp; Login</a>
                </p>
            </div>
        </div>

        <div class="row">
            <nav class="navbar navbar-default" style="background-color:  green;">
                <div class="container">




                        <div class="row">
                            <div class="col-md-2">
                                <ul class="nav navbar-nav">
                                    <li><h3 style="color: white">Exam Notice</h3></li>

                                </ul>
                            </div>
                            <div class="col-md-10">
                                <ul class="nav navbar-nav" id="scroller">
                                </ul>

                            </div>
                        </div>


                </div>
            </nav>
        </div>
            <div class="row">
                <div class="" style="margin: 5px;">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th> S.No</th>
                                <th> Title</th>
                                <th>Notice Date</th>
                                <th> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                                $i=1;


                            @endphp
                            @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                                <a href="{{asset('storage/'.$notification->file)}}">

                                                            <span>{{$notification->title}}</span>
                                                </a>
                                        </td>

                                        <td>{{ \Carbon\Carbon::parse($notification->creates_at)->format('d-M-Y D')}}</td>
                                        <td>
                                            <a href="{{asset('storage/'.$notification->file)}}"><i class="fa fa-eye fa-2x"></i></a>&nbsp;

                                        </td>


                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @php
                                        session()->put('snsession',$i);
                                    @endphp
                                    @endforeach

                        </tbody>
                    </table>
                    <br>
                    <div class="pagination-container">
                         <div class="pagination-wrapper centred">
        <div class="d-flex justify-content-center">
            {{ $notifications->links() }}<br>
        </div>
    </div>
                     </div>



                </div>

            </div>
                <div class="row">


            <div class="footer">

                <div class="col-md-6 copyrights">Cosmos College Examination Control Division</div>


            </div>
        </div>

    </div>
    <script type="text/javascript">


        //window.setInterval(function () {
        //    $('.blink_me').toggle();
        //}, 150);

        //$("ul li").each(function () {
        //    $('.blink_me').fadeOut(1500);
        //    $('.blink_me').fadeIn(1500);
        //});
        (function ($) {
            $(function () { //on DOM ready
                $("#scroller").simplyScroll({

                    speed:5
                });
            });
        })(jQuery);
        // 500 500 1500
    function blinker() {
       $('.blink_me').fadeOut(450);
       $('.blink_me').fadeIn(450);
    }

        setInterval(blinker, 500);



        function blinker() {
$('.blinking').fadeOut(500);
$('.blinking').fadeIn(500);
}
setInterval(blinker, 1000);
//

    </script>
</body>


<!-- Mirrored from exam.ioe.edu.np/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 01:46:46 GMT -->
</html>

