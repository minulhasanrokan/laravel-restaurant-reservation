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
      <div class="col-sm-6 col-md-2">
        <a href="{{route('admin.categories.index')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> All Categories</button></a>
      </div><!-- col-sm -->
      <div class="col-sm-6 col-md-2">
        <a href="{{route('admin.categories.update',$category->id)}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-recycle"></i> Create Category</button></a>
      </div>
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <form method="POST" action="{{route('admin.categories.update',$category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <label class="col-sm-4 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input value="{{$category->name}}" name="name" type="text" class="form-control" placeholder="Enter Category Name">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Category Description: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea name="description" rows="2" class="form-control" placeholder="Enter your address">{{$category->description}}</textarea>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Category Status: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2-show-search" name="status">
                      <option label="Choose one">Select Status</option>

                      @if($category->status==1)
                      <option value="1" selected>Active</option>
                      @else
                      <option value="1" >Active</option>
                      @endif

                      @if($category->status==0)
                      <option value="0" selected>Panding</option>
                      @else
                      <option value="0" >Panding</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Category Image: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <td><img width="50" src="/categories/{{$category->image}}"></td>
                     <input name="image" type="file" class="form-control">
                  </div>
                </div>
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