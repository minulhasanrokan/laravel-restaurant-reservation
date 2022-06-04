@extends('layouts.admin')

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" >Restaurant Reservation</a>
    <a class="breadcrumb-item" >Pages</a>
    <span class="breadcrumb-item active">All Categories</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <a href="{{route('admin.categories.create')}}"><button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-plus"></i> Create Category</button></a>
      </div><!-- col-sm -->
    </div><!-- row -->
    <br>
    <div class="card pd-20 pd-sm-40">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{$category->name}}</td>
                  <td><img width="50" src="/categories/{{$category->image}}"></td>
                  <td>{{$category->status}}</td>
                  <td>
                    <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-pencil"></i></div></a>
                    <a href="{{route('admin.delete.category',$category->id)}}" class="btn btn-danger btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-trash"></i></div></a>
                    @if($category->status==1)
                    <a href="{{route('admin.categories.change.status',$category->id)}}" class="btn btn-dark btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-thumbs-up"></i></div></a>
                    @else
                    <a href="{{route('admin.categories.change.status',$category->id)}}" class="btn btn-dark btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-thumbs-down"></i></div></a>
                    @endif
                  </td>
                </tr>   
                @endforeach     
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section("css")

    <!-- vendor css -->
    <link href="{{asset('/assets/')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{asset('/assets/')}}/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/assets/')}}/css/starlight.css">

@endsection

@section("js")
    <script src="{{asset('/assets/')}}/lib/jquery/jquery.js"></script>
    <script src="{{asset('/assets/')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('/assets/')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('/assets/')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{asset('/assets/')}}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{asset('/assets/')}}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('/assets/')}}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{asset('/assets/')}}/lib/select2/js/select2.min.js"></script>

    <script src="{{asset('/assets/')}}/js/starlight.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
@endsection