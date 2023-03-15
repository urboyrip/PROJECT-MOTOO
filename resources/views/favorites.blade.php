@extends('layouts.main')
@section('container')
<div id="box-utama">
    <div class="container">
        <div class="row">
            <div id="categories">
                @if(count($favorites) > 0)
                Your favorite application
                @endif
            </div>  
        </div>
        <hr>
        <div id="row">
            @if(count($favorites) > 0)
            @foreach($favorites as $fav)
            <a>
            <div class="col-lg-3 col-xs-6">
                <div class="product">
                    <div class="product-body">
                        <img src="{{ asset('img/app-logo/product01.png') }}" width="225px;">
                                <p class="product-category">{{ $fav->application->Category }}</p>
                        <h3 class="product-name"><a href="/detail/{{ $fav->application->id }}">{{ $fav->application->Nama_Aplikasi }}</a></h3>
                        @if ($rev->where('application_id', $fav->application_id) != "[]")
                            <p style="color:#BF2C45;">
                                <div class="product-rating">
                                    @for ($i = 0; $i<=$rev->where('application_id', $fav->application_id)->avg('Penilaian')-1;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if($rev->where('application_id', $fav->application_id)->avg('Penilaian') != 5)
                                    @for($k=$i; $k<5;$k++)
                                        <i class="fa fa-star-o empty"></i>
                                    @endfor
                                    @endif
                                </div>
                            </p>
                            @else
                            <div class="product-rating">
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            @endif
                        <div class="product-btns">
                            @auth
                            <form method="post" action="{{ Route('removefav') }}">
                                @method('delete')
                                @csrf
                                <input name="app_id" value="{{ $fav->application_id }}" style="display:none">
                                <input name="user_id" value="{{ auth()->user()->id }}" style="display:none">
                                <input name="Status" value="{{ $fav->Status }}" style="display:none">
                                <button style="background-color:white;border:none;" class="add-to-wishlist"><i class="fa fa-heart"></i><span class="tooltipp"></span></button>
                            </form>
                            @endauth
                            <button class="add-to-compare"><i class="fa fa-file"></i><span class="tooltipp">document</span></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div style="margin:10%;margin-left:0;">
                <h4 style=" color:#BF2C45">
                    Your favorite application list is empty!
                </h4>
            </div>
            <hr>
            @endif
        </div>
    </div>
    <div style="float:right;margin-right:30px;">
        {{ $favorites->links() }}
    </div>
</div>
@endsection