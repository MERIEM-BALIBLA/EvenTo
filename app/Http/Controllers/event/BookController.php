<?php
namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $books = Book::whereHas('event', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->with('event')
            ->get();
        return view('pages.orgnizer.reserve.index', compact('books'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $userBooking = $event->booking->where('user_id', auth()->user()->id)->first();

        return view('pages.event.booking', compact('event','userBooking'));
    }

    // public function store(Request $request)
    // {
    //     // Valider les données de la demande
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'event_id' => 'required|exists:events,id',
    //     ]);

    //     // Créer une nouvelle réservation
    //     Book::create([
    //         'user_id' => $request->user_id,
    //         'event_id' => $request->event_id,
    //     ]);

    //     // Rediriger avec un message de succès
    //     return redirect()->back()->with('success', 'Booking created successfully.');
    // }

    public function store(Request $request)
{
    // Valider les données de la demande
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'event_id' => 'required|exists:events,id',
    ]);

    // Vérifier si une réservation existe déjà pour cet utilisateur et cet événement
    $existingBooking = Book::where('user_id', $request->user_id)
                           ->where('event_id', $request->event_id)
                           ->exists();

    // Si une réservation existe déjà, renvoyer un message d'erreur
    if ($existingBooking) {
        return redirect()->back()->with('message', 'Vous avez déjà réservé un ticket pour cet événement.');
    }

    // Vérifier si l'événement a des tickets disponibles
    $event = Event::findOrFail($request->event_id);
    if ($event->capacity <= 0) {
        return redirect()->back()->with('message', 'Désolé, il n\'y a plus de tickets disponibles pour cet événement.');
    }

    // Décrémenter le nombre de tickets disponibles
    $event->decrement('capacity');

    // Créer une nouvelle réservation
    $booking = Book::create([
        'user_id' => $request->user_id,
        'event_id' => $request->event_id,
    ]);

    // Rediriger avec un message de succès
    return redirect()->back()->with('message', 'Votre réservation a été créée avec succès.');
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'reserve' => 'required|in:refused,pending,accepted',
        ]);

        // Trouver la réservation associée à l'événement par son ID
        $book = Book::where('event_id', $id)->firstOrFail();

        // Mettre à jour le statut de la réservation
        $book->update(['reserve' => $request->reserve]);

        // Rediriger vers la page précédente avec un message de succès
        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

}
