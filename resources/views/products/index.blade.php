<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Products Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Product Details Info</h2>
				</div>
				<div class="pull-right mb-2">
					<a href="{{route('posts.create')}}" class="btn btn-primary">Insert Products</a>
				</div>
			</div>
		</div>
		@if($message = session('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif

		<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Description</th>
				<th width="280px">Action</th>
			</tr>
			@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td><img src="{{Storage::url($post->image)}}" height="75" width="75"></td>
				<td>{{$post->title}}</td>
				<td>{{$post->description}}</td>
				<td>
					<form action="{{route('posts.destroy',$post->id)}}" method="post">
						<a href="{{route('posts.edit',$post->id)}}" class="btn btn-info">Edit</a>

					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		{!! $posts->links() !!}
	</div>
</body>
</html>