<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkateBookingController extends Controller
{
    public function create()
    {
        return view('skates.book');
    }

    public function store(Request $request)
    {
        return redirect()->route('skates.book')
            ->with('success', 'Бронь коньков успешно создана (демо).');
    }
}