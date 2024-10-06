@extends('admin.layouts.admin')

@section('title', 'Currency Manager')

@section('css')

@endsection


@section('admin')
    <div class="container">
        <x-alert-info/>
        <div class="mb-3">
            <a href="{{ route('admin.currency.create') }}" class="btn btn-primary">Add New Currency</a>
        </div>
        <h2>Currency Manager</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>sn</th>
                        <th>Currency</th>
                        <th>Code</th>
                        <th>Symbol</th>
                        <th>Exchange Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $currency->currency }}</td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ $currency->symbol }}</td>
                            <td>{{ $currency->exchange_rate }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('javascript')
