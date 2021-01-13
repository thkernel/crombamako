@extends("layouts.front")

@section("content")
<div class="container main-container">

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="headers mg-b-5">
                <h2>Catégories de structure</h2>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-9">
                        <ul>
                            @foreach($structure_categories as $structure_category)
                                <li>
                                    

                                    <a href="{{ route('structure_categories.edit', $structure_category->id) }}">{{$structure_category->name}} ({{count($structure_category->structures)}})</a>

                                </li>
                            @endforeach
                        </ul>
                        <div class="row page_navi">
                           
                                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection