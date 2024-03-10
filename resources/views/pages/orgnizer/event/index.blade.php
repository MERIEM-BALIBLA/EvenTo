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

    {{-- body --}}
    <div class="px-4 py-2 bg-white rounded-xl shadow-lg">
        <div class="text-center">
            <h1 class="mb-2">Add a new Event</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Event_Store') }}" method="POST" class="text-center" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="text" name="title" placeholder="Enter the title of the event">
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <textarea
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="text" name="description" placeholder="Short description about the activities"></textarea>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="file" name="image">
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <select name="cetegory_id"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="" class="text-gray-600">Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="datetime-local" name="date" placeholder="Enter the time">
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="text" name="address" placeholder="Enter the address">
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="number" name="capacity" placeholder="Enter the capacity" value="10">
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    type="number" name="price" placeholder="Enter the price of ticket" value="50">
            </div>




            <div class="mx-auto">
                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                    <div
                        class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                    </div>
                    <span class="relative text-black group-hover:text-white">Add</span>
                </button>
            </div>


        </form>



    </div>
    <section class="bg-blueGray-50 mt-4">
        <div class="w-full xl:w-8/10 mb-12 xl:mb-0 px-4 mx-auto ">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="deleteAllCompanies"
                                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="submit">Delete all</button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Title</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Content</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Image</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Category</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Date</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Address</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Tickets number</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    price</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    booking operation</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Status</th>

                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($companies as $company) --}}
                            @foreach ($events as $event)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 text-left text-blueGray-700 overflow-wrap break-word">
                                        {{ $event->title }}
                                    </td>

                                    <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    {{ Illuminate\Support\Str::limit ($event->description, 30, '...') }}
                                    </td>

                                    <td
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ Illuminate\Support\Str::limit($event->image, 30, '...') }}
                                    </td>

                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{ $event->cetegory->name }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{-- {{ $event->date }} --}}
                                        {{ date('Y-m-d H:i', strtotime($event->date)) }}
                                    </td>

                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{ $event->address }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{ $event->capacity }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{ $event->capacity }}
                                    </td>
                                    {{-- <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        {{ $event->automatic }}
                                    </td> --}}
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        @if ($event->status === 'refused')
                                            <span class="text-red-500">{{ $event->status }}</span>
                                        @elseif ($event->status === 'accepted')
                                            <span class="text-green-500">{{ $event->status }}</span>
                                        @else
                                            <span class="text-yellow-500">{{ $event->status }}</span>
                                        @endif
                                    </td>

                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                        
                                        <form id="activationForm_{{ $event->id }}" action="{{ route('auto', $event->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        
                                            {{-- <label for="automatic">Choisir l'état :</label> --}}
                                            <select name="automatic" id="automatic_{{ $event->id }}" onchange="this.form.submit()">
                                                <option value="0" {{ $event->automatic == 0 ? 'selected' : '' }}>Manuel</option>
                                                <option value="1" {{ $event->automatic == 1 ? 'selected' : '' }}>Automatique</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td
                                        class="flex flex-col gap-4 border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 ">
                                        <a href="{{ route('event_edit', ['event' => $event->id]) }}">
                                            <button id="update"
                                                class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                                <div
                                                    class="absolute inset-0 w-2 bg-green-700 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                </div>
                                                <span class="relative text-black group-hover:text-white">Update</span>
                                            </button>
                                        </a>
                                        <form action="{{ route('event_destroy', ['event' => $event->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                                <div
                                                    class="absolute inset-0 w-2 bg-red-700 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                </div>
                                                <span class="relative text-black group-hover:text-white">Delete</span>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $events->links() }}

                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<script>
    function submitForm(eventId) {
        var checkBox = document.getElementById("scales_" + eventId);
        var automaticInput = document.getElementById("automatic_" + eventId);

        if (!checkBox.checked) {
            // Si la case n'est pas cochée, définissez la valeur du champ hidden sur 0 avant de soumettre le formulaire
            automaticInput.value = "0";
        } else {
            // Si la case est cochée, assurez-vous que la valeur du champ hidden reste à 1
            automaticInput.value = "1";
        }
        // Soumettre le formulaire
        document.getElementById("activationForm_" + eventId).submit();
    }
</script>
