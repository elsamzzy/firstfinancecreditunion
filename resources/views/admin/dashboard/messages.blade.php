@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <center><h3 class="txt-white">{{ __('All messages for ') }}{{ $admin->user()->username }}</h3></center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Total Messages: ') }}{{ $messages->adminMessageCount() }}</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if($messages->adminMessageCount() === 0)
                                    <center><h4>{{ __('There are no messages now') }}</h4></center>
                                @else
                                    <thead>
                                    <!-- #20210 -->
                                    <th class="txt-white">{{ __('Customer Username') }}</th>
                                    <th class="txt-white">{{ __('Subject') }}</th>
                                    <th class="txt-white">{{ __('Message') }}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($mess as $message)
                                        <tr>
                                            @foreach($user->user($message->id) as $username)
                                                <td>{{ $username->username }}</td>
                                            @endforeach
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message }}</td>
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
