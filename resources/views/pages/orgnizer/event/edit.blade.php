@include('layouts.head')
<link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet" />

<div class="bg-orange-100 min-h-screen">
    <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full">
        <div class="flex items-center justify-between py-2 text-5x1">
            <a href="/page_index"><div class="font-bold text-blue-900 text-xl">Even<span class="text-orange-600">To</span></div></a>
            <div class="flex items-center text-gray-500">
                <span class="material-icons-outlined p-2" style="font-size: 30px">search</span>
                <span class="material-icons-outlined p-2" style="font-size: 30px">notifications</span>
                <div class="bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"
                    style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)">
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.side')

    <div class="px-4 py-2 bg-white rounded-xl shadow-lg">
        <div class="text-center">
            <h1 class="mb-2">Add a new Event</h1>
        </div>
            <form action="{{ route('event_update', $event->id) }}" method="POST" class="text-center"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="title" placeholder="Enter the title of the event"
                        value="{{ $event->title }}">
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <textarea
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="description" placeholder="Short description about the activities">{{ $event->description }}</textarea>
                </div>
                <div class="mx-auto">
                    <input value="{{ $event->image }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="file" name="image">
                    {{-- @if($event->image)
                        <p class="text-sm text-gray-500">{{ $event->image }}</p>
                    @else
                        <p class="text-sm text-gray-500">No image selected</p>
                    @endif --}}
                </div>
                
                
                <div class="relative z-0 w-full mb-5 group">

                    <select name="category_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                        @foreach ($categories as $category)
                            {{-- Vérifier si la catégorie correspond à celle sélectionnée précédemment --}}
                            @if ($event->category && $event->category->id === $category->id)
                                {{-- Si oui, sélectionner cette catégorie --}}
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                {{-- Sinon, afficher les autres catégories sans sélection --}}
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="date" placeholder="Enter the time" value="{{ $event->date }}">
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="address" placeholder="Enter the address" value="{{ $event->address }}">
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="capacity" placeholder="Enter the capacity" value="{{ $event->capacity }}">
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="number" name="price" placeholder="Enter the price of ticket" value="50">
                </div>

                <div class="mx-auto">
                    <button type="submit"
                        class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                        <div
                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                        </div>
                        <span class="relative text-black group-hover:text-white">Save changes</span>
                    </button>
                </div>

            </form>
        </div>

    {{-- </div> --}}
