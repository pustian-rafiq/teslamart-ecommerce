@extends('admin.layouts.app')

@section('main_content')

 <div id="content" class="p-4 p-md-3  ">

       @include('admin.layouts.topnav')
       <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="javascript(0);">Dashboard</a></li>
		    <li class="breadcrumb-item"><a href="javascript(0);">Category</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
		  </ol>
		</nav>

     <div class="row">
        <div class="col-md-12">
        	<div class="card card-light container d-none" id="CategoryMainDiv" >
              <div class="card-header text-center">
              	<div class="row">
              		<div class="col-md-6">
              			  <h3 class="card-title ">All Categories</h3>
              		</div>
              		<div class="col-md-6 ">
              			<button type="button" id="addNewCategoryBtnId" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Add Category</button>
              		</div>
              	</div>
              </div>

    <section class="content">
   
        <div class="row">
          <div class="col-md-12">
 

            <div class="card">
              <div class="card-header">
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categoryDataTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Brand Name</th>
                      <th>Brand Slug</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody id="category_table">
 
                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sl No</th>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
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
   
    </section>

 </div>
      </div>
    </div>


 

<!-- Category Add Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {{-- Show error message --}}
         
      {{--    <form role="form"   id="addCategoryForm"> --}}
              
                <div class="card-body">

                  <div class="form-group">
                    <label for="updatebrand_name">Category Name</label>
                    <input  type="text" class="form-control" id="categoryNameID" placeholder="Enter Category Name" value="{{ old('brand_name') }}" name="brand_name">
                     
                  </div>

     
                </div>
               <div class="modal-footer">
          <button type="submit" id="categoryAddConfirmBtn" class="btn btn-primary">Save Category</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
             {{--  </form>   --}}
      </div>

    </div>
  </div>
</div>


<!-- Category Edit Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {{-- Show error message --}}
         
      {{--    <form role="form"   id="addCategoryForm"> --}}
              
                <div class="card-body" id="categoryEditForm">

                  <h5 id="categoryEditId" class="mt-4 d-none">  </h5>
                  <div class="form-group">
                    <label for="updatebrand_name">Category Name</label>
                    <input  type="text" class="form-control" id="categoryNameEditID" value="{{ old('category_name') }}" name="brand_name">
                    </div>

               </div>

                <img id="categoryEditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                  <h5 id="categoryEditWrong" class="d-none">Something Went Wrong !</h5>


               <div class="modal-footer">
          <button type="submit" id="CategoryUpdateConfirmBtn" class="btn btn-primary">Update Category</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
             {{--  </form>   --}}
      </div>

    </div>
  </div>
</div>

</div>
@endsection

{{-- @push('js')
 
@endpush --}}

@section('script')



{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>  --}}
 <script type="text/javascript">

 getCategoryData();

// This code is for fetching data from databas using jqeury axios method

function getCategoryData(){
  axios.get('/admin/category/getCategory')
  .then( function(response){
      if (response.status == 200) {

            $('#CategoryMainDiv').removeClass('d-none');
            $('#CourseLoaderDiv').addClass('d-none');

               $('#categoryDataTable').DataTable().destroy();
               $('#category_table').empty();


       var jsonData = response.data;

       $.each(jsonData, function(i, item) {
        var s = i+1;
                $('<tr>').html(
                    "<td>"+ s+"</td>" +
                    "<td>"+jsonData[i].cat_name+"</td>" +
                    "<td>"+jsonData[i].cat_slug+"</td>" +

                    "<td> <input type='checkbox' id='categorytatusID' data-id="+ jsonData[i].id + " data-off='Deactives' data-on='Active'  data-toggle='toggle'></td>" + 
                   

      /// "<td id='categorytatusID'>"+jsonData[i].cat_status+" == 1? 'Active':'Deactive'</td>" +   


                    

                    "<td><a  class='categoryEditBtn' data-id=" + jsonData[i].id + "><i class='fa fa-edit'></i></a></td>" +
                    "<td><a  class='categoryDeleteBtn' id='deleteCategory'   data-id=" + jsonData[i].id +" ><i class='fa fa-trash'></i></a></td>"

                ).appendTo('#category_table');
            });

       


              $("#categoryDataTable").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "scrollX": true,
                  });

               //Category Table Edit Icon Click
                  $('.categoryEditBtn').click(function() {
                  var id = $(this).data('id');
                  $('#categoryEditId').html(id);
                  CategoryUpdateDetails(id);
                  $('#editCategoryModal').modal('show');

                 })

               //$('#categoryDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
      
          }
        }).catch( function(error){
          console.log(error);
            // $('#CourseLoaderDiv').addClass('d-none');
            // $('#CourseWrongDiv').removeClass('d-none');

  });
}

// Get Updated details of particular category
function CategoryUpdateDetails(detailsID){
    axios.post('/admin/category/getCategoryDetails',{id: detailsID})
    .then(function(response){

        if (response.status == 200) {

// When data is successfully returned, Add display none class for hiding loader and service edit form is visible
            $('#categoryEditForm').removeClass('d-none');
            $('#categoryEditLoader').addClass('d-none');

            var jsonData = response.data;

                $('#categoryNameEditID').val(jsonData[0].cat_name);
                
        }else{
            $('#categoryEditWrong').removeClass('d-none');
            $('#categoryEditLoader').addClass('d-none');
        }

    }).catch(function(error){
          $('#categoryEditWrong').removeClass('d-none');
          $('#categoryEditLoader').addClass('d-none');
    });

}

 // When Save btn is cicked, then categoryUpdate method works for updating data.
$('#CategoryUpdateConfirmBtn').click(function() {

    var categoryID=$('#categoryEditId').html();
    var  categoryName=$('#categoryNameEditID').val();
    
    CategoryUpdate(categoryID,categoryName);
});

function CategoryUpdate(categoryID,categoryName){

    //Check validation
     if(categoryName.length==0){
     toastr.error('Course Name is Empty !');
    }else{
      $('#CategoryUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/admin/category/categoryUpdate',{

            id: categoryID,
            cat_name: categoryName,
             

        }).then(function(response){
      $('#CategoryUpdateConfirmBtn').html("Update Category");
            if(response.status == 200){
                if(response.data == 1){
                $('#editCategoryModal').modal('hide');
                 getCategoryData();  // use this for page refresh
                toastr.success('Data Updated Successfully');
               
            }else{
                $('#editCategoryModal').modal('hide');
                 getCategoryData();  // use this for page refresh
                toastr.error('Data Updated Failure !');
               
            }
            }else{
                $('#editCategoryModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }
           

        }).catch(function(error){
            $('#editCategoryModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });
       } 
}

// Show Category add modal when Add New Button is clicked

$('#addNewCategoryBtnId').click(function(){
    $('#addCategoryModal').modal('show');
});
// When Save btn is cicked, then ServiceUpdate method works for updating data.
$('#categoryAddConfirmBtn').click(function() {
  
    var categoryName = $('#categoryNameID').val();
     
    AddNewCategory(categoryName);
});

function AddNewCategory(categoryName){
   if(categoryName.length==0){
    alert('Category name is empty');
     // toastr.error('Category Name is Empty !');
    }else{
  $('#categoryAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/admin/category/addNewCategory',{
        cat_name: categoryName,
         

    }).then(function(response){
  $('#categoryAddConfirmBtn').html("Save Category");
        if(response.status == 200){

            if(response.data == 1){
            $('#addCategoryModal').modal('hide');
             getCategoryData();  // use this for page refresh
            toastr.success('Data Inserted Successfully');
           
            }else{
                $('#addCategoryModal').modal('hide');
                categoryName ='';
                getCategoryData();  // use this for page refresh
                toastr.error('Data Inserted Fails !');
              
            }
        }else{
            $('#addCategoryModal').modal('hide');
            toastr.error('Something Went Wrong !');
            getCategoryData(); 
        }
       
    
    }).catch(function(er){
        $('#addCategoryModal').modal('hide');
      // toastr.error('Something Went Wrong !');
    });
   } 
}
 // Delete Category without page refresh using ajax
 
//  	$(document).ready(function () {

//  $("body").on("click",".categoryDeleteBtn",function(e){

//     // if(!confirm("Do you really want to do this?")) {
//     //    return false;
//     //  }

//     e.preventDefault();
//     var id = $(this).data("id");
//     // var id = $(this).attr('data-id');
//     //var token = $("meta[name='csrf-token']").attr("content");
//     //var url = e.target;

//     $.ajax(
//         {
//           url: '/admin/category/delete/'+id, //or you can use url: "company/"+id,
//           type: 'get',
//           success:function(data){
//         if (data.success) {
          
//            toastr.success(data.success);
//             getCategoryData();
//           }else if(data.failed){
//             toastr.success("Something went wrong!");
//              getCategoryData();
//           }
        
//       }
//      });
//       return false;
//    });
    

// });
 </script>

<!--Delete Category with page refresh and sweet alert-->
 <script>  
         $(document).on("click", "#deleteCategory", function(e){
             e.preventDefault();
             //var link = $(this).attr("href");
             var id =$(this).attr("data-id");
          var link = '/admin/category/delete/'+id;//or you can use url: "company/"+id,

                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>  

 
<script>
  
</script>
@endsection