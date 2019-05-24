
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($tasks)->name) }}" minlength="1" maxlength="512" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('duttie_id') ? 'has-error' : '' }}">
    <label for="duttie_id" class="col-md-2 control-label">Duttie</label>
    <div class="col-md-10">
        <select class="form-control" id="duttie_id" name="duttie_id" required="true">
        	    <option value="" style="display: none;" {{ old('duttie_id', optional($tasks)->duttie_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select duttie</option>
        	@foreach ($Dutties as $key => $Dutty)
			    <option value="{{ $key }}" {{ old('duttie_id', optional($tasks)->duttie_id) == $key ? 'selected' : '' }}>
			    	{{ $Dutty }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('duttie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

