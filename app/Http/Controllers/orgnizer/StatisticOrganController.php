<?php

namespace App\Http\Controllers\orgnizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatisticOrganController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        $events = Event::with('cetegory')
            ->where('user_id', $userId)
            ->where('status', 'accepted')
            ->count();
            $eventspen = Event::with('cetegory')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->count();


        return view('pages.orgnizer.index', compact('events', 'eventspen'));
    }

}