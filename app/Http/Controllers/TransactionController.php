<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.index');
        //
    }
    public function get_deposite()
    {
        return view('frontend.view_deposit');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function createDeposite()
    {
        //
        return view('frontend.create_deposite');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function deposite(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0', 
        ]);

      
        $userId = Auth::id();

        $user = User::find($userId);

       
        $currentBalance = $user->balance;

        
        $transactionAmount = $request->amount;
        $transactionType = 'deposit'; 
        $newBalance = $transactionType === 'deposit' ? $currentBalance + $transactionAmount : $currentBalance - $transactionAmount;

      
        $user->update(['balance' => $newBalance]);
    
    
        Transaction::create([
            'user_id' => $userId,
            'amount' => $transactionAmount,
            'transaction_type' => $transactionType,
            'date' => Carbon::now(),
            
        ]);

        
        return redirect()->back()->with('success', 'Deposit successful!');
    }

   
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
