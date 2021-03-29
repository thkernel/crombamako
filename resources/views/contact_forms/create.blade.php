@extends("layouts.front")

@section("content")
<div class="container main-container">

<div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h3>Contactez-nous</h3></span>
      </nav>
    </div><!-- br-pageheader -->

<div class="br-pagebody mg-b-30">
  <div class="br-section-wrapper">
    <div class="headers mg-b-5">
      

    </div>
    <div class="section-body">
      <div class="row">

        <div class="col-md-7"> 
          <h3>Nous écrire</h3>
          <hr />
    		  @include("contact_forms/_form")
        </div>
        <div class="col-md-5"> 
          <h3>Adresses</h3>
          <hr />


          <div class="addresses">
            <h6 class="">Téléphone: {{ config('global.company_phone')}}</h6>
            <h6 class="">Email: {{ config('global.company_email')}}</h6>
            <h6 class="">Adresses: {{ config('global.company_addresses')}}</h6>



          </div>
              


          
          </div>
      </div>

    </div>
  </div>
</div>

@endsection
@include("layouts/partials/_ckeditor")