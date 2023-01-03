@extends('admin/layout')
@section('page_title','Manage Size')
@section('container')
<h1 class="mb10">Manage Size</h1>
<a href="{{url('admin/size')}}">
	<button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('size.manage_size_process')}}" method="post">

					@csrf
						<div class="form-group">
							<label>Size Name</label>
							<input type="text" name="size" value="{{$size}}" class="form-control">
							@error('size')
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