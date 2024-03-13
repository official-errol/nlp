@extends('layouts.admin')

@section('link')

  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
  <style>
    #map {
      height: 400px;
    }

    #map2 {
      height: 400px;
    }

    #location-detail , #location-detail2 {
      display: none
    }
  </style>
@endsection

@section('content')

    <div class="card-body">
        <!------Table 2 ---->
    	<div class="card mb-2">
                <div class="card-header">
           
               
                    <i class=" fas fa-newspaper mr-1"></i>
                      List of Datasets

                    <button type="button" class="btn btn-success btn-sm float-right" id="btnAdd" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus mr-1"></i>
					  Add Dataset
					</button>
                </div>
      			<div class="card-body">
	      			<table id="example1" class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th width="50">#</th>
                    <th>Link</th>
                    <th>Data</th>
            
                    <th width="50">Category</th>
               
                    <th width="100">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    @foreach($des as $des)
	                  <tr>
	                    <td><?php echo $i ?></td>
	                  
	                    <td>{{$des->link}}</td>
                     
	                      <td>{{$des->data}}</td>
	                    
	                      <td> {{$des->category}}  </td>
	    
                      <td>
                        
                      
                        <a href="/admin/delete-map/{{$des->id}}"  type="button" class="btn btn-block btn-danger btn-sm "
                          data-id="{{$des->id}}"
                        ><i class="fas fa-trash-alt"></i></a>
                        <a href="#" type="button" class="btn btn-block btn-success btn-sm btn-edit"
                          data-id="{{$des->id}}"
                          data-name="{{$des->link}}"
                          data-latitude="{{$des->data}}"
         
                          data-category="{{$des->category}}"
          
                        >
                          <i class="fas fa-edit"></i>

                        </a>

                      
                      </td>
	                  </tr>
                    <?php $i++?>
                  @endforeach
                  </tbody>
                 
                </table>
	            </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Dataset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/save-dataset" enctype="multipart/form-data" method="POST">
       	@csrf
      <div class="modal-body">
     
      
		  <div class="form-group">
		    <label for="inputAddress">Link</label>
		    <input type="text" name="link" class="form-control" id="inputAddress" placeholder="URL Link">
		  </div>

		 


     

      <div class="row">
       

        <div class="col-6">
           

          <div class="form-group">
            <label for="inputAddress">Category</label>
            <select class="form-control" name="category">
              <option selected disabled> -- Select -- </option>
              <option value="fake"> Fake</option>
              <option value="verify"> Verified</option>
            
              
            </select>
            
          </div>


        </div>


        
      </div>
		  

		 
		  

      <div class="form-group">
        <label for="inputAddress">Dataset</label>
        <textarea name="data" class="form-control" id="inputAddress" > </textarea> 
      </div>
		 
		<!-- END BODY -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL -->


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Dataset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/admin/update-map" enctype="multipart/form-data" method="POST">
        @csrf
      <div class="modal-body">
      <!-------------------------   START BODY  ------------------------------------>
     <div class="form-group">
        <label for="inputAddress">Link</label>
        <input type="text" name="link" class="form-control" id="inputEditLink" placeholder="URL Link">
        <input type="hidden" name="id" id="inputEditId">
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="inputAddress">Category</label>
            <select class="form-control" name="category" id="inputEditCategory">
              <option selected disabled> -- Select -- </option>
              <option value="fake"> Fake</option>
              <option value="verify"> Verified</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Dataset</label>
        <textarea name="data" class="form-control" id="inputEditData" > </textarea> 
      </div>
     
    <!-- END BODY -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL -->



<!-- EDIT Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update File Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/admin/update-map" enctype="multipart/form-data" method="POST">
        @csrf
      <div class="modal-body">
      
        <div class="row">
          <div class="col-12 ">
            <div class="form-group">
            <label for="inputAddress">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Hotel Name">
            <input type="hidden" name="id" id="inputId">
         </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL -->
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>

                                                                                                                                                       

@endsection

@section('other_script')

<script>
  // Initialize Leaflet map


    var map = L.map('map').setView([11.32559, 124.73491], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);


    var map2 = L.map('map2').setView([11.32559, 124.73491], 13);
       
  // Add a tile layer (for example, OpenStreetMap)


  
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map2);

  
  // Function to display latitude and longitude on click
  function onMapClick(e) {
 
    $('#latitudeMark').html(e.latlng.lat.toFixed(5));
    $('#longitudeMark').html(e.latlng.lng.toFixed(5));
    $('#location-detail').show();
 
  }

  function onMapClick2(e) {
 
    $('#latitudeMark2').html(e.latlng.lat.toFixed(5));
    $('#longitudeMark2').html(e.latlng.lng.toFixed(5));
    $('#location-detail2').show();
 
  }

 

  // Add click event listener to the map
  map.on('click', onMapClick);
  map2.on('click', onMapClick2);

  

  
  // Function to display latitude and longitude on click
  

 

  // Add click event listener to the map
  

  
  
</script>

<script>

  function offcanvas(){
            var offcanvasTarget = $('#offcanvasScrolling');
            var offcanvas = new bootstrap.Offcanvas(offcanvasTarget[0]);
            offcanvas.show();
  }

 


$(document).ready(function() {


    $('.btn-image').click(function(e){
      e.preventDefault();
      let path = $(this).data('path');
      $('#imageVIew').attr('src', path);
      $('#modalImage').modal('show');
    });

    $(document).on('click', '.btn-edit', function(e){
   
        e.preventDefault();
        let id = $(this).data('id');
        let link = $(this).data('link');

        let data = $(this).data('data');

  
        let category = $(this).data('category');

        
      


        $('#inputEditId').val(id);
        $('#inputEditLink').val(link);
        $('#inputEditData').val(data);
 
        $('#inputEditOldCategory').val(category);

        

   
        $('#editModal').modal('show');
    });

    $("#example1").DataTable({
      "responsive": true,
       "lengthChange": false, 
       "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('.btn-delete').click(function(e){
        e.preventDefault();
    let id = $(this).data('id');
  

    Swal.fire({
      title: 'Are you sure you want to delete this?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {

        // AJAX
        $.ajax({
              
              url: "{{ URL::to('/') }}/admin/deleted-map",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",        
                id: id,
              },
             
              cache: false,
              success: function(data){
                  let message = data.message;
                  console.log(message);
                  if(message){
                    Swal.fire(
                'Deleted!',
                'Marker  has been deleted.',
                'success'
              ).then(function(){
                          window.location.reload();
                        });
                  }
                 
              }

        });
        // END AJAX
        
      }
    })
  

  });
 
  });
</script>

@if(session('save-success'))
<script>
  $(function () {
      toastr.success('<?php echo session('save-success') ?>')
 
  });
</script>

@endif

@if(session('save-error'))
<script>
  $(function () {
      toastr.error('<?php echo session('save-error') ?>')
 
  });
</script>

@endif

@endsection