@if (!isset($searchreq))
    {{ $searchreq = '' }}
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#error').delay(3000).fadeOut(300);
    });
</script>
<x-layout>
    @if (session()->has('error'))
        <div class="z-10 right-5 w-72 rounded align-center p-8 mx-auto text-white bg-red-500 fixed" id="error">
            {{ session('error') }}
        </div>
    @endif
    <div class="relative">
        <img src="{{ asset('images/2024-Alfa-Romeo-33-Stradale-005-1440w.png') }}" class="blur-sm grayscale">
        <div class="absolute max-w-5xl left-4 top-8 inset-x-0 leading-9">
            <p class="text-white text-5xl">Find Out</p>
            <p class="text-white text-5xl mt-5">Your Dream Car</p>
        </div>
        <div class="absolute max-w-2xl top-8 inset-x-0 leading-9 ml-auto">
            <form method="GET" action="{{ route('searchCompany') }}">
                <select
                    class="w-28 h-10 text-lg text-center appearance-none border-2 rounded-l-lg text-white bg-neutral-800 border-white"
                    name="company" id="company">
                    <option value="BMW">BMW</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Honda">Honda</option>
                </select>
                <input type="text" name="model" id="model" value="{{ $searchreq }}"
                    class="-ml-1.5 w-38 h-10 text-lg border-y-2 text-white bg-neutral-800 border-white focus:outline-none p-2">
                <div>
                    <button type="submit"
                        class="absolute w-10 h-10 m-[375px] bg-neutral-800 -mt-10 border-y-2 border-white border-r-2 rounded-r-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>
            </form>
            <a href="/">
                <div
                    class="absolute w-[415px] top-14 inset-x-0 leading-9 text-center text-white bg-neutral-800 text-sm p-0.5 font-bold rounded-lg hover:bg-neutral-950 transition ease-in-out duration-150">
                    All Ads
                </div>
            </a>
        </div>
        <a href="/">

        </a>
    </div>
    <div class="max-w-4xl max-h-fit mt-20 mx-auto">
        @unless (count($cars) == 0)
            @foreach ($cars as $car)
                <a href="/show/{{ $car->id }}">
                    <div class="shadow-2xl ml-auto bg-zinc-800 py-8 relative">
                        <div class="absolute top-2 right-6 text-white w-2/4 w-3xl">
                            <p class="float-right">
                                @if ($car->mileage >= 200)
                                    Used
                                @else
                                    New
                                @endif
                            </p>
                            <p class="text-white float-left ml-5">{{ $car->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="max-w-fit flex max-h-max grow-0 shrink-0">
                            <div class="ml-9 flex w-[384px] h-[214px] justify-center bg-black">
                                @empty($car->images[0]->image)
                                    <img src="{{ asset('images/default.jpg') }}" class="shadow-sm max-w-sm">
                                @else
                                    <img src="/carsImage/{{ $car->images[0]->image }}" class="max-w-sm shadow-sm max-w-sm">
                                @endempty
                            </div>
                            <div class="float-right text-white max-h-[150px] w-screen">
                                <p class="text-3xl text-center mt-6">{{ $car->company }} {{ $car->model }}</p>
                                <div class="ml-6 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 flex inline w-max float-left mt-0.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="flex inline ml-7 text-lg">${{ $car->price }}</p>
                                    <svg class="w-5 h-5 flex inline w-max float-left mt-0.5" fill="#ffffff" height="200px"
                                        width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 479 479"
                                        xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path
                                                    d="M263.5,232c-4.142,0-7.5,3.358-7.5,7.5c0,9.098-7.402,16.5-16.5,16.5s-16.5-7.402-16.5-16.5s7.402-16.5,16.5-16.5 c4.142,0,7.5-3.358,7.5-7.5s-3.358-7.5-7.5-7.5c-5.972,0-11.561,1.67-16.325,4.569l-90.372-90.372 c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.677,0,10.606l90.372,90.372C209.671,227.939,208,233.528,208,239.5 c0,17.369,14.131,31.5,31.5,31.5s31.5-14.131,31.5-31.5C271,235.358,267.642,232,263.5,232z">
                                                </path>
                                                <path
                                                    d="M408.852,70.148C363.616,24.912,303.473,0,239.5,0S115.384,24.912,70.148,70.148C24.913,115.384,0,175.527,0,239.5 s24.913,124.116,70.148,169.352C115.384,454.088,175.527,479,239.5,479s124.116-24.912,169.352-70.148 C454.087,363.616,479,303.473,479,239.5S454.087,115.384,408.852,70.148z M398.246,398.245C355.843,440.648,299.466,464,239.5,464 s-116.343-23.352-158.746-65.755c-12.257-12.256-22.91-25.687-31.88-40.027l21.17-12.223c3.587-2.071,4.816-6.658,2.745-10.245 c-2.071-3.588-6.658-4.816-10.245-2.745l-21.202,12.241c-16.06-30.002-25.071-63.44-26.206-98.246H39.5c4.142,0,7.5-3.358,7.5-7.5 s-3.358-7.5-7.5-7.5H15.137c1.135-34.806,10.146-68.243,26.206-98.246l21.202,12.241c1.181,0.682,2.471,1.006,3.743,1.006 c2.592,0,5.113-1.345,6.502-3.751c2.071-3.587,0.842-8.174-2.745-10.245l-21.17-12.223c8.969-14.341,19.623-27.771,31.88-40.027 c12.257-12.257,25.687-22.911,40.028-31.88l12.223,21.17c1.389,2.406,3.91,3.751,6.502,3.751c1.272,0,2.562-0.324,3.743-1.006 c3.587-2.071,4.816-6.658,2.745-10.245l-12.241-21.202c30.002-16.06,63.44-25.071,98.246-26.206V39.5c0,4.142,3.358,7.5,7.5,7.5 s7.5-3.358,7.5-7.5V15.137c34.806,1.135,68.243,10.146,98.246,26.206l-12.241,21.202c-2.071,3.587-0.842,8.174,2.745,10.245 c1.181,0.682,2.471,1.006,3.743,1.006c2.592,0,5.113-1.345,6.502-3.751l12.222-21.17c14.341,8.969,27.771,19.623,40.028,31.88 c12.257,12.256,22.91,25.687,31.88,40.027l-21.17,12.223c-3.587,2.071-4.816,6.658-2.745,10.245 c1.389,2.406,3.91,3.751,6.502,3.751c1.272,0,2.562-0.324,3.743-1.006l21.202-12.241c16.06,30.002,25.071,63.44,26.206,98.246 H439.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h24.363c-1.135,34.806-10.146,68.243-26.206,98.246l-21.202-12.241 c-3.587-2.072-8.174-0.842-10.245,2.745c-2.071,3.587-0.842,8.174,2.745,10.245l21.17,12.223 C421.156,372.559,410.502,385.989,398.246,398.245z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="flex inline ml-7 text-lg">{{ $car->mileage }} miles</p>
                                    <svg class="w-5 h-5 flex inline w-max float-left mt-0.5" fill="#ffffff" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 295.238 295.238"
                                        xml:space="preserve" stroke="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M257.143,157.143h-14.286v-28.571H220.49l-28.571-19.048h-30.014V80.952H200v-9.524H85.714v9.524h38.095v28.571H93.476 l-33.333,28.571h-26.81v28.571H9.524V123.81H0v119.048h9.524v-38.095h23.81v38.095h27.305l33.333,19.048h53.648v-9.524H96.505 l-29.838-17.048v-90.286l30.333-26h92.033l25.252,16.833v16.5h9.524v-14.286h9.524v114.286h-9.524v9.524h19.048v-23.81h14.286 v9.524h38.095V142.857h-38.095V157.143z M33.334,195.238H9.524V176.19h23.81V195.238z M57.143,233.333H42.857v-85.714h14.286 V233.333z M152.381,109.523h-19.048V80.952h19.048V109.523z M257.143,228.571h-14.286v-61.905h14.286V228.571z M266.667,152.381 h19.048v85.714h-19.048V152.381z">
                                                        </path>
                                                        <path
                                                            d="M192.448,176.19h-35.576l23.81-33.333h-45.533L106.576,200h29.962l-12.833,44.933L192.448,176.19z M121.99,190.476 l19.048-38.095h21.133l-23.81,33.333h31.09l-26.495,26.495l6.214-21.733H121.99z">
                                                        </path>
                                                        <rect x="38.095" y="28.571" width="28.571" height="9.524"></rect>
                                                        <rect y="28.571" width="28.571" height="9.524"></rect>
                                                        <rect x="28.571" y="38.095" width="9.524" height="28.571"></rect>
                                                        <rect x="28.571" y="0" width="9.524" height="28.571"></rect>
                                                        <polygon
                                                            points="276.191,71.429 276.191,52.381 266.667,52.381 266.667,71.429 276.19,71.429 276.19,80.952 266.667,80.952 266.667,71.429 247.619,71.429 247.619,80.953 266.667,80.953 266.667,100 276.191,100 276.191,80.953 295.238,80.953 295.238,71.429 ">
                                                        </polygon>
                                                        <rect x="190.476" y="252.381" width="23.81" height="9.524">
                                                        </rect>
                                                        <polygon
                                                            points="180.953,252.381 190.476,252.381 190.476,228.571 180.952,228.571 180.952,252.381 157.143,252.381 157.143,261.905 180.952,261.905 180.952,285.715 190.476,285.715 190.476,261.905 180.953,261.905 ">
                                                        </polygon>
                                                        <polygon
                                                            points="285.714,266.667 276.19,266.667 276.19,276.19 266.667,276.19 266.667,285.714 276.19,285.714 276.19,295.238 285.714,295.238 285.714,285.714 276.191,285.714 276.191,276.191 285.714,276.191 285.714,285.714 295.238,285.714 295.238,276.19 285.714,276.19 ">
                                                        </polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="flex inline ml-7 text-lg">{{ $car->engine }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 flex inline w-max float-left">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <p class="flex inline ml-7 text-lg">{{ $car->location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <br>
            @endforeach
        @else
            <div class="text-white text-5xl">
                <p>There is currently no car</p>
            </div>
        @endunless
        {{ $cars->links() }}
    </div>
</x-layout>
