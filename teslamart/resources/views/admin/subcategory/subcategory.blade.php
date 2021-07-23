@extends('admin.layouts.app')

@section('main_content')

 <div id="content" class="p-4 p-md-3  ">

       @include('admin.layouts.topnav')
       <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="javascript(0);">Dashboard</a></li>
		    <li class="breadcrumb-item"><a href="javascript(0);">Sub Category</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
		  </ol>
		</nav>

        <div class="row">
        	<div class="col-md-12">
        	<div class="card card-light">
              <div class="card-header text-center">
              	<div class="row">
              		<div class="col-md-6">
              			  <h3 class="card-title ">All Sub Categories</h3>
              		</div>
              		<div class="col-md-6 ">
              			<button type="button" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Add Sub Category</button>
              		</div>
              	</div>
              
              </div>



 
  </div>
 </div>
</div>


 



</div>
@endsection

{{-- @push('js')
 
@endpush --}}

@section('script')

 <script type="text/javascript">
 	$(document).ready(function(){
 		$('body').on('change', '#brandStatusID', function(){
 		var id = $(this).attr("data-id");
 		if (this.checked) {
 			var status = 1;
 		}else{
 			var status = 0;
 		}

 		$.ajax({
 			url: 'brandStatus/'+id+'/'+status,
 			method: 'get',
 			success:function(data){
 				if (data.success) {
 					 toastr.success(data.success);
 					}else if(data.failed){
 						toastr.success("Something went wrong!");
 					}
 				
 			}

 		});
 	})
 	});
 	
 </script>

@endsection