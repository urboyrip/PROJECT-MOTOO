@extends('layouts.main')
@section('container')
<div id="box-utama">
	<div id="home-category">
        <a href="/">Home </a> /
		<span style="color:red"> {{ $search }}</span> 
    </div>

    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<form action="{{ Route('filterApp') }}" method="get">
						<div class="aside">
							<button style="float:right;border:none;background-color:#D10024;color:white;border-radius:4px;	"> Filter </button>
							<h3 class="aside-title">Categories</h3>
							{{-- <p id="productList">
							</p> --}}
							<div class="checkbox-filter">
								<div class="input-radio">
									<input type="radio" name="categories" id="Non ERP" value="Non ERP" class="checkbox">
									<label for="Non ERP">
										<span></span>
										Non ERP
										<small>({{ $app->where('Category', "Non ERP")->count() }})</small>
									</label>
								</div>

								<div class="input-radio">
									<input type="radio" name="categories" id="Indbound" value="Indbound" class="checkbox">
									<label for="Indbound">
										<span></span>
										Indbound
										<small>({{ $app->where('Category', "Indbound")->count() }})</small>
									</label>
								</div>

								<div class="input-radio">
									<input type="radio" name="categories" id="Outbound" value ="Outbound" class="checkbox">
									<label for="Outbound">
										<span></span>
										Outbound
										<small>({{ $app->where('Category', "Outbound")->count() }})</small>
									</label>
								</div>
							
								<div class="input-radio">
									<input type="radio" name="categories" id="Infrastrukture" value="Infrastukture" class="checkbox">
									<label for="Infrastrukture">
										<span></span>
										Infrastrukture
										<small>({{ $app->where('Category', "Infrastukture")->count() }})</small>
									</label>
								</div>
							</div>
						</div>

						<div class="aside">
							<h3 class="aside-title">Login User</h3>
							<div class="checkbox-filter">
								<div class="input-radio">
									<input type="radio" name="login" id="Konsumen" value="Konsumen" class="checkbox">
									<label for="Konsumen">
										<span></span>
										Konsumen
										<small>({{ $app->where('Login', "Konsumen")->count() }})</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="login" id="Non Konsumen" value="Non Konsumen" class="checkbox">
									<label for="Non Konsumen">
										<span></span>
										Non Konsumen
										<small>({{ $app->where('Login', "Non Konsumen")->count() }})</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

                        <!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Device</h3>
							<div class="checkbox-filter">
								<div class="input-radio">
									<input type="radio" name="device" id="Website" value="Website" class="checkbox">
									<label for="Website">
										<span></span>
										Website
										<small>(({{ $app->where('Device', "Website")->count() }}))</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" id="Mobile" name="device" value="Mobile" class="checkbox">
									<label for="Mobile">
										<span></span>
										Mobile
										<small>({{ $app->where('Device', "Mobile")->count() }})</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="device" id="Desktop" value="Desktop" class="checkbox">
									<label for="Desktop">
										<span></span>
										Desktop
										<small>({{ $app->where('Device', "Desktop")->count() }})</small>
									</label>
								</div>
								@if($request_temp->search != "")
								<div> 
									<input name="search" value="{{ $request_temp->search }}" style="display:none">
								</div>
								@endif
							</div>
						</div>
						<!-- /aside Widget -->
						</form>
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top application</h3>
							@foreach($top_app as $app)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{ asset('img/app-logo/product01.png') }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $app->application->Category }}</p>
									<h3 class="product-name"><a href="#">{{ $app->application->Nama_Aplikasi }}</a></h3>
									<h6><span style="color:#BF2C45">{{ $app->avg*1 }} / 5 <i class="fa fa-star"></i> </span></h6>
								</div>
							</div>
							@endforeach
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>
								@if($request_temp->search != "")
								Showing result for <strong> <i> {{ $request_temp->search }}</i> </strong>
								@endif
							</div>
							
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row" style="margin-left:-50px;">
							<!-- product -->
							@foreach($application as $app)
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{ asset('img/app-logo/product01.png') }}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
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
							<!-- /product -->
					</div>
					<!-- /STORE -->
				</div>
				<div style="float: right"> 
                    {{ $application->links() }}
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		</div>
</div>

@endsection