@extends("layouts.dashboard");

@section("content")
<div class="container">
<div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Rélevé des cotisations</h5></span>
      </nav>
    </div><!-- br-pageheader -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    

    <form action="{{ route('contributions_statement_path') }}" method="GET" class="search-form">

        @csrf

      <div class="row ">
        <div class="col-md-6">
          <div class="form-group">
            <label for="start_date">Date début</label>
            <input type="date" id= "start_date" name="start_date" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="end_date">Date fin</label>
            <input type="date" id= "end_date" name="end_date" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                  <label for="doctor_id"> Médecin </label>
                  <select name="doctor_id" id="doctor_id" class="form-control" required>
                      <option disabled selected value> Sélectionner </option>          
                        @foreach($doctors as $doctor)
                          <option value = "{{ $doctor->id }} ">{{ $doctor->full_name_with_reference }}</option>
                        @endforeach
                  </select>
              </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                  <label for="town_id"> Commune </label>
                  <select name="town_id" id="town_id" class="form-control">
                      <option disabled selected value> Sélectionner </option>
                      @foreach($towns as $town)
                          <option value = "{{ $town->id }}">{{ $town->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>



          <div class="col-md-4">
            <div class="form-group">
                  <label for="neighborhood_id"> Quartier </label>
                  <select name="neighborhood_id" id="neighborhood_id" class="form-control">
                       <option disabled selected value> Sélectionner </option>
                      @foreach($neighborhoods as $neighborhood)
                          <option value = "{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
                      @endforeach
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
            
         

        </div>

    </div>


<table id="contributions-statement-datatable" class="table display responsive nowrap">


  <thead>
    <tr>
      <th>Date</th>
      <th>Médecin</th>
      <th>Année</th>
      
    </tr>
  </thead>

  <tbody class="contributions-statement">
    @include("contributions/_index")
  </tbody>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection