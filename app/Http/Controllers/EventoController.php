<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $events = Event::where('status', 'accepted')
            // ->whereDate('date', '>=', Carbon::today())
            ->paginate(4);

        $latestEvent = Event::latest()->first();


        return view('pages.index', compact('categories', 'events', 'latestEvent'));

    }
    public function filterEvent(Request $request){
        $categories = Category::get();
        $query = Event::query();
       if($request->ajax()){
            $events = $query->where(['cetegory_id'=>$request->category])->get();
            return response()->json(['events'=>$events]);
       }
       $events = $query->get();
       return view('pages.index', compact('categories', 'events'));

    }

    public function searchByTitle(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        // Requête pour rechercher les événements par titre et éventuellement par catégorie
        $events = Event::query()
            ->where('title', 'like', '%'.$search.'%');

        if ($category && $category !== 'all') {
            $events->where('category_id', $category);
        }

        $events = $events->get();

        // Retourner les résultats au format JSON
        return response()->json(['events' => $events]);
    }

}
