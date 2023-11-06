<x-layout>
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
    <div class="text-white bg-zinc-800 mt-28 drop-shadow-2xl rounded-lg h-max-fit w-3/4 mx-auto">

        <a href="{{ route('edit', ['id' => $car->id]) }}">
            <p
                class="inline-block text-xs w-20 mt-1 ml-8 bg-zinc-600 text-gray-200 hover:bg-zinc-700 rounded-sm p-1 transition ease-in-out duration-150 text-center">
                Back</p>
        </a>
        @unless (count($carImages) == 0)
            <div class="flex flex-row">
                @foreach ($carImages as $carImage)
                    <div class="p-8 items-center text-center">

                        <img src="/carsImage/{{ $carImage->image }}" class="object-fit relative border shadow-sm w-44 h-full"
                            alt="Salam">
                        <a href="/dashboard/edit/pics/{{ $carImage->id }}/delete">
                            <p
                                class="inline-block text-xs w-44 mt-1 bg-red-600 text-gray-200 hover:bg-red-700 rounded-sm p-1 transition ease-in-out duration-150">
                                Delete</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="p-6 text-center">There is currently no image uploaded for this ad</p>
        @endunless
        <div class="relative flex py-5 items-center max-w-7xl mx-auto">
            <div class="flex-grow border-t border-white"></div>
            <span class="flex-shrink mx-4 text-white">Or</span>
            <div class="flex-grow border-t border-white"></div>
        </div>
        <form method="POST" action="{{ route('updateImages', ['id' => $car->id]) }}" enctype="multipart/form-data">
            @csrf
            <label for="dropzone-file"
                class="items-center flex mx-auto justify-center text-center w-1/2 h-[350px] border-2 border-cyan-500 border-dashed rounded-lg cursor-pointer bg-zinc-800 hover:bg-zinc-700">
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" name="images[]" type="file" onchange="this.form.submit()" class="hidden"
                    multiple />
            </label>
        </form>
</x-layout>
