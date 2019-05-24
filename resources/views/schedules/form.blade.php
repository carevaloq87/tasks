
<div class="form-group {{ $errors->has('completed') ? 'has-error' : '' }}">
    <label for="completed" class="col-md-2 control-label">Completed</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="completed_1">
            	<input id="completed_1" class="" name="completed" type="checkbox" value="1" {{ old('completed', optional($schedules)->completed) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('completed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('live_id') ? 'has-error' : '' }}">
    <label for="live_id" class="col-md-2 control-label">Live</label>
    <div class="col-md-10">
        <select class="form-control" id="live_id" name="live_id" required="true">
        	    <option value="" style="display: none;" {{ old('live_id', optional($schedules)->live_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select live</option>
        	@foreach ($Lives as $key => $Life)
			    <option value="{{ $key }}" {{ old('live_id', optional($schedules)->live_id) == $key ? 'selected' : '' }}>
			    	{{ $Life }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('live_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('duttie_id') ? 'has-error' : '' }}">
    <label for="duttie_id" class="col-md-2 control-label">Duttie</label>
    <div class="col-md-10">
        <select class="form-control" id="duttie_id" name="duttie_id" required="true">
        	    <option value="" style="display: none;" {{ old('duttie_id', optional($schedules)->duttie_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select duttie</option>
        	@foreach ($Dutties as $key => $Dutty)
			    <option value="{{ $key }}" {{ old('duttie_id', optional($schedules)->duttie_id) == $key ? 'selected' : '' }}>
			    	{{ $Dutty }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('duttie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

