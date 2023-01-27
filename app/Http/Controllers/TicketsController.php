<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function userTickets()
    {
        return view('user-pages.tickets');
    }
}
