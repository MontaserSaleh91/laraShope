<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::with('ticketType','customer','order')->paginate(16);
        return view('admin.tickets.tickets')->with([
            'tickets'=>$tickets
        ]);
    }
}
