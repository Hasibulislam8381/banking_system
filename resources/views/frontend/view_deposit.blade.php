@extends('layouts.frontend.master')
@section('content')
@php
$user = \App\Models\User::find(auth()->id()); 
$transaction_info = \App\Models\Transaction::where('user_id', auth()->id())
    ->where('transaction_type', 'deposit') 
    ->orderBy('date', 'desc') 
    ->get();

@endphp
<section>
  <div class="container">
    <div class="row">
       
        <div class="col-md-12">
            <div class="container">
                <div class="card transiction-box" style="">
                    <div class="card-body ">
                      <h5 class="card-title ">All Transiction</h5>
                      @foreach ($transaction_info as $info)
                        
                    
                       <p class="trans-title">Date:{{ $info->date }} {{ $info->transaction_type }} {{ $info->amount }}tk ...</p>
                     @endforeach
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection