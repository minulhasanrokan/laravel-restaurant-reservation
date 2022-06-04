@extends('layouts.admin')

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" >Restaurant Reservation</a>
    <a class="breadcrumb-item" >Pages</a>
    <span class="breadcrumb-item active">Edit Table</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
      <div class="col-sm-6 col-md-2">
        <a href="{{route('admin.tables.index')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> All Table</button></a>
      </div><!-- col-sm -->
      <div class="col-sm-6 col-md-2">
        <a href="{{route('admin.tables.create')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> Create Table</button></a>
      </div><!-- col-sm -->
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <form method="POST" action="{{route('admin.tables.update',$table->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row">
                <label class="col-sm-4 form-control-label">Table Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input name="name" value="{{$table->name}}" type="text" class="form-control" placeholder="Enter table Name">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Table Guest Number: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input name="guest_number" value="{{$table->guest_number}}" type="number" class="form-control" placeholder="Table Guest Number">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Table Description: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea name="description" rows="2" class="form-control" placeholder="Enter your address">{{$table->name}}</textarea>
                </div>
              </div>
              <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Table Location: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2-show-search" name="location">
                      <option label="Choose one">Select Location</option>
                      <option @if($table->location=='Inside')
                          selected
                          @endif value="Inside">Inside</option>
                      <option @if($table->location=='Outside')
                          selected
                          @endif value="Outside">Outside</option>
                       <option @if($table->location=='Frontside')
                          selected
                          @endif value="Frontside">Frontside</option>
                    </select>
                  </div>
                </div>
              <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Table Status: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2-show-search" name="status">
                      <option label="Choose one">Select Status</option>
                      <option @if($table->status=='1')
                          selected
                          @endif value="1">Active</option>
                      <option @if($table->status=='0')
                          selected
                          @endif value="0">Panding</option>
                    </select>
                  </div>
                </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Table Image: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <td><img width="50" src="/tables/{{$table->image}}"></td>
                   <input name="image" type="file" class="form-control">
                </div>
              </div>
              <div class="form-layout-footer mg-t-30">
                <button  style="float: right !important;" class="btn btn-info mg-r-5">Update Table</button>
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