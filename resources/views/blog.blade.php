@extends('layouts.index')



@section('categories')

@endsection

@section('content')

<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
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
                            </div><!--/category-products-->

                            
                            <div class="shipping text-center"><!--shipping-->
                                <img src="images/home/shipping.jpg" alt="" />
                            </div><!--/shipping-->

                    </div>
                </div>

                    <div class="col-sm-9">
                        <div class="blog-post-area">
                            <h2 class="title text-center">Последние записи в блоге</h2>
                            <div class="single-blog-post">
                                <h3>Girls Pink T Shirt arrived in store</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>2013-03-02</li>
                                        <li><i class="fa fa-clock-o"></i> 13:33</li>
                                    </ul>
                                </div>
                                <a href="">
                                    <img src="images/blog/blog-one.jpg" alt="">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <a  class="btn btn-primary" href="">Читать полностью</a>
                            </div>
                            <hr>
                            <div class="single-blog-post">
                                <h3>Girls Pink T Shirt arrived in store</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>2013-03-02</li>
                                        <li><i class="fa fa-clock-o"></i> 13:33</li>
                                    </ul>
                                </div>
                                <a href="">
                                    <img src="images/blog/blog-two.jpg" alt="">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <a  class="btn btn-primary" href="">Читать полностью</a>
                            </div>
                            <hr>
                            <div class="single-blog-post">
                                <h3>Girls Pink T Shirt arrived in store</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>2013-03-02</li>
                                        <li><i class="fa fa-clock-o"></i> 13:33</li>
                                    </ul>
                                </div>
                                <a href="">
                                    <img src="images/blog/blog-three.jpg" alt="">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <a  class="btn btn-primary" href="">Читать полностью</a>
                            </div>
                            
                            <div class="pagination-area">
                                <ul class="pagination">
                                    <li><a href="" class="active">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
        
@endsection

@section('recommended')

@endsection