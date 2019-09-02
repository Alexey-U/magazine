@section('header')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@if(isset($title)) {{ $title }} @endif</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +38 093 000 11 22</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> us@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                                    <!--/header_top-->


                                 <!--/header-middle-->





            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{ route('home') }}"><img src="images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">                                    
                                    <li><a href="{{ route('cart') }}" id="cart-count2"><i class="fa fa-shopping-cart">
                                </i> Корзина 
                                    @if(isset($count))
                                        ({{ $count }})
                                    @endif</a>
                                </li>
                                @guest
                                    <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> {{ __('Register') }}</a></li>
                                    <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                                @else
                                   

                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Выход</a></li>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         
                                        @csrf
                                    </form>
                                    
                                    
                                   
                                    <li><a href="{{ route('account') }}"><i class="fa fa-lock"></i>Кабинет</a></li>
                                    <li><i class="fa fa-user"></i> Здравствуйте, {{ Auth::user()->name }} <img src="{{ $auth->photo }}" alt="" /></li> 
                                @endguest

                                
                                    
                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                       

          


            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="{{ route('home') }}">Главная</a></li>
                                    <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{ route('main-catalog') }}">Каталог товаров</a></li>
                                            <li><a href="{{ route('cart') }}">Корзина @if(isset($count)) ({{ $count }}) @endif</a></li> 
                                        </ul>
                                    </li> 
                                    <li><a href="{{ route('blog') }}">Блог</a></li> 
                                    <li><a href="#">О магазине</a></li>
                                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
            
        </header>
@show




                                                <!--/header-->


@section('categories')

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>

                            <div class="panel-group category-products">
                            
                        @if(isset($category))
                            @foreach ($category->all() as $categoryItem)
                            
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                    <a class="@if (url()->current() == route('catalog', $categoryItem->id)) ? active : '' @endif" href="{{ route('catalog', $categoryItem->id) }}">{{ $categoryItem->name }}</a>

                                        </h4>

                                    </div>
                                </div>

                            @endforeach
                        @endif


                            </div>

                        </div>
                    </div>
@show

@section('content')


                                                            <!--features_items-->

                    <div class="col-sm-9 padding-right">
                        <div class="features_items">
                            <h2 class="title text-center">Последние товары</h2>

                            @if(isset($product))

                            @foreach ($product->all() as $productItem)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            
                                            <img src="{{ $productItem->image }}" alt="" />
                                            
                                            <h2>${{ $productItem->price }}</h2>
                                        
                                        <a href="{{ route('product-details', $productItem->id) }}">
                                            <p>{{ $productItem->name }}</p>
                                        </a>
                                            <a data-id="{{ $productItem->id }}" id="{{ $productItem->id }}" href="{{ route('addcart', $productItem->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        @if ($productItem->is_new == 1)
                                        <img src="{{ asset('images/home/new.png') }}" class="new" alt="" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @endforeach


                            @endif

                        </div>
                                                            <!--features_items-->



                                                            <!--recommended_items-->

@section('recommended')                                                          

                        <div class="recommended_items">

                            <h2 class="title text-center">Рекомендуемые товары</h2>

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">

                                    @if(isset($product))	
                                        @foreach($product->all() as $item)
                                            @if($item->is_recommended == 1)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{ $item->image }}" alt="" />
                                                        <h2>${{ $item->price }}</h2>
                                                    <a href="{{ route('product-details', $item->id) }}">
                                                        <p>{{ $item->name }}</p>
                                                    </a>
                                                        <a href="{{ route('addcart', $item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            @endif
                                        @endforeach
                                    @endif
                    
                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
                            </div>
                        </div>

    


                


@show


                    @if(url()->current() == route('home'))
                      {{ $product->links() }}                                  <!--/recommended_items-->
                    @endif


                    </div>
                </div>
            </div>
        </section>
@show




@section('footer')

                                                        <!--Footer-->

        <footer id="footer">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2019</p>
                        <p class="pull-right">PHP</p>
                    </div>
                </div>
            </div>
        </footer>



                                                        <!--/Footer-->



        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/ajax.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/price-range.js') }}"></script>
        <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>

@show
