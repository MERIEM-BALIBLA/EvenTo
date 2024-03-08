@include('layouts.head')
<link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet" />

<div class="bg-orange-100 min-h-screen">
    <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full">
        <div class="flex items-center justify-between py-2 text-5x1">
            <div class="font-bold text-blue-900 text-xl">Even<span class="text-orange-600">To</span></div>
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
                                    User name</th>

                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Event title</th>

                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Booking status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 text-left text-blueGray-700 overflow-wrap break-word">
                                    {{$book->user->name}}
                                </td>
                                
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                    {{$book->event->title }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 overflow-wrap break-word">
                                    @if($book->event->automatic)
                                        Accpted
                                    @else
                                        <form action="{{route('booking_update', $book->event->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$book->event->id}}">
                                                <div class="flex flex-row">
                                                    <select name="reserve" class="form-select">
                                                        @foreach(['refused', 'pending', 'accepted'] as $reserve)
                                                            <option value="{{ $reserve }}" {{ $book->reserve === $reserve ? 'selected' : '' }}>
                                                                {{ $reserve }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    <button type="submit" class="btn btn-success ml-2">Submit</button>
                                                </div>
                                        </form>

                                    @endif
                                </td>

                                {{-- <td
                                    class="flex border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-normal p-4 ">
                                    <a href="">
                                        <button
                                            class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                            <div
                                                class="absolute inset-0 w-2 bg-green-700 transition-all duration-[250ms] ease-out group-hover:w-full">
                                            </div>
                                            <span class="relative text-black group-hover:text-white">Update</span>
                                    </a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                            <div
                                                class="absolute inset-0 w-2 bg-red-700 transition-all duration-[250ms] ease-out group-hover:w-full">
                                            </div>
                                            <span class="relative text-black group-hover:text-white">Delete</span>
                                    </form>
                                    <a href="">
                                        <button
                                            class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                            <div
                                                class="absolute inset-0 w-2 bg-pink-700 transition-all duration-[250ms] ease-out group-hover:w-full">
                                            </div>
                                            <span class="relative text-black group-hover:text-white">Show</span>
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
