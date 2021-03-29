@extends("layouts.dashboard")

@section("content")
<div class="container">
<div class="br-pageheader mg-t-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Etats des cotisations</h5></span>
      </nav>
    </div><!-- br-pageheader -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    
    <form action="{{ route('contributions_statement_path') }}" method="GET" class="search-form">

        @csrf

        <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="search_terms" class="required">Critères de recherche</label>
          <select name="search_terms"  id="search_terms" class="form-control">
            <option disabled selected value> Sélectionner </option>
            <option value="0" {{ $search_terms == 0 ? 'selected' :''}}>Rechercher par date</option>
            <option value="1" {{ $search_terms == 1 ? 'selected' :''}} >Rechercher par date et Commune</option>
            <option value="2" {{ $search_terms == 2 ? 'selected' :''}} >Rechercher par date et quartier</option>
            <option value="3" {{ $search_terms == 3 ? 'selected' :''}} >Rechercher par date, commune et quartier</option>

          </select>
        </div>
      </div>
    </div>



      <div class="row ">
        <div class="col-md-6 start_date">
          <div class="form-group">
            <label for="start_date">Date début</label>
            <input type="date" id= "start_date" name="start_date" value="{{ $start_date }}" class="form-control">
          </div>
        </div>
        <div class="col-md-6 end_date">
          <div class="form-group">
            <label for="end_date">Date fin</label>
            <input type="date" id= "end_date" value="{{ $end_date}}" name="end_date" class="form-control">
          </div>
        </div>
      </div>

      
      <div class="row">

          <div class="col-md-6 town">
            <div class="form-group">
                  <label for="town_id"> Commune </label>
                  <select name="town_id" id="town_id" class="form-control">
                      <option value=""> Sélectionner </option>
                      @foreach($towns as $town)
                          <option value = "{{ $town->id }}" {{ $town->id == $town_id ? "selected" : '' }}>{{ $town->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>



          <div class="col-md-6 neighborhood">
            <div class="form-group">
                  <label for="neighborhood_id"> Quartier </label>
                  <select name="neighborhood_id" id="neighborhood_id" class="form-control">
                       <option value=""> Sélectionner </option>
                      
                  </select>
              </div>
          </div>
       

        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <input type="submit" value="RECHERCHER" class= "btn btn-primary btn-block" />
              </div>
            </div>

        

          
          </div>
        </form>
        
      </div>
  </div>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="headers mg-b-20">
        <div class="left-content">
        </div>

        <div class="text-right">
          @if ($contributions)
           
                        
            <form action="{{ route('download_statement_pdf_path')}}" method="GET">
                  @csrf 

                  <input type="hidden" name="pdf_start_date" value="{{$start_date ?? ''}}">

                  <input type="hidden" name="pdf_end_date" value="{{$end_date ?? ''}}">
                  <input type="hidden" name="pdf_town_id" value="{{$town_id ?? ''}}">

                  <input type="hidden" name="pdf_neighborhood_id" value="{{$neighborhood_id ?? ''}}">
                        <a href="route('download_statement_pdf_path')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Télécharger l'état</a>
                            </a>
                        </form>



                        
                      
         @endif

        </div>

    </div>


<table id="contributions-statement-datatable" class="table display responsive nowrap">


  <thead>
    <tr>
      <th>Date</th>
       <th>N°Inscrip.</th>
      <th>Médecin</th>
      <th>Années</th>
      <th>Montant</th>
      
    </tr>
  </thead>

  <tbody class="contributions-statement">
    @include("contributions/_statement_index")
  </tbody>
  <tfoot class="tfoot-bg">
    <tr>
      <td colspan="4"><strong><center>TOTAL</center></strong></td>
      
      <td>
        <strong>
        {{ $sum_total }}
        </strong>
      </td>
    </tr>
  </tfoot>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection