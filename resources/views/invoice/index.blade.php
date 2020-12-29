@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                 <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Invoice Report</div>
                    <div class="panel-body">
                        <a href="{{ url('/invoice/create') }}" class="btn btn-success btn-sm" title="Add New Invoice">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/invoice/index', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>
                                        <th>Delivery Date</th>
                                        <th>Customer ID</th>
                                        <th>Mode of Payment</th>
                                         <th>Total Amount</th>

                                      
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice as $item)
                                    <tr>
                                        <td>{{ $item->invoiceid }}</td>
                                         <td>{{ $item->invoiceno }}</td>
                                        <td>{{ $item->invoicedate}}</td>
                                        <td>{{ $item->deliverydate }}</td>
                                         <td>{{ $item->customerid}}</td> 

                                        <td>{{ $item->modeofpayment }}</td>
                                        <td>{{ $item->totalamount }}</td>

                                        <td>
                                            <a target="_blank" href="{{ url('/invoice/showinvoice/' . $item->invoiceid) }}" title="View Inventory"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Print Invoice</button></a>

                                             <a target="_blank" href="{{ url('/invoice/showinvoicedc/' . $item->invoiceid) }}" title="View Inventory"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Print DC</button></a>


                                           
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/invoice/delete', $item->invoiceid],
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
                            <div class="pagination-wrapper"> {!! $invoice->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
