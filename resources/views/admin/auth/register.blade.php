@extends('layouts.land')

@section('land')
    <form name="OnlineEnrollment" id="OnlineEnrollment" method="post" action="{{ route('admin.register') }}">
        @csrf
        <div class="form-container" style="padding-top: 0">

            <div class="clearfix mrg-B-lg">
                &nbsp;
            </div>
            <div class="row mrg-B-lg">
                <h3>
                    Online Banking New Enrollment Account For Staff
                </h3>
            </div>
            <div class="clearfix" >
                &nbsp;
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label> Staff Code</label>
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="none" autofocus/>
                    @if(session('code'))
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ session('code') }}</strong>
                        </span>
                    @endif
                    @error('code')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Username:</label>
                    <input class="form-control" name="username" type="text" placeholder="Username" value="{{ old('username') }}"/>
                    @error('username')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Your Password"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Confirm Password</label>
                    <input class="form-control" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Your Password"/>
                </div>
            </div>

            <div class="clearfix mrg-B-lg">
                &nbsp;
            </div>

            <div class="row mrg-B-md" align="center">
                <input class="btn btn-primary" type="submit" value="Submit Enrollment" />
            </div>
        </div>
    </form>
@endsection
