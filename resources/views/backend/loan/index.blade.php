@extends('backend.layouts.master')

@section('title','IDA | Loan')
@section('page','Loan')

@section('content')
<div class="mt-12 mb-7">
    <div class="flex items-center justify-between">
        <h3 class="text text-2x font-semibold text-black"></h3>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="{{ route('loan.create') }}" class="btn btn_secondary">Add New</a>
        </div>
    </div>
</div>


@endsection
