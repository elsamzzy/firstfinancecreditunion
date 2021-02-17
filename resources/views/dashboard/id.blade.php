@extends('layouts.dashboard')

@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: linear-gradient(to bottom, rgba(255, 165, 52, 0.5) 0%, rgba(255, 82, 33, 0.9) 70%, rgba(255, 165, 52, 0.5) 100%)">
                        @if(auth()->user()->front_extension === NULL)
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Please Upload a Valid ID') }}</h4>
                                @if(session('status'))
                                    <h4 class="card-title pull-right" style="color: greenyellow">{{ session('status') }}</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('id.verify') }}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Front image of a valid ID:') }}</label>
                                                <input class="form-control @error('front') is-invalid @enderror" required type="file" name="front" id="front" accept="image/png, image/jpeg">
                                                @if(session('front'))
                                                    <span role="alert" style="color: red;">
                                                    <strong>{{ session('front') }}</strong>
                                                </span>
                                                @endif
                                                @error('front')
                                                <span role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-1">
                                            <div class="form-group">
                                                <label class="txt-white">{{ __('Back image of the same valid ID:') }}</label>
                                                <input class="form-control @error('back') is-invalid @enderror" required type="file" name="back" id="back" accept="image/png, image/jpeg">
                                                @if(session('back'))
                                                    <span role="alert" style="color: red;">
                                                        <strong>{{ session('back') }}</strong>
                                                    </span>
                                                @endif
                                                @error('back')
                                                <span role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Upload ID') }}</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @else
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Please Upload your ID') }}</h4>
                            </div>
                            <div class="card-body justify-content-center">
                                <center><h4 class="card-title justify-content-center" style="color: greenyellow">{{ __('You have submitted your ID and awaiting approval from your account officer') }}</h4></center>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
