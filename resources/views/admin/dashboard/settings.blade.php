@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Change Password') }}</h4>
                            @if(session('pass'))
                                <h4 class="card-title pull-right" style="color: greenyellow">{{ session('status') }}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings') }}" method="post">
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
            <<div class="row">
                <div class="col-md-6">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Set Live Chat Link') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.chat') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('link For Live Chat') }}</label>
                                            <input type="text" required name="chat" class="form-control @error('chat') is-invalid @enderror" placeholder="Live Chat link" value="{{ auth()->guard('admin')->user()->chatAPI }}">
                                            @error('chat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Set Live Chat') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Set mailing details') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.smtp') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('Sender Name') }}</label>
                                            <input type="text" required name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Sender name" value="{{ $admins->user()->host_name }}">
                                            @error('name')
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
                                            <label class="txt-white">{{ __('SMTP Username') }}</label>
                                            <input type="text" required name="username" class="form-control @error('username') is-invalid @enderror" placeholder="SMTP Username" value="{{ $admins->user()->host_username }}">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <label class="txt-white">{{ __('SMTP Password') }}</label>
                                            <input type="password" required name="password" class="form-control @error('password') is-invalid @enderror" placeholder="SMTP Password" value="{{ $admins->hostPass() }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Save Mailing Settings') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('pass'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('pass') }}</span>
            </div>
        </center>
    @endif
    @if(session('chat'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('chat') }}</span>
            </div>
        </center>
    @endif
    @if(session('smtp'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: yellowgreen'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('smtp') }}</span>
            </div>
        </center>
    @endif
@endsection
