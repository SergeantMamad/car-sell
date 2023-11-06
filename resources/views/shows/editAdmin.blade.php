<x-layout>
    <div
        class="text-white bg-zinc-800 mt-28 drop-shadow-2xl rounded-lg h-max-fit w-3/4 mx-auto items-center justify-center">
        <div>
            @foreach ($errors->all() as $error)
                <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
            @endforeach
        </div>
        <form method="POST" action="{{ route('update', ['id' => $car->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="max-w-8xl flex grow flex-wrap justify-center py-8 mx-auto">
                <label for="models" class="text-3xl">MODEL :</label>
                <select name="model" id="model"
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border focus:border-cyan-500 p-2">
                    <option disabled>Choose A Model</option>
                    @foreach ($carmodels as $carmodel)
                        <option value="{{ $carmodel->model }}">{{ $carmodel->model }}
                        </option>
                    @endforeach
                </select>
                <br>
                @error('model')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <label for="engine" class="ml-6 text-3xl">Engine :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="Like 45000" type="text" name="engine" id="engine" value="{{ $car->engine }}">
                <label for="year" class="ml-6 text-3xl">Year :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="Like 1997" type="number" name="year" id="year" value="{{ $car->year }}">
                <label for="mileage" class="ml-6 text-3xl">Mileage :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="Like 45000" type="number" name="mileage" id="mileage" value="{{ $car->mileage }}">
                <label for="fuel" class="text-3xl mt-10">Fuel Type :</label>
                <select name="fuel" id="fuel"
                    class="bg-zinc-600 rounded-lg ml-6 mt-10 py-2 border h-9 w-44 focus:border-cyan-500 p-2">
                    <option selected disabled>Choose A Type</option>
                    <option value="Petrol" @selected($car->fuel == 'Petrol')>Petrol</option>
                    <option value="Electric" @selected($car->fuel == 'Electric')>Electric</option>
                    <option value="Plug In Hybrid" @selected($car->fuel == 'Plug In Hybrid')>Plug In Hybrid</option>
                </select>
                <label for="fuel" class="ml-6 text-3xl mt-10">Gearbox :</label>
                <select name="gearbox" id="gearbox"
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border h-9 w-44 focus:border-cyan-500 p-2 mt-10">
                    <option selected disabled>Choose A Type</option>
                    <option value="Automatic" @selected($car->gearbox == 'Automatic')>Automatic</option>
                    <option value="Manual" @selected($car->gearbox == 'Manual')>Manual</option>
                </select>
                <label for="location" class="ml-6 text-3xl mt-10">Location :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="Texas/Austin" type="text" name="location" id="location"
                    value="{{ $car->location }}">
                <label for="color" class="text-3xl mt-10 ml-6">Color :</label>
                <select name="color" id="color"
                    class="bg-zinc-600 rounded-lg ml-6 mt-10 py-2 border h-9 w-40 focus:border-cyan-500 p-2">
                    <option selected disabled>Choose A Color</option>
                    <option value="Red" @selected($car->color == 'Red')>Red</option>
                    <option value="Blue" @selected($car->color == 'Blue')>Blue</option>
                    <option value="Black" @selected($car->color == 'Black')>Black</option>
                    <option value="White" @selected($car->color == 'White')>White</option>
                    <option value="Green" @selected($car->color == 'Green')>Green</option>
                    <option value="Yellow" @selected($car->color == 'Yellow')>Yellow</option>
                    <option value="Orange" @selected($car->color == 'Orange')>Orange</option>
                </select>
                <label for="price" class="text-3xl mt-10">Price :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="47000" type="text" name="price" id="price" value="{{ $car->price }}">
                <label for="feauters" class="ml-6 text-3xl mt-10">Feauturs :</label>
                <input
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-9 w-1/2 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    placeholder="Seprate Them With ," type="text" name="feauters" id="feauters"
                    value="{{ $car->feauters }}">
            </div>
            <div class="max-w-7xl mx-auto flex flex-nowrap inline-block">
                <label for="description" class="text-3xl mt-10"> Desc :</label>
                <textarea
                    class="bg-zinc-600 rounded-lg ml-6 py-2 border mt-10 h-64 w-1/3 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    name="description" id="description" placeholder="Your Contact Info,ect...">{{ $car->description }}</textarea>

                <a href="/dashboard/edit/pics/{{ $car->id }}"
                    class="items-center justify-center text-center ml-auto mt-10 w-1/2 h-64 border-2 border-cyan-500 border-dashed rounded-lg cursor-pointer hover:bg-gray-700"
                    href="/images/">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-xl text-gray-500 mt-24 dark:text-gray-400">Pics Manage</p>
                    </div>
                </a>
            </div>
            <div>

                <input value="{{ $car->company }}" id="company" name="company" hidden>
                <button
                    class="ml-10 text-sm mt-30 bg-green-600 text-gray-200 hover:bg-green-700 rounded-sm p-1 transition ease-in-out duration-150"
                    type="submit">Edit your car</button>
            </div>

    </div>
    </div>
    </form>
</x-layout>
