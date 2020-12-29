@extends('layouts.app')

@section('content')
Edit
                        @include ('invoice.form', ['submitButtonText' => 'Update'])


@endsection
