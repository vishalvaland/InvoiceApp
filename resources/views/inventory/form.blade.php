<div class="form-group {{ $errors->has('itemname') ? 'has-error' : ''}}">
    {!! Form::label('itemname', 'Item Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('itemname', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('itemname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('itemmodelnumber') ? 'has-error' : ''}}">
    {!! Form::label('itemmodelnumber', 'Item Serial Number', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('itemmodelnumber', null, ['class' => 'form-control']) !!}
        {!! $errors->first('itemmodelnumber', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('HSN_SAC') ? 'has-error' : ''}}">
    {!! Form::label('HSN_SAC', 'HSN SAC', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('HSN_SAC', null, ['class' => 'form-control']) !!}
        {!! $errors->first('HSN_SAC', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    {!! Form::label('rate', 'Rate', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('rate', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('statetax') ? 'has-error' : ''}}">
    {!! Form::label('statetax', 'State Tax(%)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('statetax', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('statetax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('centraltax') ? 'has-error' : ''}}">
    {!! Form::label('centraltax', 'Central Tax(%)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('centraltax', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('centraltax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
