@extends('layouts.land')

@section('land')
    <form name="OnlineEnrollment" id="OnlineEnrollment" method="post" action="{{ route('register') }}">
        @csrf
        <div class="form-container" style="padding-top: 0">
            <div class="clearfix mrg-B-lg">
                &nbsp;
            </div>
            <div class="row mrg-B-lg">
                <h3>
                    Online Banking New Enrollment Account Verification
                </h3>
            </div>
            <div class="clearfix" >
                &nbsp;
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label> Select account officer</label>
                    <select id="officer" class="form-control @error('officer') is-invalid @enderror" name="officer">
                        <option> Select an officer </option>
                        @foreach( $list as $listing)
                            <option value="{{ $listing->id }}"> {{ $listing->username }} </option>
                        @endforeach
                        @error('officer')
                            <p role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </p>
                        @enderror
                        @if(session('officers'))
                            <p role="alert" style="color: red">
                                <strong>{{ session('officer') }}</strong>
                            </p>
                        @endif
                    </select>
                </div>
            </div>

            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label> Your First Name</label>
                    <input class="form-control" required name="first" type="text" value="{{ old('first') }}" placeholder="First Name"/>
                    @error('first')
                        <p role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Your Last Name:</label>
                    <input class="form-control" required name="last" type="text" placeholder="Last Name" value="{{ old('last') }}" />
                    @error('last')
                        <p role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Username:</label>
                    <input class="form-control" required name="username" type="text" placeholder="Username" value="{{ old('username') }}"/>
                    @error('username')
                        <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Your email address:</label>
                    <input class="form-control SocialSecurity" required name="email" type="email" value="{{ old('email') }}" placeholder="Email Address"/>
                    @error('email')
                        <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Residential Address:</label>
                    <input class="form-control" required name="address" type="text" placeholder="Residential Address" value="{{ old('address') }}"/>
                    @error('address')
                    <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Date Of Birth:</label>
                    <input type='date' class='form-control @error('dob') is-invalid @enderror' id='dob' name='dob' placeholder='MM-DD-YYYY' value="{{ old('dob') }}" required/>
                    @error('dob')
                    <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Occupation:</label>
                    <input class="form-control" required name="occupation" type="text" placeholder="Occupation" value="{{ old('occupation') }}"/>
                    @error('occupation')
                    <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Last 4 Digit of SSN:</label>
                    <input class="form-control" required name="ssn" type="number" placeholder="SSN" value="{{ old('ssn') }}"/>
                    @error('ssn')
                    <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Password</label>
                    <input class="form-control" required name="password" type="password" placeholder="Your Password"/>
                    @error('password')
                        <p  role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>

            <div class="row mrg-B-md">
                <div class="form-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <label>Confirm Password</label>
                    <input class="form-control" required id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Your Password"/>
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
