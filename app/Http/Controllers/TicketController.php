<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function showBuyForm()
    {
        return view('tickets.buy');
    }

    public function createPayment(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => Auth::id(), // если гость — будет null
            'code'    => 'T-' . strtoupper(Str::random(10)),
            'amount'  => 300,
            'paid_at' => now(),
        ]);

        if (Auth::check()) {
            return redirect()->route('showAccount')
                ->with('success', 'Билет оплачен! Он добавлен в профиль.');
        }

        return redirect()->route('tickets.show', $ticket->id)
            ->with('success', 'Билет оплачен! Сохраните код.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
}