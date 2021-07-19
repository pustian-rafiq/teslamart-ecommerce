@extends('admin.layouts.app')

@section('main_content')

 <div id="content" class="p-4 p-md-3  ">

       @include('admin.layouts.topnav')
       <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="javascript(0);">Dashboard</a></li>
		    <li class="breadcrumb-item"><a href="javascript(0);">Brand</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
		  </ol>
		</nav>

        <div class="row">
        	<div class="col-md-8 offset-md-2">
        	<div class="card card-light">
              <div class="card-header text-center">
              	<div class="row">
              		<div class="col-md-6">
              			  <h3 class="card-title ">All Brands</h3>
              		</div>
              		<div class="col-md-6 ">
              			<button type="button" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Add Brand</button>
              		</div>
              	</div>
              
              </div>


        <form role="form" method="POST" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" value="{{ $brand->brand_name }}" name="brand_name">
         @error('brand_name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Logo" name="brand_logo">
                   
                  </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Old Logo</label>
                <img height="70" width="70" src="{{ URL::to($brand->brand_logo) }}" >
                <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
              </div>
    
                </div>
       
                <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Brand</button>
       
        
      </div>
   </form> 



 
             
  </div>
 </div>
</div>


 

</div>
@endsection

{{-- @push('js')
 
@endpush --}}

@section('script')

 

@endsection