<div class="row">
	<div class="col-md-12">

        <div class="form-group">
            <label for="doctor_id" class="required">Médecin:</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option {{ $contribution->doctor_id  ? '' : 'disabled selected value'}}> 

                @foreach($doctors as $doctor)
                    <option value = "{{ $doctor->id }}" {{ $doctor->id == $contribution->doctor_id ?  'selected' : ''}}>{{ $doctor->full_name_with_reference }}</option>
                @endforeach
            </select>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">

		    <label for="year" class="required">Année:</label>
		    


		<select id="year" class="form-control" name="year[]" multiple>
			
		    @foreach(years_list() as $year)
		    	<option value="{{ $year}}" @if (contribution_selected_years($contribution->contribution_items , $year)) selected @endif>{{ $year }}</option>
		    @endforeach
		</select>
		 {!! $errors->first('year', '<p class="error">:message</p>') !!}

		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">

		    <label for="name" class="required">Montant:</label>
		    <input type="number" id="amount" name="amount" class="form-control" placeholder="Montant" value="{{  old('amount') ?? $contribution->amount }}" >
		    {!! $errors->first('amount', '<p class="error">:message</p>') !!}

		</div>
	</div>
</div>
   