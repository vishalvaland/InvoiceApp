@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                 <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inventory</div>
                    <div class="panel-body">
                        <a href="{{ url('/inventory/create') }}" class="btn btn-success btn-sm" title="Add New Inventory">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/inventory', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Item Name</th><th>Item Serial Number</th><th>HSN SAC</th><th>Quantity</th><th>Rate</th><th>State Tax(%) </th><th>Central Tax(%) </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inventory as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->itemname }}</td><td>{{ $item->itemmodelnumber }}</td><td>{{ $item->HSN_SAC }}</td><td>{{ $item->quantity }}</td><td>{{ $item->rate }}</td><td>{{ $item->statetax }}</td><td>{{ $item->centraltax }}</td>
                                        <td>
                                            <a href="{{ url('/inventory/' . $item->id) }}" title="View Inventory"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/inventory/' . $item->id . '/edit') }}" title="Edit Inventory"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/inventory', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Inventory',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $inventory->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
