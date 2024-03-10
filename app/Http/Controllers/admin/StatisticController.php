<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;

class StatisticController extends Controller
{

    public function index(){
        $users = User::count();
        $events = Event::count();
        $eventsaccp = Event::where('status', 'accepted')->count();
        $eventspend = Event::where('status', 'pending')->count();
        $eventrefuse = Event::where('status', 'refused')->count();

        $eventsTable = Event::latest()->take(4)->get();

        $categories = Category::count();


        return view('admin.index', compact('users','events','eventsaccp','eventspend','eventrefuse','eventsTable','categories'));
    }

}