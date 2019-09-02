@extends('layouts.index')



@section('content')
        

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="{{ $product_item->image }}" alt="" />
                                    </div>
                                </div>
                               
                                <div class="col-sm-7">

                                    <div class="product-information"><!--/product-information-->
                                        
                                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2>{{ $product_item->name }}</h2>
                                        
                                        <p>Код товара: {{ $product_item->code }}</p>
                                        
                                        <span>
                                            <span>US ${{ $product_item->price }}</span>
                                            <label>Количество:</label>
                                            <input type="text" value="{{ $product_item->status }}" />
                                            <a href="{{ route('addcart', $product_item->id) }}"><button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button></a>
                                        </span>
                                        <p><b>Наличие:</b> На складе</p>
                                        <p><b>Состояние:</b> Новое</p>
                                        <p><b>Производитель:</b> D&amp;G</p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <p>{{ $product_item->description }}}</p>
                                </div>
                            </div>
                        </div>
                        <!--/product-details-->
                        <!--messages-->

            </div>
<hr>

                </div>
            </div>
        </section>
                @if(isset($post))
                    @foreach($post as $postItem)    
                    <div class="container">
                        <div class="row">                                
                            <div class="col-sm-10">
                                <div class="alert alert-dark" role="alert">
                                    
                                    <h5><img src="{{ $user->where('id', $postItem->user_id)->first()->photo }}" alt="/"> {{ $postItem->author }}</h5>
                                    <p id="{{ $postItem->id }}">{{ $postItem->message }}</p>
                                    <h6>{{ $postItem->created_at }}</h6>
                                    <!-- Если залогинен, то показывать свойства для сообщений -->
                            @if(Auth::check())
                                <!-- Если это твое сообщение, то его можно удалить -->
                                @if($postItem->user_id == Auth::user()->id)
                                <a href="{{ route('delete', $postItem->id) }}"> Delete </a>
                                    <!-- Если есть лайки у этого сообщения, то показывать их количество -->
                                     
                                        |  <span class="glyphicon glyphicon-thumbs-up"></span>
                                            
                                     
                                    <!-- В противном случае, показывать ответ и систему лайков -->
                            @else
                                <a href="#"> Reply </a> 
                                | <a href="{{ route('addlike', $postItem->id) }}" title="like">
                                              <span class="glyphicon glyphicon-thumbs-up"></span>
                                              
                                            </a>
                                   
<!-- --------------------------------------------------------------------------------------------------------- -->
                                                <!-- Liking logic -->
                                            <!-- если к message_id 17 like_from_id Auth::id() is_like == 1 -->
                                            @if($likeFrom)
                                            @foreach($likeFrom as $likeItem)
                                            @if($likeItem->message_id == $postItem->id && $likeItem->is_like == true)

                                            You like this post!

                                            | <a href="{{ route('removelike', $postItem->id) }}" title="unlike">
                                              <span class="glyphicon glyphicon-thumbs-down"></span>
                                            </a>

                                            @break
                                            
                                    
                                            @endif

                                            
                                            @endforeach
                                          
                                            @endif
                                           
                                          
<!-- Главный вопрос который осталось решить, как проверить, есть ли там вообще новая запись о лайке? -->
              
                                        
                                @endif

                            @endif

                        </div>
                    </div>
                    <hr>
                    @endforeach
            @endif
        
<br>


                    <div class="container">
                        <div class="row">                                
                            <div class="col-sm-6">
                                <form method="post" action="{{ route('addpost', $product_item->id) }}">
                                    <textarea name="message"  placeholder="Сообщение" rows="6"></textarea>
                                        <button type="submit" class="btn btn-primary">Отправить</button><br>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

        <br/>
        <br/>
        
@endsection

<!-- 
<script>
jQuery(document).ready(function($)
{
    $("#showmore").click(function()
    {
        $("#r").toggle();
    });
});



function myFunction() {
    var x = document.getElementById("r");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

</script> -->


