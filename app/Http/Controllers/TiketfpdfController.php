<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class TiketfpdfController extends Controller
{

    // private function checkBooking($eventId, $userId)
    // {
    //     $existingAcceptedBooking = Book::where('event_id', $eventId)
    //         ->where('user_id', $userId)
    //         ->where('reserve', 'accepted')
    //         ->exists();

    //     return $existingAcceptedBooking;
    // }
    public function downloadTicket(Request $request)
    {
        $eventId = $request->input('event_id');
        $userId = auth()->user()->id;
    
        // Vérifier si l'utilisateur a déjà une réservation approuvée pour cet événement
        // $userBooking = Book::where('user_id', $userId)
        //                       ->where('event_id', $eventId)
        //                       ->where('reserve', 'accepted')
        //                       ->first();
    
        // if ($userBooking) {
        //     // L'utilisateur a déjà une réservation approuvée pour cet événement
        //     return redirect()->back()->with('message', 'Vous avez déjà une réservation approuvée pour cet événement.');
        // }
    
        // Si l'utilisateur n'a pas encore de réservation approuvée, procédez au téléchargement du ticket
        $event = Event::findOrFail($eventId);
        // if ($event->capacity > 0) {
            // $event->decrement('capacity');
            $pdf = new Fpdf();
            $pdf->AddPage('L', array($pdf->GetPageWidth(), 80));
            $pdf->SetDrawColor(149, 117, 205);
            $pdf->SetFillColor(224, 176, 255);
            $pdf->SetFont('Arial', '', 12);
            $file = "ticket.pdf";
            $pdf->Output($file, 'D');
            return response()->json(['message', 'Ticket téléchargé avec succès'], 200);
        // } else {
        //     return redirect()->back()->with('message', 'Capacité de l\'événement dépassée');
        // }
    }
    
    // public function downloadTicket(Request $request)
    // {
    //     $eventId = $request->input('event_id');
    //     $userId = auth()->user()->id;
    //     // Vérifier si l'utilisateur a déjà un ticket pour cet événement
    //     // $userTicket = Ticket::where('user_id', $userId)->where('book_id', $eventId)->first();

    //     // if ($userTicket) {
    //     //     // L'utilisateur a déjà un ticket pour cet événement
    //     //     return redirect()->back()->with('message', 'Vous avez déjà téléchargé un ticket pour cet événement.');
    //     // }
    //     $event = Event::findOrFail($eventId);
    //     if ($event->capacity > 0) {
    //         $event->decrement('capacity');
    //         $pdf = new Fpdf();
    //         $pdf->AddPage('L', array($pdf->GetPageWidth(), 80));
    //         $pdf->SetDrawColor(149, 117, 205);
    //         $pdf->SetFillColor(224, 176, 255);
    //         $pdf->SetFont('Arial', '', 12);
    //         $file = "ticket.pdf";
    //         $pdf->Output($file, 'D');
    //         return response()->json(['message', 'Ticket downloaded successfully'], 200);
    //     } else {
    //         return redirect()->back()->with('message', 'Event capacity exceeded');
    //     }
    // }

}