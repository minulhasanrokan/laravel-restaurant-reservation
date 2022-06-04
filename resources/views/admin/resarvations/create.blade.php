@extends('layouts.admin')

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" >Restaurant Reservation</a>
    <a class="breadcrumb-item" >Pages</a>
    <span class="breadcrumb-item active">Create Category</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <a href="{{route('admin.resarvations.index')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> All Resarvations</button></a>
      </div><!-- col-sm -->
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <form method="POST" action="{{route('admin.resarvations.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <label class="col-sm-4 form-control-label">First Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input name="fast_name" type="text" class="form-control" placeholder="Enter First Name" required>
                </div>
              </div><!-- row -->
              <div class="row">
                <label class="col-sm-4 form-control-label">Last Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-20">
                  <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name" required>
                </div>
              </div><!-- row -->

              <div class="row">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-20">
                  <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                </div>
              </div><!-- row -->
              <div class="row">
                <label class="col-sm-4 form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-20">
                  <input name="mobile" type="text" class="form-control" placeholder="Enter Mobile Number" required>
                </div>
              </div><!-- row -->
              <div class="row ">
                <label class="col-sm-4 form-control-label">Reservation Date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-20">
                   <input name="date" type="datetime-local" class="form-control" placeholder="Enter Reservation Date" required>
                </div>
              </div>
              <div class="row ">
                <label class="col-sm-4 form-control-label">Guest Number: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-20">
                   <input name="guest_number" type="number" class="form-control" placeholder="Enter Guest Number" required>
                </div>
              </div>
              <div class="row">
                  <label class="col-sm-4 form-control-label">Select Table: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-20 ">
                    <select class="form-control select2-show-search" name="table" required>
                      <option label="Select Table" value="">Select Table</option>
                      @foreach($tables as $table)
                      <option value="{{$table->id}}">{{$table->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              <div class="row">
                  <label class="col-sm-4 form-control-label">Reservation Status: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-20">
                    <select class="form-control select2-show-search" name="status" required>
                      <option label="Choose one">Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Panding</option>
                    </select>
                  </div>
                </div>
              <div class="form-layout-footer mg-t-20">
                <button  style="float: right !important;" class="btn btn-info mg-r-5">Create Reservation</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- card -->
          </div><!-- col-6 -->
         
        </div><!-- row -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section("css")

    <link href="{{asset('/assets/')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/assets/')}}/css/starlight.css">

@endsection

@section("js")
    <script src="{{asset('/assets/')}}/lib/jquery/jquery.js"></script>
    <script src="{{asset('/assets/')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('/assets/')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('/assets/')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="{{asset('/assets/')}}/js/starlight.js"></script>

@endsection