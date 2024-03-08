<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditEventRequest;
use App\Http\Requests\EventRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        $events = Event::with('cetegory')
            ->where('user_id', $userId)
            ->get();
        $categories = Category::all();

        return view('pages.orgnizer.event.index', compact('events', 'categories'));
    }


    public function store(EventRequest $request)
    {
        $user = auth()->user();
        $eventData = $request->validated();
        $eventData['user_id'] = $user->id;
        Event::create($eventData);

        return redirect()->route('event');
    }
    
    public function edit($id)
    {
        $event = Event::findOrFail($id)->load('cetegory'); // Charger la relation de catégorie
        $categories = Category::all();
        return view('pages.orgnizer.event.edit', ['event' => $event, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->cetegory_id = $request->input('category_id');
        $event->date = $request->input('date');
        $event->address = $request->input('address');
        $event->capacity = $request->input('capacity');

        $event->save();
        return redirect('event');
    }

    public function destroy(event $event)
    {

        $event->delete();
        return redirect('event');

    }

    public function updateStatus(Request $request, $id)
    {
        // Valider la requête
        $request->validate([
            'status' => 'required|in:refused,pending,accepted',
        ]);

        // Trouver l'événement par son ID
        $event = Event::findOrFail($id);

        // Mettre à jour le statut de l'événement
        $event->update(['status' => $request->status]);

        // Rediriger vers la page précédente avec un message de succès
        return redirect()->back()->with('success', 'Event status updated successfully.');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('pages.event.index',compact('event'));
    }

    public function auto(Request $request, $id)
    {
        $request->validate([
            'automatic' => 'required|in:0,1',
        ]);
    
        $automatic = $request->input('automatic');
    
        // Mettre à jour l'état dans la base de données
        $event = Event::findOrFail($id);
        $event->automatic = $automatic; // La valeur est déjà soit true (1) soit false (0)
        $event->save();
    
        return redirect()->back()->with('success', 'État de l\'événement mis à jour avec succès.');
    }
    
}
