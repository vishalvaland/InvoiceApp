<div class="form-group {{ $errors->has('CustomerName') ? 'has-error' : ''}}">
    {!! Form::label('CustomerName', 'Customer Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('CustomerName', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('CustomerName', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('CustomerAddress') ? 'has-error' : ''}}">
    {!! Form::label('CustomerAddress', 'Customer Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('CustomerAddress', null, ['class' => 'form-control']) !!}
        {!! $errors->first('CustomerAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('GSTNo') ? 'has-error' : ''}}">
    {!! Form::label('GSTNo', 'Gst No.', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('GSTNo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('GSTNo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('MobileNo') ? 'has-error' : ''}}">
    {!! Form::label('MobileNo', 'Mobile No.', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('MobileNo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('MobileNo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('EMail') ? 'has-error' : ''}}">
    {!! Form::label('E-Mail', 'E-Mail', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('EMail', null, ['class' => 'form-control']) !!}
        {!! $errors->first('E-Mail', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
