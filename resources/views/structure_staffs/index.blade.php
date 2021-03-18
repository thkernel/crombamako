@extends("layouts.dashboard")

@section("content")
<div class="container">
<div class="br-pageheader mg-t-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Personnels par structure</h5></span>
      </nav>
    </div><!-- br-pageheader -->
<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="headers mg-b-20">
        <div class="left-content">
        </div>

        <div class="text-right">
            
          @can('read', App\Models\StructureStaff::class)
            <a class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" href="{{ route('structure_staffs.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter
            </a>
          @endcan

        </div>

    </div>


<table id="datatable" class="table display responsive nowrap">


  <thead>
    <tr>
      
      <th>Prénom</th>
      <th>Nom</th>
      <th>Spécialité</th>
      <th>Structure</th>
      <th>Service</th>
     
      
      <th>Actions</th>
    </tr>
  </thead>

  <tbody class="staffs">
    @include("structure_staffs/_index")
  </tbody>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection