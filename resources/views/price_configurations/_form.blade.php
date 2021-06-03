<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <label for="contribution_amount" class="required">Montant:</label>

            <input type="number" name="contribution_amount" value="{{  old('contribution_amount') ?? $price_configuration->contribution_amount }}" class="form-control" placeholder="Montant" reauired>

        </div>

    </div>
</div>