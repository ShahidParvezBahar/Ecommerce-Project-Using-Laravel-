@extends('admin/layout')
@section('page_title','Color')
@section('color_select','active')
@section('container')

{{session('message')}}
<h1 class="mb10">Manage Color</h1>
<a href="{{url('admin/color')}}">
	<button class="btn btn-success" type="button">Back</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('color.manage_color_process')}}" method="post">
							
							@csrf

							<div class="form-group">
								<label>Color</label>
								<input type="text" name="color" value="{{$color}}" class="form-control">
								@error('color')
								<div class="alert alert-danger">
									{{$message}}
								</div>
								@enderror
							</div>
							<div>
								<button type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
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