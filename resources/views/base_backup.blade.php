<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')  }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">--}}

<!-- Custom styles for this template -->
{{--<link href="jumbotron.css" rel="stylesheet">--}}

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><!--<script src="../../assets/js/ie8-responsive-file-warning.js"></script>--><![endif]-->
{{--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>--}}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    {{--<![endif]-->--}}
    <style>
        /* === card component ======
 * Variation of the panel component
 * version 2018.10.30
 * https://codepen.io/jstneg/pen/EVKYZj
 */
        .card {
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 6px;
        }

        .card > .card-link {
            color: #333;
        }

        .card > .card-link:hover {
            text-decoration: none;
        }

        .card > .card-link .card-img img {
            border-radius: 6px 6px 0 0;
        }

        .card .card-img {
            position: relative;
            padding: 0;
            text-align: center;
            display: table;
        }

        .card .card-img .card-caption {
            position: absolute;
            right: 0;
            bottom: 16px;
            left: 0;
        }

        .card .card-body {
            display: table;
            width: 100%;
            padding: 12px;
        }

        .card .card-header {
            border-radius: 6px 6px 0 0;
            padding: 8px;
        }

        .card .card-footer {
            border-radius: 0 0 6px 6px;
            padding: 8px;
        }

        .card .card-left {
            position: relative;
            float: left;
            padding: 0 0 8px 0;
        }

        .card .card-right {
            position: relative;
            float: left;
            padding: 8px 0 0 0;
        }

        .card .card-body h1:first-child,
        .card .card-body h2:first-child,
        .card .card-body h3:first-child,
        .card .card-body h4:first-child,
        .card .card-body .h1,
        .card .card-body .h2,
        .card .card-body .h3,
        .card .card-body .h4 {
            margin-top: 0;
        }

        .card .card-body .heading {
            display: block;
        }

        .card .card-body .heading:last-child {
            margin-bottom: 0;
        }

        .card .card-body .lead {
            text-align: center;
        }

        @media ( min-width: 768px ) {
            .card .card-left {
                float: left;
                padding: 0 8px 0 0;
            }

            .card .card-right {
                float: left;
                padding: 0 0 0 8px;
            }

            .card .card-4-8 .card-left {
                width: 33.33333333%;
            }

            .card .card-4-8 .card-right {
                width: 66.66666667%;
                text-align: center;
            }

            .card .card-5-7 .card-left {
                width: 33.33333333%;
            }

            .card .card-5-7 .card-right {
                width:  66.66666667%;
            }

            .card .card-6-6 .card-left {
                width: 50%;
            }

            .card .card-6-6 .card-right {
                width: 50%;
            }

            .card .card-7-5 .card-left {
                width: 58.33333333%;
            }

            .card .card-7-5 .card-right {
                width: 41.66666667%;
            }

            .card .card-8-4 .card-left {
                width: 66.66666667%;
            }

            .card .card-8-4 .card-right {
                width: 33.33333333%;
            }
        }

        /* -- default theme ------ */
        .card-default {
            border-color: #ddd;
            background-color: #fff;
            margin-bottom: 24px;
        }

        .card-default > .card-header,
        .card-default > .card-footer {
            color: #333;
            background-color: #ddd;
        }

        .card-default > .card-header {
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }

        .card-default > .card-footer {
            border-top: 1px solid #ddd;
            padding: 8px;
        }

        .card-default > .card-body {
        }

        .card-default > .card-img:first-child img {
            border-radius: 6px 6px 0 0;
        }

        .card-default > .card-left {
            padding-right: 4px;
        }

        .card-default > .card-right {
            padding-left: 4px;
        }

        .card-default p:last-child {
            margin-bottom: 0;
        }

        .card-default .card-caption {
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }

        /* -- price theme ------ */
        .card-price {
            border-color: #999;
            background-color: #ededed;
            margin-bottom: 24px;
        }

        .card-price > .card-heading,
        .card-price > .card-footer {
            color: #333;
            background-color: #fdfdfd;
        }

        .card-price > .card-heading {
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }

        .card-price > .card-footer {
            border-top: 1px solid #ddd;
            padding: 8px;
        }

        .card-price > .card-img:first-child img {
            border-radius: 6px 6px 0 0;
        }

        .card-price > .card-left {
            padding-right: 4px;
        }

        .card-price > .card-right {
            padding-left: 4px;
        }

        .card-price .card-caption {
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }

        .card-price p:last-child {
            margin-bottom: 0;
        }

        .card-price .price {
            text-align: center;
            color: #337ab7;
            font-size: 3em;
            text-transform: uppercase;
            line-height: 0.7em;
            margin: 24px 0 16px;
        }

        .card-price .price small {
            font-size: 0.4em;
            color: #66a5da;
        }

        .card-price .details {
            list-style: none;
            margin-bottom: 24px;
            padding: 0 18px;
        }

        .card-price .details li {
            text-align: center;
            margin-bottom: 8px;
        }

        .card-price .buy-now {
            text-transform: uppercase;
        }

        .card-price table .price {
            font-size: 1.2em;
            font-weight: 700;
            text-align: left;
        }

        .card-price table .note {
            color: #666;
            font-size: 0.8em;
        }
    </style>
    @stack('base.styles')
</head>

<body>
@yield('content')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
<!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<script src="{{url('js/app.js')}}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
@stack('base.javascripts')
</body>
</html>
