@extends('layouts.master')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid px-4">
            <div class="page-header-content pt-4">
                {{-- <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="tool"></i></div>
                            Rule App Menu
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">Optional page header content</div>
                </div> --}}
            </div>
        </div>
    </header>
<!-- Main page content-->
<div class="container-fluid px-4 mt-n10">       
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>    </h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Asset</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-sm-12">
                        <button type="button" class="btn btn-dark btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="fas fa-plus-square"></i> 
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modal-add-label">Add Asset</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ url('/form/store') }}" method="POST">
                                  @csrf
                                  <!-- Add hidden input fields for signature data -->
                                  <input type="hidden" name="user_signature" id="user-signature">
                                  <input type="hidden" name="it_staff_signature" id="it-staff-signature">
                                  <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                             <div class="form-group mb-2">
                                                <label for="">Select Asset</label>
                                                <select name="asset" id="asset" class="form-control" required>
                                                    <option value="">- Please Select Asset -</option>
                                                    @foreach ($asset as $assets)
                                                        <option value="{{ $assets->id }}">{{ $assets->name }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="form-group mb-2">
                                            <label for="">Quantity</label>
                                            <input value="0" type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" required>
                                             </div>
                                     </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="">Email User</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter User Email" required>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="qty">Loan Date</label>
                                                <input class="form-control" name="loan_date" type="date" required>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group mb-2">
                                              <label for="qty">Return Date</label>
                                              <input class="form-control" name="return_date" type="date" required>
                                          </div>                                            
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="">User Signature</label>
                                            <canvas id="user-signature-pad" class="signature-pad form-control"></canvas>
                                            <button type="button" id="clear-user-signature" class="btn btn-danger mt-2">Clear</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="">IT Staff Signature</label>
                                            <canvas id="it-staff-signature-pad" class="signature-pad form-control"></canvas>
                                            <button type="button" id="clear-it-staff-signature" class="btn btn-danger mt-2">Clear</button>
                                        </div>
                                    </div>
                                    
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          

                      <!--alert success -->
                      @if (session('status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div> 
                    @endif

                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{ session('failed') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> 
                  @endif
                    
                      <!--alert success -->
                      <!--validasi form-->
                        @if (count($errors)>0)
                          <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              <ul>
                                  <li><strong>Data Process Failed !</strong></li>
                                  @foreach ($errors->all() as $error)
                                      <li><strong>{{ $error }}</strong></li>
                                  @endforeach
                              </ul>
                          </div>
                        @endif
                      <!--end validasi form-->
                </div>
                <div class="table-responsive"> 
                <table id="tableUser" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Asset Name</th>
                    <th>User Email</th>
                    <th>Loan Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no=1;
                    @endphp
                    @foreach ($item as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->asset_name }}</td>
                        <td>{{ $data->user_email }}</td>
                        <td>{{ date('d F Y', strtotime($data->borrow_date)) }}</td>
                        <td>{{ date('d F Y', strtotime($data->expected_return_date)) }}</td>
                        <td>
                            @if($data->status == 'Available')
                                <span class="btn btn-sm btn-success">Available</span>
                            @elseif($data->status == 'Borrowed')
                                <span class="btn btn-sm btn-warning">Borrowed</span>
                            @elseif($data->status == 'Maintenance')
                                <span class="btn btn-sm btn-info">Maintenance</span>
                            @elseif($data->status == 'Lost')
                                <span class="btn btn-sm btn-danger">Lost</span>
                            @else
                                <span class="btn btn-sm btn-secondary">{{ $data->status }}</span>
                            @endif
                        </td>
                        <td>
                            <button title="Edit Rule" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-update{{ $data->id }}">
                                <i class="fas fa-edit"></i>
                              </button>
                            <button title="Delete Rule" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete{{ $data->id }}">
                                <i class="fas fa-trash-alt"></i>
                              </button>   
                        </td>
                    </tr>

                    {{-- Modal Update --}}
                    <div class="modal fade" id="modal-update{{ $data->id }}" tabindex="-1" aria-labelledby="modal-update{{ $data->id }}-label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="modal-update{{ $data->id }}-label">Edit Rule</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/mst/update/'.encrypt($data->id)) }}" method="POST">
                              @csrf
                              @method('post')
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">Asset No.</label>
                                            <input value="{{$data->asset_no}}" type="text" class="form-control" id="asset_no" name="asset_no" placeholder="Enter Asset No." required>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">Asset Name</label>
                                            <input value="{{$data->name}}" type="text" class="form-control" id="asset_name" name="asset_name" placeholder="Enter Asset Name" required>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="">Asset Description</label>
                                            <textarea  class="form-control" name="asset_description" cols="30" rows="5" required>{{$data->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="qty">Asset Quantity</label>
                                            <input value="{{$data->qty}}" class="form-control" name="qty" type="number" value="0" required>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-8">
                                        {{-- <div class="form-group">
                                            <label for="">Asset Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="{{$data->status}}">{{$data->status}}</option>
                                                @foreach ($dropdown as $status)
                                                    <option value="{{ $status->name_value }}">{{ $status->name_value }}</option>
                                                @endforeach
                                              </select>
                                            </div> --}}
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    {{-- Modal Update --}}

                    {{-- Modal Delete --}}
                    <div class="modal fade" id="modal-delete{{ $data->id }}" tabindex="-1" aria-labelledby="modal-delete{{ $data->id }}-label" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" id="modal-delete{{ $data->id }}-label">Delete Asset</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/mst/delete/'.encrypt($data->id)) }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="modal-body">
                                <div class="form-group">
                                Are you sure you want to delete <label for="rule">{{ $data->name }}</label>?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    {{-- Modal Delete --}}

                    {{-- Modal Access --}}
                    <div class="modal fade" id="modal-access}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Give User Access</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="{{ url('') }}" enctype="multipart/form-data" method="GET">
                          @csrf
                          <div class="modal-body">
                            
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                    <!-- /.modal-dialog -->
                    </div>
                    {{-- Modal Revoke --}}

                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

     
</main>
<!-- For Datatables -->
<script>
    $(document).ready(function() {
      var table = $("#tableUser").DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });
    });
  </script>
<script>
  // Initialize Signature Pads
  var userCanvas = document.getElementById('user-signature-pad');
  var userCtx = userCanvas.getContext('2d');
  var userDrawing = false;
  var lastUserX, lastUserY;
  var userSignatureData; // Variable to store user signature data

  var itStaffCanvas = document.getElementById('it-staff-signature-pad');
  var itStaffCtx = itStaffCanvas.getContext('2d');
  var itStaffDrawing = false;
  var lastItStaffX, lastItStaffY;
  var itStaffSignatureData; // Variable to store IT staff signature data

  // Add event listeners for user signature
  userCanvas.addEventListener('mousedown', function(e) {
      userDrawing = true;
      lastUserX = e.offsetX;
      lastUserY = e.offsetY;
  });

  userCanvas.addEventListener('mousemove', function(e) {
      if (userDrawing === true) {
          drawUser(e.offsetX, e.offsetY);
          lastUserX = e.offsetX;
          lastUserY = e.offsetY;
      }
  });

  userCanvas.addEventListener('mouseup', function() {
      userDrawing = false;
      userSignatureData = userCanvas.toDataURL(); // Convert user signature to base64 data
  });

  userCanvas.addEventListener('mouseleave', function() {
      userDrawing = false;
  });

  // Add event listeners for IT staff signature
  itStaffCanvas.addEventListener('mousedown', function(e) {
      itStaffDrawing = true;
      lastItStaffX = e.offsetX;
      lastItStaffY = e.offsetY;
  });

  itStaffCanvas.addEventListener('mousemove', function(e) {
      if (itStaffDrawing === true) {
          drawItStaff(e.offsetX, e.offsetY);
          lastItStaffX = e.offsetX;
          lastItStaffY = e.offsetY;
      }
  });

  itStaffCanvas.addEventListener('mouseup', function() {
      itStaffDrawing = false;
      itStaffSignatureData = itStaffCanvas.toDataURL(); // Convert IT staff signature to base64 data
  });

  itStaffCanvas.addEventListener('mouseleave', function() {
      itStaffDrawing = false;
  });

  // Add event listener to clear user signature
  document.getElementById('clear-user-signature').addEventListener('click', function() {
      clearCanvas(userCanvas, userCtx);
      userSignatureData = null; // Clear user signature data
  });

  // Add event listener to clear IT staff signature
  document.getElementById('clear-it-staff-signature').addEventListener('click', function() {
      clearCanvas(itStaffCanvas, itStaffCtx);
      itStaffSignatureData = null; // Clear IT staff signature data
  });

  function drawUser(x, y) {
      userCtx.beginPath();
      userCtx.moveTo(lastUserX, lastUserY);
      userCtx.lineTo(x, y);
      userCtx.strokeStyle = 'black';
      userCtx.lineWidth = 2;
      userCtx.stroke();
      userCtx.closePath();
  }

  function drawItStaff(x, y) {
      itStaffCtx.beginPath();
      itStaffCtx.moveTo(lastItStaffX, lastItStaffY);
      itStaffCtx.lineTo(x, y);
      itStaffCtx.strokeStyle = 'black';
      itStaffCtx.lineWidth = 2;
      itStaffCtx.stroke();
      itStaffCtx.closePath();
  }

  function clearCanvas(canvas, ctx) {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
  }

  // Add event listeners for mouse actions on user signature canvas
  userCanvas.addEventListener('mouseup', function() {
        userDrawing = false;
        userSignatureData = userCanvas.toDataURL(); // Convert user signature to base64 data
        document.getElementById('user-signature').value = userSignatureData; // Update hidden input value
    });

    // Add event listeners for mouse actions on IT staff signature canvas
    itStaffCanvas.addEventListener('mouseup', function() {
        itStaffDrawing = false;
        itStaffSignatureData = itStaffCanvas.toDataURL(); // Convert IT staff signature to base64 data
        document.getElementById('it-staff-signature').value = itStaffSignatureData; // Update hidden input value
    });
</script>


@endsection