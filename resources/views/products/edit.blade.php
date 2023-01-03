<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Products</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Edit Product Info</h2>
				</div>
				<div class="pull-right">
					<a href="{{route('posts.index')}}" class="btn btn-primary">Back</a>
				</div>
			</div>
		</div>

		@if(session('status'))
		<div class="alert alert-success mb-1 mt-1">
			{{session('status')}}
		</div>
		@endif

		<form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">

			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<b>Product Name:</b>
							<input type="text" name="title" class="form-control" placeholder="Product name" value="{{$post->title}}">
							@error('title')
								<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
							@enderror
						</div>						
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<b>Product Description:</b>
							<textarea class="form-control" style="height:150px" name="description" placeholder="Enter Product Details">{{$post->description}}</textarea>
							@error('description')
								<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
							@enderror
						</div>						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<b>Product Image:</b>
							<input type="file" name="image" class="form-control" placeholder="Product Image">
							@error('image')
								<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
							@enderror
						</div>

						<div class="form-group">
							<img src="{{Storage::url($post->image)}}" height="200" width="200" alt="" />
						</div>						
					</div>

					<button type="submit" class="btn btn-primary ml-3">Update</button>

			</div>
			
		</form>
	</div>

</body>
</html>