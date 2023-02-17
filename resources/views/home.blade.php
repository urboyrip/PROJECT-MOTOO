@extends('layouts.main')
@section('container')
<div id="box-utama">
    <nav id="navigation">
        <div id="categories">
            CATEGORIES
        </div>

        <div class="container">
            <div id="responsive-nav" style="float:right;">
                <ul class="main-nav nav navbar-nav">
                    <li><a href="/store/filter?categories=Infrastruktur">Infrastruktur <span>({{ $application->where('Category', 'Infrastruktur')->count() }})</span></a></li>
                    <li><a href="/store/filter?categories=Outbound">Outbound <span>({{ $application->where('Category', 'Outbound')->count() }})</span></a></li>
                    <li><a href="/store/filter?categories=Indbound">Inbound <span>({{ $application->where('Category', 'Indbound')->count() }})</span></a></li>
                    <li><a href="/store/filter?categories=Non+ERP">Non ERP <span>({{ $application->where('Category', 'Non ERP')->count() }})</span></a></li>
                    <li><a href="/store">Show All <span>({{ $application->count() }})</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="margin-top:15px;margin-left:-15px;">
        <div class="container">
            <div class="row">
                <a href="/store/filter?device=Website">
                <div class="col-md-4">
                    <div id="web-mob-des" style="background-image:url({{ url('img/web-app.jpg') }})"> 
                        <div id="card-content">
                            Web Applications
                        </div>
                    </div>
                </div>
                </a>
                <a href="store/filter?device=Mobile">
                <div class="col-md-4">
                    <div id="web-mob-des" style="background-image:url({{ url('img/mobile-app.jpg') }});margin-left:10px;"> 
                        <div id="card-content">
                            Mobile Application
                        </div>
                    </div>
                </div>
                </a>
                <a href="store/filter?device=Desktop">
                <div class="col-md-4">
                    <div id="web-mob-des" style="background-image:url({{ url('img/desktop-app.jpg') }});margin-left:15px;"> 
                        <div id="card-content">
                            Desktop Applications
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <br>    
    <div id="categories">
        APPLICATIONS
    </div>  
    <div style="margin-top:65px">
        <div class="container">
            <div id="row">
                @foreach($application as $app)
                <a>
                <div class="col-lg-3 col-xs-6">
                    <div class="product">
                        <div class="product-body">
                            <img src="{{ asset('img/app-logo/product01.png') }}" width="225px;">
                            <p class="product-category">{{ $app->Category }}</p>
                            <h3 class="product-name"><a href="/detail/{{ $app->id }}">{{ $app->Nama_Aplikasi }}</a></h3>
                            @if ($rev->where('application_id', $app->id) != "[]")
                            <p style="color:#BF2C45;">
                                <div class="product-rating">
                                    @for ($i = 0; $i<=$rev->where('application_id', $app->id)->avg('Penilaian')-1;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if($rev->where('application_id', $app->id)->avg('Penilaian') != 5)
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
                                <form method="post" action="{{ Route('addfav') }}">
                                    @csrf
                                    <input name="app_id" value="{{ $app->id }}" style="display:none">
                                    <input name="user_id" value="{{ auth()->user()->id }}" style="display:none">
                                    <button style="background-color:white;border:none;" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"></span></button>
                                </form>
                                @endauth
                                @guest
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Login to add this to your favorites!</span></button>
                                @endguest
                                <button class="add-to-compare"><i class="fa fa-file"></i><span class="tooltipp">document</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-2" style="float:right;">
            {{ $application->links() }}
            <br>
        </div>
    </div>
    <br>
</div> 
@endsection