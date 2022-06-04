@extends('layouts.admin')

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Blank Page</h5>
      <p>This is a starter page</p>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section("css")
<!-- vendor css -->
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