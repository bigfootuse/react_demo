<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Deposit;
use App\Models\Wallet;
use Sentinel;

class TransactionController extends Controller
{
    public function depositTransaction()
    {
         $deposit=Deposit::with('user_info')->where('user_id',Sentinel::getuser()->id)->orderBy('id', 'desc')->get();

        return view('user.deposit_transaction', compact('deposit'));
    }

    public function withdrawalTransaction()
    {
         $withdraw=Withdraw::with('user_info')->orderBy('id', 'desc')->where('user_id',Sentinel::getuser()->id)->get();

        return view('user.withdrawal_transaction', compact('withdraw'));
    }

    public function buyTokenTransaction()
    {
        $wallet = Wallet::with('user')->where('user_id',Sentinel::getuser()->id)->orderBy('id', 'desc')->get();
        return view('user.wallet.tokenh', compact('wallet'));
    }
}
