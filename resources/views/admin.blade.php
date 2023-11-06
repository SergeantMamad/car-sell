<x-layout>
    @include('components.navbar', ['page' => 'main'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#message').delay(3000).fadeOut(300);
        });
    </script>
    @if (session()->has('success'))
        <div class="z-10 right-5 w-72 rounded align-center p-8 mx-auto text-white bg-green-500 fixed" id="message">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="z-10 right-5 w-72 rounded align-center p-8 mx-auto text-white bg-red-500 fixed" id="message">
            {{ session('error') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-center text-white text-2xl">5 Latest Ads</p>
            <div class="bg-zinc-800 mt-5 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex-initial">
                    @unless (count($cars) == 0)
                        <table class="w-full align-center border-separate border-spacing-y-3">
                            <thead>
                                <tr>
                                    <th>Make</th>
                                    <th>Year & Model</th>
                                    <th>Data Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            @foreach ($cars as $car)
                                <tbody class="hover:bg-zinc-700">
                                    <th>{{ $car->company }}</th>
                                    <th>{{ $car->year }} {{ $car->model }}</th>
                                    <th>{{ $car->created_at->diffForHumans() }}</th>
                                    <th><a href="/dashboard/edit/{{ $car->id }}"
                                            class="p-2 text-green-600 rounded-full">Edit</a><a
                                            href="/dashboard/delete/{{ $car->id }}"
                                            class="ml-5 p-2 text-red-600">Delete</a></th>
                                </tbody>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center w-full">You have no ads</p>
                    @endempty
                </div>
            </div>
            <div class="flex flex-row gap-x-40 mt-10 text-white">
                <div class="flex bg-gradient-to-r from-indigo-800 to-indigo-950 rounded-lg h-[300px] w-[300px]">
                    <p class="absolute flex grow-0 shrink-0 flex-nowrap text-center text-3xl mt-5 ml-24">USERS</p>
                    <p class="mt-44 text-8xl ml-5">{{ count($users) }}</p>
                </div>
                <div class="flex bg-gradient-to-r from-emerald-800 to-emerald-950 rounded-lg h-[300px] w-[300px]">
                    <p class="absolute flex grow-0 shrink-0 flex-nowrap text-center text-3xl mt-5 ml-28">ADS</p>
                    <p class="mt-44 text-8xl ml-5">{{ count($cars) }}</p>
                </div>
                <div class="flex bg-gradient-to-r from-cyan-800 to-cyan-950 rounded-lg h-[300px] w-[300px]">
                    <p class="absolute flex grow-0 shrink-0 flex-nowrap text-center text-3xl mt-5 ml-7">Something Else
                    </p>
                    <p class="mt-44 text-8xl ml-5">5</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
