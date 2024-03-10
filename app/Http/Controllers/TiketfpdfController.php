<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class TiketfpdfController extends Controller
{

    public function generatePdf(Request $request)
    {
        $eventId = $request->input('event_id');
        $userId = auth()->user()->id;

        $event = Event::findOrFail($eventId);
        $pdf = new Fpdf();
        $pdf->AddPage('L', array($pdf->GetPageWidth(), 100));
        $pdf->SetFillColor(255, 238, 208); // Violet

        // Remplir la zone avec la couleur de remplissage
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), 100, 'F');
        $pdf->Image(public_path('assets/images/event.jpg'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
        $pdf->SetFillColor(255, 238, 208); // Violet

        $pdf->SetFont('Arial', 'B', 14);

        // Couleur du texte en bleu
        $pdf->SetTextColor(255, 165, 0);

        $pdf->SetXY(6, 6);

        // Dessiner le texte "EvenTo" avec styles HTML
        $pdf->Cell(0, 0, 'EvenTo', 0, 0, 'L');

        // Couleur du texte en orange
        $pdf->SetXY(15, 20);
        $pdf->SetFont('Arial', 'B', 25);
        $pdf->SetTextColor(240, 183, 66);

        $pdf->Cell(0, 10, 'Glad to have you join us at Evento', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        // Définir la position initiale
        $pdf->SetTextColor(255, 255, 255); // Blanc

        $pdf->SetXY(0, 40);

        $pdf->Cell(0, 10, $event->title, 0, 1,'C');
        // $pdf->SetXY(30, 60); // Par exemple, position verticale de 40

        // $pdf->Cell(0, 10, $event->description, 0, 1);
        // $pdf->SetXY(130, 50); // Position verticale de 50

        $pdf->Cell(0, 10, $event->date, 0, 1,'C');
        // $pdf->SetXY(130, 60); // Position verticale de 60

        $pdf->Cell(0, 10, 'Description: ' . $event->address, 0, 1,'C');
        $file = "ticket.pdf";
        $pdf->Output($file, 'D');
        return response()->json(['message', 'Ticket téléchargé avec succès'], 200);

    }

    // public function generatePdf()
    // {

    //     // Créer un nouvel objet FPDF
    //     $pdf = new Fpdf();
    //     $pdf->AddPage('L', array($pdf->GetPageWidth(), 100));
    //     $pdf->SetFillColor(255, 238, 208); // Violet

    //     // Remplir la zone avec la couleur de remplissage
    //     $pdf->Rect(0, 0, $pdf->GetPageWidth(), 100, 'F');
    //     $pdf->Image(public_path('assets/images/event.jpg'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
    //     $pdf->SetFillColor(255, 238, 208); // Violet

    //     $pdf->SetFont('Arial', 'B', 14);

    //     // Couleur du texte en bleu
    //     $pdf->SetTextColor(255, 165, 0);

    //     $pdf->SetXY(6, 6);

    //     // Dessiner le texte "EvenTo" avec styles HTML
    //     $pdf->Cell(0, 0, 'EvenTo', 0, 0, 'L');

    //     // Couleur du texte en orange
    //     $pdf->SetXY(15, 20);
    //     $pdf->SetFont('Arial', 'B', 25);
    //     $pdf->SetTextColor(240, 183, 66);

    //     $pdf->Cell(0, 10, 'Glad to have you join us at Evento', 0, 1, 'C');
    //     $pdf->SetFont('Arial', 'B', 20);
    //     // Définir la position initiale
    //     $pdf->SetTextColor(255, 255, 255); // Blanc

    //     $pdf->SetXY(30, 50);

    //     // Ajouter des informations sur l'événement
    //     $pdf->Cell(0, 10, 'Title', 0, 1, 'L'); // Centrer le texte

    //     // Positionner le curseur à une position verticale spécifique pour la prochaine cellule
    //     $pdf->SetXY(30, 60); // Par exemple, position verticale de 40

    //     $pdf->Cell(0, 10, 'Date', 0, 1, 'L'); // Centrer le texte

    //     $pdf->SetXY(130, 50); // Position verticale de 50
    //     $pdf->Cell(0, 10, 'Address', 0, 1, 'L'); // Centrer le texte

    //     $pdf->SetXY(130, 60); // Position verticale de 60
    //     $pdf->Cell(0, 10, 'Description', 0, 1, 'L'); // Centrer le texte

    //     // Générer le PDF en mémoire tampon
    //     ob_start();
    //     $pdf->Output();
    //     $pdf_content = ob_get_clean();

    //     // Retourner le contenu du PDF
    //     return response($pdf_content, 200, [
    //         'Content-Type' => 'application/pdf'
    //     ]);
    // }




}