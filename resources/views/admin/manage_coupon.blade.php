@extends('admin/layout')
@section('page_title','Manage Coupon')
@section('container')
<h1 class="mb10">Manage Coupon</h1>
<a href="{{url('admin/coupon')}}">
	<button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('coupon.manage_coupon_process')}}" method="post">

					@csrf
						<div class="form-group">
							<label>Coupon Name</label>
							<input type="text" name="title" value="{{$title}}" class="form-control">
							@error('title')
								<div class="alert alert-danger">
									{{$message}}
								</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Coupon Code</label>
							<input type="text" name="code" value="{{$code}}" class="form-control">
							@error('code')
								<div class="alert alert-danger">
									{{$message}}
								</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Value</label>
							<input type="text" name="value" value="{{$value}}" class="form-control">
							@error('value')
								<div class="alert alert-danger">
									{{$message}}
								</div>
							@enderror
						</div>
						<div>
							<button type="submit" class="btn btn-lg btn-info block">Submit</button>
						</div>
						<input type="hidden" name="id" value="{{$id}}">			
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection