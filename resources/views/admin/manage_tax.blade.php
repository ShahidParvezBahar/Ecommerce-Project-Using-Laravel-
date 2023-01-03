@extends('admin/layout')
@section('page_title','Manage Tax')
@section('tax_select','active')
@section('container')
<h1 class="mb10">Manage Tax</h1>
<a href="{{url('admin/tax')}}">
	<button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('tax.manage_tax_process')}}" method="post">

					@csrf
						<div class="form-group">
							<label>Tax Value</label>
							<input type="text" name="tax_value" value="{{$tax_value}}" class="form-control">
							@error('tax_value')
								<div class="alert alert-danger">
									{{$message}}
								</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Tax Desc</label>
							<input type="text" name="tax_desc" value="{{$tax_desc}}" class="form-control">
							@error('tax_desc')
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