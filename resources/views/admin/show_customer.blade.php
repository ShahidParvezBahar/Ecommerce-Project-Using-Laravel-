@extends('admin/layout')
@section('page_title','Show Customer Details')
@section('customer_select','active')
@section('container')

<h1 class="mb10">Customer Details</h1>

<div class="row m-t-30">
	<div class="col-md-8">
		<div class="table-responsive m-b-10">
			<table class="table table-borderless table-data3">
				<tbody>
					<tr>
						<td><b>Name</b></td>
						<td>{{$customer_list->name}}</td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>{{$customer_list->email}}</td>
					</tr>
					<tr>
						<td><b>Mobile</b></td>
						<td>{{$customer_list->mobile}}</td>
					</tr>
					<tr>
						<td><b>Adress</b></td>
						<td>{{$customer_list->address}}</td>
					</tr>
					<tr>
						<td><b>City</b></td>
						<td>{{$customer_list->city}}</td>
					</tr>
					<tr>
						<td><b>State</b></td>
						<td>{{$customer_list->state}}</td>
					</tr>
					<tr>
						<td><b>Zip</b></td>
						<td>{{$customer_list->zip}}</td>
					</tr>
					<tr>
						<td><b>Name</b></td>
						<td>{{$customer_list->name}}</td>
					</tr>
					<tr>
						<td><b>Company</b></td>
						<td>{{$customer_list->company}}</td>
					</tr>
					<tr>
						<td><b>GST No</b></td>
						<td>{{$customer_list->gstin}}</td>
					</tr>
					<tr>
						<td><b>Created On</b></td>
						<td>{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-y h:i')}}</td>
					</tr>
						<tr>
						<td><b>Updated On</b></td>
						<td>{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-y h:i')}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection