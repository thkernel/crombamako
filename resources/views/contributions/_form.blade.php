<div class="row">
	<div class="col-md-12">

        <div class="form-group">
            <label for="doctor__id" class="required">Médecin:</label>
            <select name="doctor_id" id="structure_type_id" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                @foreach($doctors as $doctor)
                    <option value = "{{ $doctor->id }}">{{ $doctor->id }}</option>
                @endforeach
            </select>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">

		    <label for="year" class="required">Année:</label>
		    <input type="text" id="amount" name="amount" class="form-control" placeholder="Montant" value="{{  old('year') ?? $contribution->year }}" >
		    {!! $errors->first('year', '<p class="error">:message</p>') !!}

		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">

		    <label for="name" class="required">Montant:</label>
		    <input type="number" id="amount" name="amount" class="form-control" placeholder="Montant" value="{{  old('amount') ?? $contribution->amount }}" >
		    {!! $errors->first('amount', '<p class="error">:message</p>') !!}

		</div>
	</div>
</div>
   