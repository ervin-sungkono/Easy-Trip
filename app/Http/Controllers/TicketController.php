<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(){
        $tickets = Auth::user()->tickets;
        return view('ticket.index', compact('tickets'));
    }

    public function download($id){
        $ticket = Ticket::findOrFail($id);

        $pdf = Pdf::loadView('ticket.ticket', [
            'ticket' => $ticket,
            'user' => $ticket->user,
            'item' => $ticket->item,
        ]);

        return $pdf->download("ticket_".$id.".pdf");
    }
}
