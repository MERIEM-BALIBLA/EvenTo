<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $categories = Category::get();
        $events = Event::get()->where('status', 'accepté');
        // $book = Book::with('event')->with;

        return view('pages.index',compact('categories','events'));

    }
    public function search(Request $request)
    {
        dd($request);

        // Récupérer les données de la requête AJAX
        // $search = $request->input('search');
        // // Afficher la valeur de $search pour le débogage
    
        // // Effectuer la recherche dans la base de données
        // $results = Event::where('title', 'like', '%'.$search.'%')->get();
    
        // Charger la vue et transmettre les résultats comme données à afficher dans la vue
        return redirect()->back();
    }
    
    
}
