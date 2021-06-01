@extends("layouts.front")

@section("content")

  <div class="container main-container">
    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <div class="headers mg-b-5">
          <h2>Liste des : {{ $structure_category->name }}</h2>
        </div>
        <div class="section-body">
          <div class="row">
            @foreach($structures as $structure)
              <div class="col-md-3">
                <div class="card">
                  <div class="structure-logo">
                    <a href="{{ route('structures.show', $structure->id)}}">

                      {!!  structure_logo($structure, "card-img-top", "", "medium") !!}
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="{{ route('structures.show', $structure->id)}}">

                          {{ $structure->name }}
                      </a>
                    </h5>
                    <p class="card-text">
                      {{ $structure->address}} {{ $structure->town->name }}
                    </p>

                    <p class="card-text">
                      
                    </p>

                    <a href="{{ route('structures.show', $structure->id)}}" class="btn btn-primary btn-block">

                          Fiche
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection