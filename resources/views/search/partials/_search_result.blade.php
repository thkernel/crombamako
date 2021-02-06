
@if (!$results)
    <div class="container main-container">
        <div class="row">
            <div class="card">
                <div class="card-body text-center">
                    <p>
                        <h5>Pas de résultat pour cette recherche!</h5>
                    </p>
                </div>
            </div>
        </div>
    </div>
@else

    <div class="container main-container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($results as $structure)
                        <div class="col-md-3">
                            <div class="card">

                                <div class="structure-logo">
                                    <a href="{{ route('show_structure_path', $structure->slug)}}">

                                      {!!  structure_logo($structure, "card-img-top", "") !!}
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                      <a href="{{ route('show_structure_path', $structure->slug)}}">

                                          {{ $structure->name }}
                                      </a>
                                    </h5>
                                    <p class="card-text">
                                      {{ $structure->address}} {{ $structure->town->name }}
                                    </p>

                                    <p class="card-text">
                                      
                                    </p>

                                    <a href="{{ route('show_structure_path', $structure->slug)}}" class="btn btn-primary btn-block">

                                          Fiche
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif