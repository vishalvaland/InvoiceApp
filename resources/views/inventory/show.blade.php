@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inventory {{ $inventory->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/inventory') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/inventory/' . $inventory->id . '/edit') }}" title="Edit Inventory"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['inventory', $inventory->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Inventory',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $inventory->id }}</td>
                                    </tr>
                                    <tr><th> Item Name </th><td> {{ $inventory->itemname }} </td></tr><tr><th> Item Serial Number </th><td> {{ $inventory->itemmodelnumber }} </td></tr><tr><th> HSN SAC </th><td> {{ $inventory->HSN_SAC }} </td></tr><tr><th> Quantity </th><td> {{ $inventory->quantity }} </td></tr><tr><th> Rate </th><td> {{ $inventory->rate }} </td></tr><tr><th> State Tax(%) </th><td> {{ $inventory->statetax }} </td></tr><tr><th> Central Tax(%) </th><td> {{ $inventory->centraltax }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
