@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Account Details') }}</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                    <thead>
                                    <th class="txt-white">{{ __('Account Name') }}</th>
                                    <th class="txt-white">{{ __('Account Number') }}</th>
                                    <th class="txt-white">{{ __('Account Type') }}</th>
                                    <th class="txt-white">{{ __('Sort Code') }}</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ auth()->user()->first_name }}{{ auth()->user()->last_name }}</td>
                                            <td>{{ __('20210') }}{{ auth()->user()->id }}{{ __('789') }}</td>
                                            <td>{{ __('Savings') }}</td>
                                            <td>{{ __('282970110') }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color: rgba(255,0,0,0.6)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Available Balance') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i>{{ __('Open: $') }} {{auth()->user()->open_balance }} </br>
                                <i class="fa fa-circle text-danger"></i>{{ __('Current: $') }} {{auth()->user()->current_balance }} </br>
                                <i class="fa fa-circle text-warning"></i>{{ __('Close: $') }} {{auth()->user()->closed_balance }}</br>
                            </div>
                            <hr>
                            <div class="stats txt-white">
                                <i class="fa fa-clock-o"></i>{{ __('Current Time: ') }}<span id="date"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color: rgba(0,255,0,0.6)">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Credit Score') }}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i>{{ __('Open: ') }} {{ auth()->user()->open_credit }}</br>
                                <i class="fa fa-circle text-danger"></i>{{ __('Current:') }} {{ auth()->user()->current_credit }}</br>
                                <i class="fa fa-circle text-warning"></i>{{ __('Close: ') }} {{ auth()->user()->closed_credit }} </br>
                            </div>
                            <hr>
                            <div class="stats txt-white">
                                <i class="fa fa-clock-o "></i>{{ __('Current Time: ') }} <span id="dates"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    <center><h3 class="txt-white">{{ __('Transaction Table') }}</h3></center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Total Transactions: ') }}{{ $transactions->num() }}</h4>
                            <p class="card-category">{{ __('Note: For both outgoing and incoming transactions') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if($transactions->num() === 0)
                                    <center><h4>{{ __('You have no transaction history') }}</h4></center>
                                @else
                                    <thead>
                                    <th class="txt-white">{{ __('refno') }}</th>
                                    <th class="txt-white">{{ __('Type') }}</th>
                                    <th class="txt-white">{{ __('Amount') }}</th>
                                    <th class="txt-white">{{ __('Destination Bank') }}</th>
                                    <th class="txt-white">{{ __('Destination Account Name') }}</th>
                                    <th class="txt-white">{{ __('Destination Account Number') }}</th>
                                    <th class="txt-white">{{ __('Time Stamp') }}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($trans as $tran)
                                        <tr>
                                            <td>#{{ $tran->id }}</td>
                                            @if($tran->type == "Incoming")
                                                <td style="color:greenyellow">{{ $tran->type }}</td>
                                            @else
                                                <td style="color:red">{{ $tran->type }}</td>
                                            @endif
                                            <td>${{ $tran->amount }}</td>
                                            <td>{{ $tran->bank_name }}</td>
                                            <td>{{ $tran->account_name }}</td>
                                            <td>{{ $tran->account_number }}</td>
                                            <td>{{ $tran->created_at }}</td>
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
