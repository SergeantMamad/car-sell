<x-layout>
    @include('components.navbar', ['page' => 'usermanage'])
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
            <div class="bg-zinc-800 mt-5 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex-initial">
                    @unless (count($users) == 0)
                        <table class="w-full align-center border-separate border-spacing-y-3">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Role</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tbody class="hover:bg-zinc-700">
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->phone }}</th>
                                    <th class="capitalize">{{ $user->getrolenames()->first() }}</th>
                                    <th><a href="{{ route('editUser', ['id' => $user->id]) }}"
                                            class="p-2 text-green-600 rounded-full">Edit</a>
                                        @if (!$user->hasrole('admin'))
                                            <a href="{{ route('deleteUser', ['id' => $user->id]) }}"
                                                class="ml-5 p-2 text-red-600">Delete</a>
                                    </th>
                            @endif
                            </tbody>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center w-full">You have no model</p>
                    @endempty
                </div>
            </div>

        </div>
    </div>
</x-layout>
