<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        &ndash; Administration
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">

    <style>
        body { padding-top: 50px; background-color: #2e2c30;}

        .current-pointer{
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .current-pointer .arrow{
            border-color: transparent #fff transparent transparent;
            border-width: 8px;
            border-style: solid;
            font-size: 0;
            left: 50%;
            line-height: 0;
            margin: 0 auto;
            position: absolute;
            top: 0;
            width: 0;
            z-index: 1;
            margin-left: 45%;
        }

        .sidebar-nav {
            position: absolute;
            width: 180px;
            float: left;
            margin: 0;
            padding:0;
            padding-top: 0;
        }

        .sidebar-nav ul{
            list-style: none;
            padding: 0px;
            margin-bottom: 0;
            color: #FFF;

            border-top: 1px solid #232124;
            border-bottom: 1px solid #3b393d;

        }

        .sidebar-nav li{
            position: relative;
            padding: 0;
            margin:0;
            border-bottom: 1px solid #ccc;
            border-top: 1px solid #3b393d;
            border-bottom: 1px solid #232124;
            background-image: -webkit-gradient(linear,0 0%, 0 100%, from(#312f33), to(#2e2c30));
            background-image: -webkit-linear-gradient(top, #312f33 0%, #2e2c30 100%);
            background-image: -moz-linear-gradient(top, #312f33 0%, #2e2c30 100%);
            background-image: -ms-linear-gradient(top, #312f33 0%, #2e2c30 100%);
            background-image: -o-linear-gradient(top, #312f33 0%, #2e2c30 100%);
            background-image: linear-gradient(top, #312f33 0%, #2e2c30 100%);
        }

        .sidebar-nav li.current-nav,
        .sidebar-nav li:hover{
            box-shadow: none;
            background-color: #3a3a3a;
            background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#464349), to(#3e3b41));
            background-image: -webkit-linear-gradient(top, #464349 0%, #3e3b41 100%);
            background-image: -moz-linear-gradient(top, #464349 0%, #3e3b41 100%);
            background-image: -ms-linear-gradient(top, #464349 0%, #3e3b41 100%);
            background-image: -o-linear-gradient(top, #464349 0%, #3e3b41 100%);
            background-image: linear-gradient(top, #464349 0%, #3e3b41 100%);
            border-top-color: #4d4950;
        }

        .sidebar-nav li ul{
            display: none;
            padding-top:0;
            background-color: #272729;
        }

        .sidebar-nav li ul li{
            background: #272729;
        }

        .sidebar-nav li ul li:hover,
        .sidebar-nav li ul li.active{
            background: #141415;
        }

        .sidebar-nav li ul li a{
            padding: 3px 15px;
            border-top: 1px solid #303032;
            border-bottom: 1px solid #1d1d1f;
        }

        .sidebar-nav li ul li.active a{
            color: #FFF;
        }

        .sidebar-nav li ul.active{
            display: block;
        }

        .sidebar-nav li ul li{
            border-bottom: 0;
            margin-bottom: 0;
        }

        .sidebar-nav li .glyphicon-chevron-right,
        .sidebar-nav li .glyphicon-chevron-down{
            position: absolute;
            right: 20px;
            top: 12px;
            color: #FFF;
        }

        .sidebar-nav a{
            text-shadow: 1px 1px 1px #000;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            color: #ddd;
        }

        .content {
            min-width: 400px;
            min-height: 620px;
            margin-bottom: 100px;
            padding-bottom: 50px;
            overflow: hidden;
            position: relative;
            background: #fff;
            margin-left: 180px;
            border-left: 1px solid #dae3e9;
            border-bottom: 1px solid #dae3e9;
            border-radius: 0px 0px 0px 5px;
        }

        .container.auto-max-width{
            max-width: initial;
        }


        .page-header h1 .glyphicon.reposition{
            top: -2px;
            /*font-size: 0.8em;*/
        }

        .hiding-help{
            position: relative;
            top: -173px;
        }


    </style>
</head>
<body>

<!-- Top Navigation Bar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <a class="navbar-brand" href="#">WP Import App</a>
</nav>
<!-- ./ top navigation bar -->

<!-- Sidebar Navigation -->
<div class="sidebar-nav">
    @include('frontend/elements/admin-menu')
</div>
<!-- ./ sidebar navigation -->

<!-- Page Content -->
<div class="content">
    @section('pageContent')
    @show
</div>
<!-- ./page content -->

<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.2/TweenMax.min.js"></script>

<script>
    $(function () {
        $('#myTab a:last').tab('show');


        // sidebar menu dropdown toggle
        $(".sidebar-nav .dropdown-toggle").click(function (e) {

            e.preventDefault();
            var $item = $(this).parent();
            $item.toggleClass("active");
            if ($item.hasClass("active")) {
                $item.find("ul").slideDown("fast");
                $item.find(".glyphicon-chevron-right").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-right');
            } else {
                $item.find("ul").slideUp("fast");
                $item.find(".glyphicon-chevron-down").addClass('glyphicon-chevron-right').removeClass('glyphicon-chevron-down');
            }
        });

        $('.help-button').click(function(){

            var photo = $('.help-document');
            TweenLite.to(photo, 1.5, {width:100});

        });

    })
</script>

@section('scripts')
@show

</body>
</html>


