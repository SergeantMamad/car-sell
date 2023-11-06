<x-layout>
    @include('components.navbar', ['page' => 'create'])
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
    @foreach ($errors->all() as $error)
        <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
    @endforeach
    <div class="py-12 bg-zinc-800 h-max">
        <div class="max-w-fit mx-auto py-8 bg-zinc-800 text-white rounded-lg">
            <div class="overflow-x-scroll flex mx-auto ml-36">
                <a href="{{ route('chooseCompany', ['BMW']) }}">
                    <div class="flex-none py-6 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/bmw.png') }}">
                            <p class="text-xl" id="Bmw">BMW</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('chooseCompany', ['Volkswagen']) }}">
                    <div class="flex-none py-6 px-3 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/volkswagen.png') }}">
                            <p class="text-xl">Volkswagen</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('chooseCompany', ['Honda']) }}">
                    <div class="flex-none py-6 px-3 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/honda.png') }}">
                            <p class="text-xl">Honda</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @if (isset($request))
            <form method="POST" action="{{ route('storeModel', ['company' => $request]) }}">
                @csrf
                <div class="max-w-fit mx-auto text-white grow-1">
                    <label class="text-xl ml-32" for="model" required>Name:</label>
                    <input
                        class="bg-zinc-600 rounded-lg py-2 border ml-2 h-8 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Like M3" type="text" name="model" id="model" value="{{ old('model') }}">
                    <button type="submit"
                        class="ml-10 text-sm mt-30 bg-green-600 text-gray-200 hover:bg-green-700 rounded-sm p-1 transition ease-in-out duration-150">Submit</button>
                </div>
            </form>
        @endif
    </div>
</x-layout>
