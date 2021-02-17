@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __("Messages from Account Officer") }}</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if($admin_messages->userMessageCount() === 0)
                                    <center><h4>{{ __("You have no message from your Account Officer") }}</h4></center>
                                @else
                                    <thead>
                                        <th class="txt-white">{{ __('Subject') }}</th>
                                        <th class="txt-white">{{ __('Message') }}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($to_user as $mess)
                                        <tr>
                                            <td>{{ $mess->subject }}</td>
                                            <td>{{ $mess->messages }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __("Messages sent to Account Officer") }}</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if($user_messages->userMessageCount() === 0)
                                    <center><h4>{{ __("You haven't sent any message to your Account Officer") }}</h4></center>
                                @else
                                    <thead>
                                        <th class="txt-white">{{ __('Subject') }}</th>
                                        <th class="txt-white">{{ __('Message') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach($to_admin as $mess)
                                            <tr>
                                                <td>{{ $mess->subject  }}</td>
                                                <td>{{ $mess->message }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Message to Account Officer / Support') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('social') }}" method="post">
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
                                        <textarea name="message" required row="80" class="form-control" placeholder="Send Message" style="height: 200px"></textarea>
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
@endsection
