<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product Info</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left mb-2">
					<h2>Add New Product</h2>
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

		<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">

				@csrf
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<b>Product Name:</b>
							<input type="text" name="title" class="form-control" placeholder="Product name">
							@error('title')
								<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
							@enderror
						</div>						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<b>Product Description:</b>
							<textarea class="form-control" name="description" style="height: 150px;" placeholder="Product Details"></textarea>
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
					</div>

					<button type="submit" class="btn btn-primary ml-3">Save</button>
				</div>
			
		</form>
	</div>

</body>
</html>