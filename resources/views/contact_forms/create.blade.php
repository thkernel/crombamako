@extends("layouts.front")

@section("content")
<div class="container main-container">

<div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Contactez-nous</h5></span>
      </nav>
    </div><!-- br-pageheader -->

<div class="br-pagebody mg-b-30">
  <div class="br-section-wrapper">
    <div class="headers mg-b-5">
      

    </div>
    <div class="section-body">
		@include("contact_forms/_form")
    </div>




</div>
</div>
</div>

@endsection