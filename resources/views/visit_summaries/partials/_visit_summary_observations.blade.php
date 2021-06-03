<div class="row">
    <div class="col-md-12">   
        <div class="form-group">
            <label for="strong_points" class="required">Points forts:</label>
            <textarea name="strong_points" class="form-control" placeholder="Points forts" >{{  old('strong_points') ?? $visit_summary->strong_points }}</textarea>

        </div>

    </div>
    
    <div class="col-md-12">   
        <div class="form-group">
            <label for="weak_points" class="required">Points faibles:</label>
            <textarea name="weak_points" class="form-control" placeholder="Points faibles" >{{  old('weak_points') ?? $visit_summary->weak_points }}</textarea>

        </div>

    </div>

    <div class="col-md-12">   
        <div class="form-group">
            <label for="recommendations" class="required">Recommandations:</label>
            <textarea name="recommendations" class="form-control" placeholder="Recommandations" >{{  old('recommendations') ?? $visit_summary->recommendations }}</textarea>

        </div>

    </div>

    <div class="col-md-12">   
        <div class="form-group">
            <label for="conclusion" class="required">Conclusion:</label>
            <textarea name="conclusion" class="form-control" placeholder="Conclusion" >{{  old('conclusion') ?? $visit_summary->conclusion }}</textarea>

        </div>

    </div>



</div>