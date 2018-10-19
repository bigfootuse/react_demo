<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Wallet;
use Sentinel;
use App\User;

class WalletController extends Controller
{
    public function Wallet() {
        return view('user.wallet');
    }

    public function getAllTokenh()
    {
        $wallet = Wallet::with('user_h')->orderBy('id', 'desc')->get();
        return view('admin.tokenh', compact('wallet'));
    }
}
