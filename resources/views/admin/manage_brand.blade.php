@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')

@error('image')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{$message}}  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
@enderror
<h1 class="mb10">Manage Brand</h1>

<a href="{{url('admin/brand')}}">
<button type="button" class="btn btn-success">
Back
</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">

                     @csrf

                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-8">
                           <label>Brand</label>
                           <input type="text" name="name" id="name" class="form-control" value="{{$name}}" required>
                           @error('name')
                           <div class="alert alert-danger">
                              {{$message}}
                           </div>
                           @enderror
                           </div>
                           <div class="form-group">
                           <label>Show in Homepage?</label>
                           <input type="checkbox" name="is_home" id="is_home" {{$is_home_selected}}>
                        </div>
                     </div>                      
                  </div>                

                     <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                        <div class="alert alert-danger">
                           {{$message}}
                        </div>
                        @enderror

                        @if($image!='')
                           <img width="75px" src="{{asset('storage/media/brand/'.$image)}}">
                        @endif
                     </div>
                     <div>
                           <button type="submit" class="btn btn-info btn-block">Submit</button>
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