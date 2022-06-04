@extends('layouts.admin')

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" >Restaurant Reservation</a>
    <a class="breadcrumb-item" >Pages</a>
    <span class="breadcrumb-item active">Create Category</span>
  </nav>
<script type="text/javascript">

var googlewin=dhtmlwindow.open("googlebox", "iframe", "http://images.google.com/", "#1: Google Web site", "width=590px,height=350px,resize=1,scrolling=1,center=1", "recal")

googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return window.confirm("Close window 1?")
}

</script>
  <div class="sl-pagebody">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <a href="{{route('admin.menus.index')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> All Menus</button></a>
      </div><!-- col-sm -->
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <form method="POST" action="{{route('admin.menus.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <label class="col-sm-4 form-control-label">Menu Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input name="name" type="text" class="form-control" placeholder="Enter Menu Name">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Menu Description: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea name="description" rows="2" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Menu Status: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2-show-search" name="categories">
                      <option label="Choose one" value="">Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Menu Status: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2-show-search" name="status">
                      <option label="Choose one">Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Panding</option>
                    </select>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Menu Image: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                     <input name="image" type="file" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-4 form-control-label">Menu Price: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input name="price" type="number" class="form-control" placeholder="Enter Menu Price">
                  </div>
                </div><!-- row -->
                <div class="form-layout-footer mg-t-30">
                  <button  style="float: right !important;" class="btn btn-info mg-r-5">Submit Form</button>
                  <button  style="float: right !important; margin-right:10px;" class="btn btn-secondary">Cancel</button>
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