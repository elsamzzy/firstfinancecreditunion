@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('View User Profile') }}</h4>
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
                                                <input type="text" required name="id" class="form-control" disabled="" readonly="" placeholder="ID" value="#20210{{ $user->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Username') }}</label>
                                                <input type="text" required name="username" disabled="" readonly="" class="form-control" placeholder="Username" value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pl-1">
                                            <div class="form-group">
                                                <label class="txt-white" for="exampleInputEmail1">{{ __('Email address') }}</label>
                                                <input type="email" required name="email"  class="form-control" disabled="" readonly placeholder="Email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('First Name') }}</label>
                                                <input type="text" required name="first" class="form-control" disabled="" readonly="" placeholder="First Name" value="{{ $user->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Last Name') }}</label>
                                                <input type="text" required name="last" class="form-control" disabled="" readonly="" placeholder="Last Name" value="{{ $user->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Address') }}</label>
                                                <input type="text" required name="address" class="form-control" disabled="" readonly="" placeholder="Home Address" value="{{ $user->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('City') }}</label>
                                                <input type="text" required name="city" class="form-control" disabled="" readonly="" placeholder="City" value="{{ $user->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Country') }}</label>
                                                <input type="text" required name="country" class="form-control" disabled="" readonly="" placeholder="Country" value="{{ $user->country }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Postal Code') }}</label>
                                                <input type="number" required name="postal" class="form-control" disabled="" readonly="" value="{{ $user->postal }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('DOB') }}</label>
                                                <input type="date" required name="dob" class="form-control" disabled="" readonly="" placeholder="MM-DD-YYYY" value="{{ $user->dob }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('ssn') }}</label>
                                                <input type="text" required name="ssn" class="form-control" disabled="" readonly="" placeholder="SSN" value="{{ $user->ssn }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Occupation') }}</label>
                                                <input type="number" required name="occupation" class="form-control" disabled="" readonly="" placeholder="Occupation" value="{{ $user->occupation }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('User Password') }}</label>
                                                <input type="text" required name="pass" class="form-control" disabled="" readonly="" placeholder="Password" value="{{ $users->dePass($user->pass) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Verify') }} {{ $user->username }} {{ __('ID') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="color: white">{{ __('Front picture of ID') }}</h4>
                                    <img src="{{ asset('storage/id') }}{{ __('/') }}{{ $user->username }}{{ __('front') }}{{ $user->front_extension }}" alt="{{ __('Front picture of') }} {{ $user->username }} {{ __('ID') }}" style="width: 100%; height: 80%"/>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="color: white">{{ __('Back picture of ID') }}</h4>
                                    <img src="{{ asset('storage/id') }}{{ __('/') }}{{ $user->username }}{{ __('back') }}{{ $user->back_extension }}" alt="{{ __('Back picture of') }} {{ $user->username }} {{ __('ID') }}" style="width: 100%; height: 80%" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if(auth()->guard('admin')->user()->host_username === Null)
                                <center><h4>You can't approve user's id because you haven't set your smtp details at settings</h4></center>
                            @else
                                <form method="post" action="{{ route('id.verify.user', $user) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Approve ID') }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Set balance for ') }}{{ $user->username }}</h4>
                        </div>
                        <div class="card-body">
                            @if(auth()->guard('admin')->user()->host_username === Null)
                                <center><h4>You can't set the user's balance because you haven't set your smtp details at settings</h4></center>
                            @else
                                <form action="{{ route('admin.balance', $user->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Balance') }}</label>
                                                <input type="text" required name="balance" class="form-control @error('balance') is-invalid @enderror" placeholder="Balance" value="{{ __('$') }}{{$user->current_balance}}">
                                                @error('balance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Save') }}</button>
                                    <div class="clearfix"></div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Set Credit Score for ') }}{{ $user->username }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.credit', $user->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Credit Score') }}</label>
                                            <input type="text" required name="credit" class="form-control @error('credit') is-invalid @enderror" placeholder="Credit Score" value="{{$user->current_credit}}">
                                            @error('credit')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Save ') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Send Message to ') }}{{ $user->username }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user', $user->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Subject') }}</label>
                                            <input type="text" required name="subject" class="form-control" placeholder="subject">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Message') }}</label>
                                            <textarea name="message" required class="form-control" placeholder="Send Message" style="height: 200px"></textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Send Message') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('message'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('message') }}</span>
            </div>
        </center>
    @endif
    @if(session('balance'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('balance') }}</span>
            </div>
        </center>
    @endif
    @if(session('credit'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('balance') }}</span>
            </div>
        </center>
    @endif
    @if(session('id'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('id') }}</span>
            </div>
        </center>
    @endif
@endsection
