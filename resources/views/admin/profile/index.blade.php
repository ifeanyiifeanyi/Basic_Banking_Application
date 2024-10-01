@extends('admin.layouts.admin')

@section('title', 'Admin Profile')

@section('css')

@endsection


@section('admin')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ auth()->user()->photo }}" alt="User" class="img-thumbnail img-responsive">
                    </div>
                    <div class="text-center">
                        <h4 class="mb-2">{{ auth()->user()->full_name }}</h4>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                        <p class="text-success">{{ Str::upper(auth()->user()->role) }}</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('admin.edit-profile', auth()->user()->id) }}"><button type="button"
                                class="btn btn-primary btn-sm">Edit Profile</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow">
                
                <div class="card-body">
                    <h4 class="card-title">Basic Information</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Full Name</td>
                                    <td>{{ auth()->user()->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td>{{ auth()->user()->phone_number ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{ auth()->user()->dob ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $user->gender ?? 'NA'}}</td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection


    @section('javascript')
