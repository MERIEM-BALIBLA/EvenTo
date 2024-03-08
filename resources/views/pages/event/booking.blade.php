@extends('layouts.app')
@section('content')
    <div class="p-6 pt-0">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if ($userBooking && ($event->automatic || $userBooking->reserve === 'accepted'))
            <form action="{{ route('downloadTicket') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="event_id" value="{{ $event->id }}">

                <button type="submit"
                    class="border-2 border-black font-semibold inline-flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-20 px-4 py-2 w-80 p-4 text-lg rounded-full transition duration-300 hover:bg-gradient-to-r from-blue-600 to-green-600 hover:text-white hover:ring">Click
                    here to get your Ticket</button>
            </form>
        @else
            <form action="{{ route('booking_store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <button type="submit"
                    class="border-2 border-black font-semibold inline-flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2 w-60 p-4 text-lg rounded-full transition duration-300 hover:bg-gradient-to-r from-blue-600 to-green-600 hover:text-white hover:ring">Reserve
                    a ticket</button>
            </form>
        @endif
    </div>
@endsection
