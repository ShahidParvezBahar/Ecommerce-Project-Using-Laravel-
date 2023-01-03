@extends('admin/layout')
@section('page_title','Size')
@section('size_select','active')
@section('container')

{{session('message')}}
<h1 class="mb10">Category</h1>
<a href="{{url('admin/size/manage_size')}}">
	<button class="btn btn-success" type="button">Add Size</button>
</a>

<div class="row m-t-30">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">

			<thead>
				<tr>
				<th>ID</th>
				<th>Size</th>
				<th>Action</th>				
				</tr>
			</thead>
			<tbody>
				@foreach($data as $list)
					<tr>
						<td>{{$list->id}}</td>
						<td>{{$list->size}}</td>
						
						<td>
							<a href="{{url('admin/size/manage_size/')}}/{{$list->id}}">
								<button type="button" class="btn btn-primary">Edit</button>
							</a>
							@if($list->status == 1)
							<a href="{{url('admin/size/status/0')}}/{{$list->id}}">
								<button type="button" class="btn btn-success">Active</button>
							</a>
							@elseif($list->status == 0)
							<a href="{{url('admin/size/status/1')}}/{{$list->id}}">
								<button type="button" class="btn btn-warning">Deactive</button>
							</a>
							@endif
							<a href="{{url('admin/size/delete/')}}/{{$list->id}}">
								<button type="button" class="btn btn-danger">Delete</button>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>

@endsection