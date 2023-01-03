@extends('admin/layout')
@section('page_title','Home Banner')
@section('home_banner_select','active')
@section('container')

<h1 class="mb10">Manage Home Banner</h1>

<a href="{{url('admin/home_banner')}}">
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
                  <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">

                     @csrf

                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-8">
                           <label>Btn Text</label>
                           <input type="text" name="btn_txt" id="btn_txt" class="form-control" value="{{$btn_txt}}" required>           
                           </div>                                      
                               

                     <div class="form-group">
                        <label>Btn Link</label>
                        <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{$btn_link}}">                     

                     </div>
                      </div>
                      </div>

                     <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')

                           <div class="alert alert-danger">
                              {{$message}}
                           </div>
                        @enderror
                     

                     @if($image !='')
                        <a href="{{asset('storage/media/banner/'.$image)}}" target="_blank"><img src="{{asset('storage/media/banner/'.$image)}}" width="75px"></a>
                     @endif
                     </div>

                     <div>
                        <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
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