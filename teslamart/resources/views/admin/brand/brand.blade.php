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
        	<div class="col-md-12">
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



<section class="content">
    {{--   <div class="container-fluid"> --}}
        <div class="row">
          <div class="col-md-12">
 

            <div class="card">
              <div class="card-header">
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
	                  <tr>
	                    <th>Sl No</th>
	                    <th>Brand Name</th>
	                    <th>Brand Slug</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                  </tr>
                  </thead>
                  <tbody>

                  	@foreach($brands as $key => $brand)
	                  <tr>
	                    <td>{{ ++$key }}</td>
	                    <td>{{ $brand->brand_name }}</td>
	                    <td>{{ $brand->brand_slug }}</td>
	                    @if($brand->brand_status == 1)
	                     <td><span class="badge badge-success">Active</span></td>
	                    @else
	                     <td><span class="badge badge-danger">InActive</span></td>
	                    @endif
	                   
	                    <td>
		                    @if($brand->brand_status == 1)
		                     <a href="{{ route('brand.deactive-status',$brand->id) }}" class=" badge badge-success" style="font-size: 20px; margin-right: 3px; " title="Deactivate Status"><i class="fa fa-arrow-down"></i></a>
		                    @else
		                      <a href="{{ route('brand.active-status',$brand->id) }}" class="badge badge-info" style="font-size: 20px; margin-right: 3px; " title="Activate Status"><i class="fa fa-arrow-up"></i></a>
		                    @endif
	                    	<a href="#" class="badge badge-success" style="font-size: 20px; margin-right: 3px;" title="Edit Brand"><i class="fa fa-pencil"></i></a>
	                    	<a href="{{ route('brand.delete',$brand->id) }}" class="badge badge-danger" style="font-size: 20px;"   title="Delete Brand" id="delete"><i class="fa fa-trash"></i> </a>
 
	                    </td>
	                  </tr>
                  @endforeach
                  
                  </tbody>
                  <tfoot>
	                  <tr>
	                    <th>Sl No</th>
	                    <th>Brand Name</th>
	                    <th>Brand Slug</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
     {{--  </div> --}}
      <!-- /.container-fluid -->
    </section>
             
  </div>
 </div>
</div>



        <!-- Button trigger modal -->
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
         <form role="form" method="POST" action="{{ route('brand.add-brand') }}">
            	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" name="brand_name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Logo" name="brand_logo">
                  </div>
 
              
                </div>
               

              
                
                <div class="modal-footer">
      	  <button type="submit" class="btn btn-primary">Save Brand</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
              </form>  
      </div>

    </div>
  </div>
</div>



</div>
@endsection

@push('js')
 
@endpush