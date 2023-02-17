<header>
    <!-- MAIN HEADER -->
    <div id="header-top">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="/" class="logo">
                            <img src="{{ asset('img/logo_sisi.jpg') }}" alt="" height="75px">
                        </a>
                    </div>
                </div>

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ Route('SearchApp') }}" method="GET">
                            <select name="kategori" class="input-select-categories">
                                <option value="">All Categories</option>
                                <option value="AD">AD</option>
                                <option value="Non AD">Non AD</option>
                            </select>
                            <input id="input-search" name="search" type="search" placeholder="Search here">
                            <button type="submit" class="search-button">Search</button>
                        </form>
                    </div>
                </div>


                @guest
                <div class="col-md-3 clearfix">
                    <div class="fav-apps">
                        Favorites Apps
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="my-account">
                        <a href="/login"> <span style="color:red;font-weight:bold"> Login </span></a>
                    </div>
                </div>    
                @endguest
                @auth
                <div class="col-md-3 clearfix">
                    <div class="fav-apps">
                        <a href="/favorites"><b>Favorites Apps</b></a>
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="my-account">
                        <a style="color:#D10024"href="/profile/{{ auth()->user()->id }}"><b>My Account</b></a>
                    </div>
                </div>
                @endauth
                
            </div>
        </div>
        <br>
    </div>
</header>


