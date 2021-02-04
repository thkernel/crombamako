<div class="row">

    <div class="col-md-12">

        <div class="form-group">
            <label for="user_id" class="required">Utilisateur:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option {{ $permission->user_id  ? '' : 'disabled selected value'}}> 
                @foreach($users as $user)
                    <option value = "{{ $user->id }}" {{ $user->id == $permission->user_id ?  'selected' : ''}}>{{ $user->login }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="col-md-12">

        <div class="form-group">
            <label for="feature_id" class="required">Fonctionalité:</label>
            <select name="feature_id" id="feature_id" class="form-control" required>
                <option {{ $permission->feature_id  ? '' : 'disabled selected value'}}> 
                @foreach($features as $feature)
                    <option value = "{{ $feature->id }}" {{ $feature->id == $permission->feature_id ?  'selected' : ''}}>{{ $feature->name }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="col-md-12">

        <div class="form-group">
           <label for="action_names[]" class="required">Action:</label>
            <select name="action_names[]" id="action_names" class="form-control" required multiple>
                @foreach($actions as $action)
                    <option value="{{ $action}}" @if (selected_abilities($permission->permission_items , $action)) selected @endif>{{ $action }}</option>
                @endforeach
            </select>
        </div>

    </div>


</div>