<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
</script>
    <!-- Styles -->


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');
    </style>



</head>

<body class="bg-gray-900" style="font-family: 'Comfortaa', sans-serif;">
    
    <div class="bg-zinc-900 fixed z-10 top-0 w-full">
    <div class="py-6 max-w-7xl mx-auto bg-zinc-900 flex flex-nowrap inline-block">
        <a href="/" class="text-decoration-none">
            <div class="flex inline ml-2">

                <img src="{{ asset('images/formula.png') }}" class="w-12 h-12 -mt-2.5">
                <p class="text-white ml-2 mt-0.5 text-lg hover:text-cyan-500 inline">CarSale</p>

            </div>
        </a>
        <div class="flex inline mt-0.5 ml-auto ml-2 ">
            <a href="{{ route('create') }}" class="text-decoration-none">
                <p
                    class="text-white text-lg hover:border-cyan-400 mr-6 p-1 -mt-1.5 border-2 rounded-full">
                    Sell Your Car<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white flex float-right mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> </p>
            </a>
            @if (Auth::check())
                <a href="{{route('logout')}}"><p class="text-white text-lg mr-6">Logout</p></a>
                <a href="{{route('dashboard')}}"><p class="text-white text-lg mr-6">Dashboard</p></a>
                <p class="text-white text-lg mr-6">Welcome <b>{{ Auth::User()->name }}</b></p>
            @else
                <a href="{{ route('register') }}" class="text-decoration-none">
                    <p class="text-white text-lg hover:text-cyan-400 mr-6 hover:text-cyan-500 inline">Register
                    </p>
                </a>
                <a href="{{ route('login') }}" class="text-decoration-none hover:text-cyan-400">
                    <p class="text-white text-lg hover:text-cyan-400">Login</p>
                </a>
            @endif
        </div>
    </div>
</div>
    <main class="mt-20">
        {{ $slot }}
    </main>
</body>

</html>
