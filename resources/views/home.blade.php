@extends('layouts.app')

@section('content')
<style>
    .dashboard .col-md-4 {    text-align: center;
    font-size: 24px;}
     .dashboard .col-md-4 a{  text-decoration:none; }
       .dashboard .col-md-4 i{  font-size: 38px;}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body dashboard">
                  <div class="row">
                     <div class="col-md-4"> <a href="{{url('/inventory/create')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i><br>Create Inventory</a> </div>
                      <div class="col-md-4"> <a href="{{url('/inventory/create')}}"><i class="fa fa-users" aria-hidden="true"></i> <br/>Create Customer</a> </div>
                     
                          <div class="col-md-4"> <a href="{{url('/customer/create')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i><br>Create Invoice</a> </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
