@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')
<h1 class="mb10">Manage Category</h1>
<a href="{{url('admin/category')}}">
	<button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">

					@csrf
						
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">								
									<label>Category Name</label>
									<input type="text" name="category_name" value="{{$category_name}}" class="form-control">
									@error('category_name')
										<div class="alert alert-danger">
											{{$message}}
										</div>
									@enderror
								</div>								
							</div>							
										
								
							<div class="col-md-4">
									<label>Parent Category</label>
									<select id="parent_category_id" name="parent_category_id" class="form-control">
										<option value="">
											Select Category
										</option>
										@foreach($category as $list)
											@if($parent_category_id == $list->id)
										<option selected value="{{$list->id}}">
											@else
										<option value="{{$list->id}}">
											@endif
											{{$list->category_name}}									
										</option>
										@endforeach
									</select>
								</div>							
						

						<div class="form-group">
							<label>Category Slug</label>
							<input type="text" name="category_slug" value="{{$category_slug}}" class="form-control">
							@error('category_slug')
								<div class="alert alert-danger">
									{{$message}}
								</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="category_image" id="category_image" class="form-control">
							@error('category_image')
							<div class="alert alert-danger">
								{{$message}}
							</div>
							@enderror

							@if($category_image !='')
								<a href="{{asset('storage/media/category/'.$category_image)}}" target="_blank">
									<img src="{{asset('storage/media/category/'.$category_image)}}" width="75px">
								</a>
							@endif
						</div>
					</div>

						<div class="form-group">
							<label>Show in Homepage?</label>
							<input type="checkbox" name="is_home" id="is_home" {{$is_home_selected}}>
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