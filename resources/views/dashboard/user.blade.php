@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('View / Edit Profile') }}</h4>
                            @if(session('status'))
                                <h4 class="card-title pull-right" style="color: greenyellow">{{ session('status') }}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('User ID') }}</label>
                                            <input type="text" required name="id" class="form-control" disabled="" readonly="" placeholder="ID" value="#20210{{ auth()->user()->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Username') }}</label>
                                            <input type="text" required name="username" class="form-control @error('username') is-invalid @enderror" readonly disabled="" placeholder="Username" value="{{ auth()->user()->username }}">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5 pl-1">
                                        <div class="form-group">
                                            <label class="txt-white" for="exampleInputEmail1">{{ __('Email address') }}</label>
                                            <input type="email" required name="email" class="form-control @error('email') is-invalid @enderror" disabled="" readonly placeholder="Email" value="{{ auth()->user()->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('First Name') }}</label>
                                            <input type="text" required name="first" class="form-control @error('first') is-invalid @enderror" placeholder="First Name" value="{{ auth()->user()->first_name }}">
                                            @error('first')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Last Name') }}</label>
                                            <input type="text" required name="last" class="form-control @error('last') is-invalid @enderror" placeholder="Last Name" value="{{ auth()->user()->last_name }}">
                                            @error('last')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Address') }}</label>
                                            <input type="text" required name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Home Address" value="{{ auth()->user()->address }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('City') }}</label>
                                            <input type="text" required name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" value="{{ auth()->user()->city }}">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Country') }}</label>
                                            <input type="text" required name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" value="{{ auth()->user()->country }}">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Postal Code') }}</label>
                                            <input type="number" required name="postal" class="form-control @error('postal') is-invalid @enderror" value="{{ auth()->user()->postal }}">
                                            @error('postal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Last 4 digit of your SSN') }}</label>
                                            <input type="text" required name="ssn" class="form-control @error('ssn') is-invalid @enderror" placeholder="'Last 4 digit of your SSN" value="{{ auth()->user()->ssn }}">
                                            @error('ssn')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Date Of Birth') }}</label>
                                            <input type='date' class='form-control @error('dob') is-invalid @enderror' id='dob' name='dob' placeholder='MM-DD-YYYY' value="{{ auth()->user()->dob }}" required/>
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Occupation') }}</label>
                                            <input type="text" required name="occupation @error('occupation') is-invalid @enderror" class="form-control @error('occupation') is-invalid @enderror" value="{{ auth()->user()->occupation }}">
                                            @error('occupation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Update Profile Details') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Change Password') }}</h4>
                            @if(session('pass'))
                                <h4 class="card-title pull-right" style="color: greenyellow">{{ session('status') }}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ route('password') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Old Password') }}</label>
                                            <input type="password" required name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                                            @if(session('pass_error'))
                                                <h4 style="color: red">{{ session('pass_error') }}</h4>
                                            @endif
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('New Password') }}</label>
                                            <input type="password" required name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Confirm Password') }}</label>
                                            <input type="password" required name="password_confirmation" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Update Password') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
