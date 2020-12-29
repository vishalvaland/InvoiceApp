<div class="form-group {{ $errors->has('Company_Name') ? 'has-error' : ''}}">
    {!! Form::label('Company_Name', 'Company Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Company_Name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('Company_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Company_Address') ? 'has-error' : ''}}">
    {!! Form::label('Company_Address', 'Company Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Company_Address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('Company_Address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Company_Phone') ? 'has-error' : ''}}">
    {!! Form::label('Company_Phone', 'Company Phone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Company_Phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('Company_Phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Company_Mobile') ? 'has-error' : ''}}">
    {!! Form::label('Company_Mobile', 'Company Mobile', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('Company_Mobile', null, ['class' => 'form-control']) !!}
        {!! $errors->first('Company_Mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('GST_No') ? 'has-error' : ''}}">
    {!! Form::label('GST_No', 'Gst No', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('GST_No', null, ['class' => 'form-control']) !!}
        {!! $errors->first('GST_No', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
