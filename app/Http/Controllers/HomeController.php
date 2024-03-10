<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->take(3)->get();
        $events = Event::latest()->take(4)->get();

    
        return view('index', compact('categories','events'));
    }
    



}
