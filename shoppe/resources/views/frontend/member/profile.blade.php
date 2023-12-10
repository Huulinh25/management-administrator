@extends('frontend.layouts.app')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Account</h2>
					<div class="panel-group category-products" id="accordian"><!--category-products-->


						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('/member-profile')}}">account +</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('/account/my-product')}}">My product +</a></h4>
							</div>
						</div>

					</div><!--/category-products-->


				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					<div class="signup-form"><!--sign up form-->
						<h2>UPDATE ACCOUNT!</h2>
						@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<form action="{{url('/member-profile')}}" enctype="multipart/form-data" method="post">
							@csrf
							<input name="name" type="text" placeholder="Name" value="{{ Auth::user()->name  }}" />
							<input name="email" type="email" placeholder="Email Address" value="{{ Auth::user()->email  }}" />
							<input name="password" type="password" placeholder="Password" value="" />
							<select name="id_country" class="form-control form-control-line">
								<?php
								if ($countries->count() > 0) {
									foreach ($countries as $country) {
								?>
										<!-- Dùng toán tử 3 ngôi -->
										<!-- Nếu id_country user chọn == với id_country trong database ? có thì selected : ko thì rỗng-->
										<option value="{{ $country->id }}" {{ $country->id == Auth::user()->id_country ? 'selected' : '' }}>{{ $country->name }}</option>
								<?php
									} //end foreach
								} // end if
								?>
							</select>
							<input type="text" value="{{ Auth::user()->phone  }}" name="phone" placeholder="123 456 7890" class="form-control form-control-line">
							<input type="file" name="avatar" />


							<button type="submit" class="btn btn-default" style="margin-bottom: 20px;">UPDATE</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection