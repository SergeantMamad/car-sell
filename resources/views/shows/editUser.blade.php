<x-layout>
    @include('components.navbar', ['page' => 'createuser'])
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
        <li class="flex text-xs mb-10 text-white">"Don't put something if you dont want to update pass"</li>
        <form method="POST" action="{{ route('updateUser', ['id' => $user->id]) }}">
            @csrf
            @method('put')
            <div class="flex flex-row text-white text-lg">
                <label for="name" class="ml-10">Name:</label>
                <input type="text" name="name" id="name"
                    class="bg-zinc-600 rounded-lg py-2 border ml-2 h-8 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    value="{{ $user->name }}">
                <label class="ml-10" for="name">Email:</label>
                <input name="email" id="email" type="text"
                    class="bg-zinc-600 rounded-lg py-2 border ml-2 h-8 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    value="{{ $user->email }}">
                <label class="ml-10" for="name">Phone:</label>
                <input name="phone" id="phone" type="text"
                    class="bg-zinc-600 rounded-lg py-2 border ml-2 h-8 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    value="{{ $user->phone }}">
                <label class="ml-10" for="name">Password:</label>
                <input name="password" id="password" type="text"
                    class="bg-zinc-600 rounded-lg py-2 border ml-2 h-8 w-44 focus:border-cyan-500 p-2 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                <label class="ml-10" for="name">Role:</label>
                <select name="role" id="role"
                    class="bg-zinc-600 rounded-lg ml-2 border h-8 w-44 focus:border-cyan-500 p-2">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mt-10 flex mx-auto text-white text-sm">
                <button type="submit"
                    class="ml-10 text-sm mt-30 bg-green-600 text-gray-200 hover:bg-green-700 rounded-sm p-1 transition ease-in-out duration-150">Update
                    User</button>
            </div>
        </form>
    </div>
</x-layout>
