@extends('layouts.main')
@section('container')
<div id="box-utama">
	{{-- @if($request_temp->has('categories') || $request_temp->has('device') || $request_temp->has('login'))
    <div id="home-category">
        <a href="/">Home </a> /
		<span style="color:red"> {{ $request_temp->categories }} / {{ $request_temp->device }} / {{ $request_temp->login }} </span> 
    </div>
	@else
	<div id="home-category">
        <a href="/">Home </a>/ 
		<span style="color:red"> All Categories </span> 
    </div>
	@endif --}}

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
										<small>(20)</small>
									</label>
								</div>

								<div class="input-radio">
									<input type="radio" name="categories" id="Indbound" value="Indbound" class="checkbox">
									<label for="Indbound">
										<span></span>
										Indbound
										<small>(41)</small>
									</label>
								</div>

								<div class="input-radio">
									<input type="radio" name="categories" id="Outbound" value ="Outbound" class="checkbox">
									<label for="Outbound">
										<span></span>
										Outbound
										<small>(17)</small>
									</label>
								</div>
							
								<div class="input-radio">
									<input type="radio" name="categories" id="Infrastrukture" value="Infrastukture" class="checkbox">
									<label for="Infrastrukture">
										<span></span>
										Infrastrukture
										<small>(9)</small>
									</label>
								</div>
							</div>
						</div>

						<div class="aside">
							<h3 class="aside-title">Login User</h3>
							<div class="checkbox-filter">
								<div class="input-radio">
									<input type="radio" name="login" id="AD" value="AD" class="checkbox">
									<label for="AD">
										<span></span>
										AD
										<small>(178)</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="login" id="Non AD" value="Non AD" class="checkbox">
									<label for="Non AD">
										<span></span>
										Non AD
										<small>(42)</small>
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
										<small>(178)</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" id="Mobile" name="device" value="Mobile" class="checkbox">
									<label for="Mobile">
										<span></span>
										Mobile
										<small>(42)</small>
									</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="device" id="Desktop" value="Desktop" class="checkbox">
									<label for="Desktop">
										<span></span>
										Desktop
										<small>(755)</small>
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
							<div class="product-widget">
								<div class="product-img">
									<img src="{{ asset('img/app-logo/product01.png') }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">TOTAL PRODUCTIVE MAINTENANCE (TPM)</a></h3>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="{{ asset('img/app-logo/product02.png') }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">PLANT INFORMATION SYSTEM (PIS)</a></h3>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="{{ asset('img/app-logo/product03.png') }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">MAINTENANCE SYSTEM ONLINE (MSO)</a></h3>
								</div>
							</div>
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
						<div class="row">
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
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add favorite</span></button>
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