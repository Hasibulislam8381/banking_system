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
    public function view_withdraw()
    {
        return view('frontend.view_withdraw');
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
    public function createWithdraw()
    {
        //
        return view('frontend.create_withdraw');
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
    public function withdraw(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    $user = Auth::user();

    $withdrawalRate = $user->account_type === 'individual' ? 0.015 : 0.025;

   
    if ($user->account_type === 'business') {
        $totalWithdrawal = $this->getTotalWithdrawalForAccount($user);
        if ($totalWithdrawal >= 50000) {
            
            $withdrawalRate = 0.015;
        }
    }


    $withdrawalFee = $request->amount * $withdrawalRate;

    $newBalance = $user->balance - ($request->amount + $withdrawalFee);

 
    $user->update(['balance' => $newBalance]);

    Transaction::create([
        'user_id' => $user->id,
        'amount' => $request->amount,
        'fee' => $withdrawalFee,
        'transaction_type' => 'withdraw', 
        'date' => now(),
    ]);

   
    return redirect()->back()->with('success', 'Withdrawal successful!');
}

private function getTotalWithdrawalForAccount($user)
{
    return Transaction::where('user_id', $user->id)
        ->where('transaction_type', 'withdraw')
        ->where('amount', '>', 0) 
        ->sum('amount');
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
