@extends("layouts.dashboard")

@section("content")
<div class="container">
<div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Articles</h5></span>
      </nav>
    </div><!-- br-pageheader -->
<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="headers mg-b-20">
        <div class="left-content">
        </div>

        <div class="text-right">
            

            <a class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" href="{{ route('posts.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter</a>

        </div>

    </div>


<table id="datatable" class="table display responsive nowrap">


  <thead>
    <tr>
     <th>Catégorie</th>
      <th>Titre</th>
     
      
      <th>Actions</th>
    </tr>
  </thead>

  <tbody class="posts">
    @include("posts/_index")
  </tbody>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection