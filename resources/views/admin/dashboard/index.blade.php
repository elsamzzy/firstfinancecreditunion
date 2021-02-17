@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <center><h3 class="txt-white">{{ __('List of Users Registered Under ') }}{{ $admin->user()->username }}</h3></center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Total Users: ') }}{{ $user->under()->count() }}</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if($user->num() === 0)
                                    <center><h4>{{ __('No user is registered to ') }}{{ $admin->user()->username }}</h4></center>
                                @else
                                    <thead>
                                    <!-- #20210 -->
                                    <th class="txt-white">{{ __('User Id') }}</th>
                                    <th class="txt-white">{{ __('First Name') }}</th>
                                    <th class="txt-white">{{ __('Last Name') }}</th>
                                    <th class="txt-white">{{ __('Username') }}</th>
                                    <th class="txt-white">{{ __('Email') }}</th>
                                    <th class="txt-white">{{ __('Action') }}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($customer as $customers)
                                        <tr>
                                            <td><a href="{{ route('admin.user', $customers->id ) }}" >{{ __('#20210') }}{{$customers->id}}</a></td>
                                            <td>{{ $customers->first_name }}</td>
                                            <td>{{ $customers->last_name }}</td>
                                            <td>{{ $customers->username }}</td>
                                            <td>{{ $customers->email }}</td>
                                            <td><button class="btn btn-info btn-fill pull-right">Disable User</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
