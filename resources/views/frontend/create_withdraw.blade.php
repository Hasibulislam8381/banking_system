
@extends('layouts.frontend.master')

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Withdraw Form') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('withdraw.store') }}">
                            @csrf
    
                            <div class="mb-3">
                                <label for="user_name" class="form-label">{{ __('User Name') }}</label>
                                <input id="user_name" type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
    
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __('Withdraw Amount') }}</label>
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">{{ __('Withdraw') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
