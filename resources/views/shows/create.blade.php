<x-layout>
    <div
        class="text-white bg-zinc-800 drop-shadow-2xl rounded-lg h-max-fit mt-[150px] w-3/4 mx-auto items-center justify-center">
        <div>
            @foreach ($errors->all() as $error)
                <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
            @endforeach
        </div>
        <div class="max-w-md mx-auto bg-zinc-800 text-white rounded-lg">
            <div class="overflow-x-scroll flex">
                <a href="{{ route('carModelCreate', ['company' => 'BMW']) }}">
                    <div class="flex-none py-6 px-3 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/bmw.png') }}">
                            <p class="text-xl" id="Bmw">BMW</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('carModelCreate', ['company' => 'Volkswagen']) }}">
                    <div class="flex-none py-6 px-3 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/volkswagen.png') }}">
                            <p class="text-xl">Volkswagen</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('carModelCreate', ['company' => 'Honda']) }}">
                    <div class="flex-none py-6 px-3 first:pl-6 last:pr-6">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img class="w-14 h-14" src="{{ asset('images/honda.png') }}">
                            <p class="text-xl">Honda</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @isset($file)
            <form method="POST" action="{{ route('storeCar', ['company' => $company]) }}" enctype="multipart/form-data">
                @csrf
                <div class="max-w-8xl flex grow flex-wrap justify-center mx-auto">
                    <label for="models" class="text-3xl">MODEL :</label>
                    <select name="model" id="model"
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border focus:border-cyan-500 p-2">
                        <option {{ !isset($request['model']) ? 'selected' : '' }} disabled>Choose A Model</option>
                        @foreach ($file as $fil)
                            <option value="{{ $fil->model }}">{{ $fil->model }}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <label for="engine" class="ml-6 text-3xl">Engine :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Like 45000" type="text" name="engine" id="engine" value="{{ old('engine') }}">
                    <label for="year" class="ml-6 text-3xl">Year :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Like 1997" type="number" name="year" id="year" value="{{ old('year') }}">
                    <label for="mileage" class="ml-6 text-3xl">Mileage :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Like 45000" type="number" name="mileage" id="mileage" value="{{ old('mileage') }}">
                    <label for="fuel" class="text-3xl mt-10">Fuel Type :</label>
                    <select name="fuel" id="fuel"
                        class="bg-zinc-600 rounded-lg ml-6 mt-10 py-2 border h-9 w-44 focus:border-cyan-500 p-2">
                        <option selected disabled>Choose A Type</option>
                        <option value="Petrol" @selected(old('fuel') == 'Petrol')>Petrol</option>
                        <option value="Electric" @selected(old('fuel') == 'Electric')>Electric</option>
                        <option value="Plug In Hybrid" @selected(old('fuel') == 'Plug In Hybrid')>Plug In Hybrid</option>
                    </select>
                    <label for="fuel" class="ml-6 text-3xl mt-10">Gearbox :</label>
                    <select name="gearbox" id="gearbox"
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 mt-10">
                        <option selected disabled>Choose A Type</option>
                        <option value="Automatic" @selected(old('fuel') == 'Automatic')>Automatic</option>
                        <option value="Manual" @selected(old('fuel') == 'Manual')>Manual</option>
                    </select>
                    <label for="location" class="ml-6 text-3xl mt-10">Location :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Texas/Austin" type="text" name="location" id="location"
                        value="{{ old('location') }}">
                    <label for="color" class="text-3xl mt-10 ml-6">Color :</label>
                    <select name="color" id="color"
                        class="bg-zinc-600 rounded-lg ml-6 mt-10 py-2 border h-9 w-40 focus:border-cyan-500 p-2">
                        <option selected disabled>Choose A Color</option>
                        <option value="Red" @selected(old('fuel') == 'Red')>Red</option>
                        <option value="Blue" @selected(old('fuel') == 'Blue')>Blue</option>
                        <option value="Black" @selected(old('fuel') == 'Black')>Black</option>
                        <option value="White" @selected(old('fuel') == 'White')>White</option>
                        <option value="Green" @selected(old('fuel') == 'Green')>Green</option>
                        <option value="Yellow" @selected(old('fuel') == 'Yellow')>Yellow</option>
                        <option value="Orange" @selected(old('fuel') == 'Orange')>Orange</option>
                    </select>
                    <label for="price" class="text-3xl mt-10">Price :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="47000" type="text" name="price" id="price" value="{{ old('price') }}">
                    <label for="feauters" class="ml-6 text-3xl mt-10">Feauturs :</label>
                    <input
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-1/2 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder="Seprate Them With ," type="text" name="feauters" id="feauters"
                        value="{{ old('feauters') }}">
                </div>
                <div class="max-w-7xl mx-auto flex flex-nowrap inline-block">
                    <label for="description" class="text-3xl mt-10"> Desc :</label>
                    <textarea
                        class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-64 w-1/3 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        name="description" id="description" placeholder="Your Contact Info,ect..." value="{{ old('description') }}"></textarea>
                    <label for="dropzone-file"
                        class="items-center flex mx-auto justify-center text-center mt-10 w-1/2 h-64 border-2 border-cyan-500 border-dashed rounded-lg cursor-pointer bg-zinc-800 hover:bg-zinc-700">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" name="images[]" type="file" class="hidden" multiple />
                    </label>
                </div>
                <div>
                    <button
                        class="ml-10 text-sm mt-30 bg-green-600 text-gray-200 hover:bg-green-700 rounded-sm p-1 transition ease-in-out duration-150"
                        type="submit">Sell your
                        car</button>
                </div>

        </div>
    @endisset
    </div>
    </form>
</x-layout>
