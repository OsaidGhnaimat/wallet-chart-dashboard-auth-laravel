<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('firstPage');
    }

    public function secondPage()
    {
        $id =  Auth::user()->id;
        $user =  Auth::user();
        $transactions = Transaction::where('user_id', $id)->get();
        return view('form', compact('transactions','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'     =>'required',
            'note'       =>'required',
            'transaction'=>'required',
            'category'   =>'required'
        ]);

        $userUpdate = User::find(Auth::user()->id);
        if($request->transaction == "income"){
            $userUpdate->balance += $request->amount ;
            $userUpdate->update();
        }else {
            $userUpdate->balance -= $request->amount ;
            $userUpdate->update();
        }
            
        Transaction::create([
            'amount'      => $request->amount,
            'note'        => $request->note,
            'transaction' => $request->transaction,
            'category'    => $request->category,
            'user_id'     => Auth::user()->id,
        ]);

        return redirect()->route('secondPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'balance'   =>'required'

        ]);
        dd("sssssss");
        $userUpdate = User::find(Auth::user()->id);
        $userUpdate->balance = $request->balance ;
        $userUpdate->update();
        
        return view('firstPage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
