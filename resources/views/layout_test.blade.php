@extends('base')
@push('base.styles')
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
                width: 66.66666667%;
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
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="https://getbootstrap.com/docs/4.2/assets/brand/bootstrap-solid.svg" width="30"
                             height="30"
                             alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('landing.page')}}">Layout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('sewaKendaraan.index')}}">Sewa Kendaraan</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Theme
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Dark</a>
                                    <a class="dropdown-item" href="#">Curelent</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Minty</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" tabindex="-1">Menu A</a>
                            </li>
                            <li class="nav-item">
                                {{--<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="jumbotron">
                                <h1 class="display-4">Task 1</h1>
                                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for
                                    calling
                                    extra attention to featured content or information.</p>
                                <hr class="my-4">
                                <p>It uses utility classes for typography and spacing to space content out within the
                                    larger
                                    container.</p>
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more Task 1</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="jumbotron">
                                <h1 class="display-4">Task 2!</h1>
                                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for
                                    calling
                                    extra attention to featured content or information.</p>
                                <hr class="my-4">
                                <p>It uses utility classes for typography and spacing to space content out within the
                                    larger
                                    container.</p>
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more Task 2</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="jumbotron">
                                <h1 class="display-4">Task 3!</h1>
                                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for
                                    calling
                                    extra attention to featured content or information.</p>
                                <hr class="my-4">
                                <p>It uses utility classes for typography and spacing to space content out within the
                                    larger
                                    container.</p>
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more Task 3</a>
                            </div>
                            {{--<img src="http://www.prepbootstrap.com/bootstrap-theme/personal-page/preview/images/image1.jpg" class="d-block w-100" alt="...">--}}
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
        <!-- card horizontal -->
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-default">
                    <div class="card-header">Image card</div>
                    <div class="card-img">
                        <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-default">
                    <div class="card-header">Image card</div>
                    <div class="card-img">
                        <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-default">
                    <div class="card-header">Image card</div>
                    <div class="card-img">
                        <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <!-- card vertical -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-body card-5-7">
                        <div class="card-left">
                            <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                        </div>
                        <div class="card-right">
                            <h4>Heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-body card-5-7">
                        <div class="card-left float-right">
                            <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                        </div>
                        <div class="card-right float-left">
                            <h4>Heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-body card-5-7">
                        <div class="card-left">
                            <img src="https://fillmurray.com/g/320/320" class="img-responsive">
                        </div>
                        <div class="card-right">
                            <h4>Heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
