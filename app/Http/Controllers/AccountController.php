<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showAccount()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->latest('paid_at')
            ->get();

        return view('account', compact('tickets'));
    }
}