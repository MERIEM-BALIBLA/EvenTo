@extends('layouts.app')
@section('content')

<body style="background-image: url('{{ asset('assets/images/flouer.png') }}')">
    
    <div class="flex flex-col gap-2 justify-center items-center">
        <h1 class="sm:text-3xl text-3xl font-medium title-font mb-4 text-gray-900">{{$event->title}}</h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="none" stroke="#800062" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 0 0-4-4h-1a1 1 0 0 1-1-1V9a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v9l-2.4-3.2A2 2 0 0 0 6 14h-.434C4.701 14 4 14.701 4 15.566v0c0 .284.077.563.223.806L7 21m5-17V3m6 7h1M5 10h1m1.343-4.657l-.707-.707m10.021.707l.707-.707"/></svg>
        <h2>
            CONTENT
        </h2>
        <p>
            {{$event->description}}
        </p>
        <h2>TIME</h2>
        <p>
            {{$event->date}}
        </p>
        <h2>PLACE</h2>
        {{$event->address}}
        <h3>PRICE</h3>
        <p>
            {{$event->price}}
        </p>
{{-- <form action="booking/{{ $event->id }}" method="POST">
    @csrf
    @method('POST')
    <button>Book Here</button>
</form> --}}
<a ><button>Book Here</button></a>
    </div>

</body>
@endsection
