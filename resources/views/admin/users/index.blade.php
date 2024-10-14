@extends('admin.layouts.admin')

@section('title', 'Members')

@section('css')

@endsection


@section('admin')

    <div class="container">
        <h2>Members</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Account No.</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ Str::title($user->full_name) }}</td>
                            <td>{{ $user->account_number }}</td>
                            <td>{{ number_format($user->balance, 2) }}</td>
                            <td>{{ $user->status }}</td>

                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{-- @include('admin.pagination.index') --}}
        </div>
    </div>

@endsection


@section('javascript')
@endsection
