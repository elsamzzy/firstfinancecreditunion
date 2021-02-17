@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color: rgba(255,0,0,0.6)">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Available Balance') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i>{{ __('Open: $') }} {{ auth()->user()->open_balance }} </br>
                                <i class="fa fa-circle text-danger"></i>{{ __('Current: $') }} {{ auth()->user()->current_balance }} </br>
                                <i class="fa fa-circle text-warning"></i>{{ __('Close: $') }} {{ auth()->user()->closed_balance }}</br>
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i>{{ __('Current Time: ') }} <span id="date"></span>
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
                            <div class="stats">
                                <i class="fa fa-clock-o"></i>{{ __('Current Time: ') }} <span id="dates"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="btn btn-primary btn-fill" style="width: 50%" data-toggle="modal" data-target="#myModal1" href="#pablo">
                        {{ __('Send Money') }}
                    </a>
                </div>
            </div>
            <!-- Mini Modal -->
            <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 80%">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            {{ __('Fill Transaction details') }}
                        </div>
                        <form action="{{ route('transactions') }}" method="post">
                            @csrf
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('Destination Bank') }}</label>
                                            <input type="text" name="bank" required class="form-control @error('bank') is-invalid @enderror" placeholder="Destination Bank" value="{{ old('bank') }}">
                                            @error('bank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>{{ __('Destination Account Name') }}</label>
                                            <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Destination Account Name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>{{ __('Destination Account Number') }}</label>
                                            <input type="number" name="number" required class="form-control @error('number') is-invalid @enderror" placeholder="Destination Account Number" value="{{ old('number') }}">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>{{ __('Amount') }}</label>
                                            <input type="number" name="amount" required class="form-control @error('amount') is-invalid @enderror" placeholder="Amount" value="{{ old('amount') }}">
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-link btn-simple">{{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
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
    @if(session('send'))
        <div class="modal fade modal-mini modal-primary show dis-block" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content justify-content-center">
                    <div class="modal-header justify-content-center">
                        <h4>{{ __('Transaction In Progress: ') }}</h4>
                    </div>
                    <center><div id="loaderImage"></div></center>
                </div>
            </div>
        </div>
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center dis-none' role='alert' data-notify-position='top-center' style='margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: red'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ __('Transaction failed, Please contact support or your Account Officer') }}</span>
            </div>
        </center>
    @endif
    @if(session('insufficient'))
        <center>
            <div id='message' data-notify='container' class='col-xs-11 col-sm-4 alert alert-info alert-with-icon align-items-center' role='alert' data-notify-position='top-center' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 2s; z-index: 10600; top: 20px; left: 0px; right: 0px; background-color: red'>
                <span data-notify='title'></span>
                <span data-notify='message'>{{ session('insufficient') }}</span>
            </div>
        </center>
    @endif
@endsection
