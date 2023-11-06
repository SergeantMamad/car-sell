<x-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <div class="text-white bg-zinc-800 drop-shadow-2xl flex rounded-lg max-h-min w-3/4 mx-auto mt-auto justify-center">
        <div class="p-10 mb-auto flex flex-wrap">
            <div id="carouselExample"
                class="carousel slide ml-20 rounded-xl h-[400px] w-[600px] bg-black shadow-2xl flex">
                <div class="carousel-inner">
                    @empty($car->images[0]->image)
                        <div class="carousel-item h-[400px] w-[600px] active">
                            <img src="/images/default.jpg" class="object-cover h-full rounded-xl mx-auto" alt="...">
                        </div>
                    @endempty
                    @foreach ($car->images as $key => $image)
                        @if ($key == 0)
                            <div class="carousel-item h-[400px] w-[600px] active">
                                <img src="/carsImage/{{ $image->image }}"
                                    class="d-block w-100 h-100 object-fit-contain rounded-xl" alt="...">
                            </div>
                        @else
                            <div class="carousel-item h-[400px] w-[600px] flex flex-wrap">
                                <img src="/carsImage/{{ $image->image }}"
                                    class="d-block w-100 h-100 object-fit-contain rounded-xl" alt="...">
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="ml-20 rounded-xl text-center text-3xl w-[600px] grow-0 flex-row">
                {{ $car->year }} {{ $car->company }} {{ $car->model }}
                <div class="flex-row flex mt-10 flex-initial text-lg text-center items-center max-w-sm">
                    <div class="text-left flex-nowrap flex shrink-0 grow-0 w-[230px]"><svg
                            class="w-5 h-5 flex inline w-max float-left mt-0.5" fill="#ffffff" height="200px"
                            width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 479 479" xml:space="preserve">
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
                        </svg><span class="ml-2">{{ $car->mileage }} Miles</span>
                    </div>
                    <div class="shrink-0 grow-0 w-[230px]">
                        <svg class="w-5 h-5 flex inline w-max float-left" fill="#ffffff" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 295.238 295.238" xml:space="preserve" stroke="#ffffff">
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
                                            <rect x="190.476" y="252.381" width="23.81" height="9.524"></rect>
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
                        <p class="flex inline ml-8 text-lg">{{ $car->engine }}</p>
                    </div>
                    <div class="w-[250px]">
                        <svg fill="#ffffff" class="w-5 h-5 flex inline w-max float-left" width="100px" height="100px"
                            viewBox="-5.99 0 122.88 122.88" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            style="enable-background:new 0 0 110.9 122.88" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path
                                        d="M99.06,20.2c0.27,0.13,0.51,0.3,0.74,0.52c0.06,0.06,0.11,0.12,0.16,0.18c2.89,2.29,5.78,4.88,7.88,8 c2.32,3.45,3.61,7.44,2.83,12.17c-0.33,1.98-1.08,3.71-2.22,5.24c-0.82,1.09-1.82,2.05-3,2.89c-0.06,1.53-0.08,3.03-0.08,4.52 c0.01,1.91,0.07,3.88,0.18,5.9c0.25,4.74,0.96,9.52,1.67,14.26c0.76,5.1,1.52,10.16,1.72,15.43c0.27,6.75-0.53,12.3-2.76,16.22 c-2.48,4.38-6.51,6.72-12.45,6.51v0c-7.09-0.13-11.45-4.11-13.42-11.46c-1.72-6.43-1.46-15.61,0.49-27.16 c-0.06-9.15-1.25-16.08-3.61-20.75c-1.54-3.05-3.63-5.07-6.27-6.03v59.91c0.86,0.41,1.64,0.97,2.3,1.64 c1.52,1.52,2.47,3.63,2.47,5.95v5.98c0,1.51-1.23,2.74-2.74,2.74H2.74c-1.51,0-2.74-1.23-2.74-2.74v-5.98 c0-2.32,0.95-4.42,2.47-5.95c0.47-0.47,1-0.89,1.57-1.24V14.52c0-4,1.63-7.63,4.26-10.26C10.93,1.63,14.56,0,18.56,0h37.78 C60.35,0,64,1.64,66.64,4.28c2.64,2.64,4.28,6.29,4.28,10.31v26.36c4.86,1.06,8.57,4.17,11.15,9.27 c2.77,5.47,4.15,13.31,4.19,23.46c0,0.16-0.01,0.32-0.04,0.47l0.01,0c-1.85,10.87-2.15,19.35-0.63,25.02 c1.27,4.77,3.95,7.35,8.24,7.41l0.05,0v0c3.66,0.12,6.09-1.22,7.52-3.75c1.69-2.98,2.28-7.55,2.05-13.31 c-0.19-4.88-0.94-9.85-1.68-14.85c-0.72-4.82-1.44-9.68-1.71-14.78c-0.11-2.01-0.17-4.06-0.18-6.18c-0.01-1.68,0.02-3.34,0.09-4.97 c-5.11-4.48-8.22-8.96-9.18-13.42c-0.91-4.23,0.05-8.29,3-12.17c-2.25-1.54-4.54-2.8-6.86-3.81c-3.17-1.38-6.43-2.31-9.75-2.85 c-1.49-0.24-2.5-1.65-2.26-3.14c0.24-1.49,1.65-2.5,3.14-2.26c3.76,0.61,7.45,1.66,11.06,3.23C92.54,15.82,95.85,17.75,99.06,20.2 L99.06,20.2z M65.44,44.23c-0.12-0.34-0.18-0.7-0.15-1.08c0.02-0.27,0.07-0.52,0.15-0.76v-27.8c0-2.5-1.03-4.78-2.68-6.43 c-1.65-1.65-3.93-2.68-6.43-2.68H18.56c-2.48,0-4.74,1.02-6.38,2.66c-1.64,1.64-2.66,3.9-2.66,6.38v91.22h55.92V44.23L65.44,44.23z M68.42,111.46c-0.08,0.01-0.15,0.01-0.23,0.01H7.26c-0.34,0.15-0.65,0.36-0.91,0.62c-0.53,0.53-0.86,1.26-0.86,2.07v3.24h64.73 v-3.24c0-0.8-0.33-1.53-0.86-2.07C69.09,111.82,68.77,111.61,68.42,111.46L68.42,111.46z M23.04,13.74h29.44 c1.53,0,2.92,0.62,3.92,1.63c0.07,0.07,0.14,0.14,0.2,0.22c0.89,0.99,1.43,2.29,1.43,3.7v18.78c0,1.53-0.62,2.92-1.63,3.92 c-1,1-2.39,1.63-3.92,1.63H23.04c-1.52,0-2.9-0.63-3.91-1.63l-0.01,0.01c-1-1-1.63-2.39-1.63-3.92V19.29 c0-1.53,0.62-2.92,1.63-3.92c0.07-0.07,0.14-0.14,0.22-0.2C20.33,14.28,21.63,13.74,23.04,13.74L23.04,13.74z M52.48,19.22H23.04 c-0.01,0-0.02,0-0.02,0L23,19.24c-0.01,0.01-0.02,0.03-0.02,0.04v18.78c0,0.01,0.01,0.03,0.02,0.04L23,38.12L23,38.12 c0.01,0.01,0.02,0.01,0.04,0.01h29.44c0.01,0,0.03-0.01,0.04-0.02c0.01-0.01,0.02-0.03,0.02-0.04V19.29c0-0.01,0-0.02,0-0.02 l-0.02-0.02C52.51,19.23,52.5,19.22,52.48,19.22L52.48,19.22z M98.15,26.5c-1.91,2.56-2.55,5.12-1.99,7.7 c0.67,3.12,3,6.44,6.88,9.95c0.39-0.35,0.74-0.72,1.03-1.11c0.61-0.81,1.02-1.76,1.19-2.84c0.52-3.16-0.37-5.87-1.97-8.25 C101.97,29.97,100.13,28.16,98.15,26.5L98.15,26.5z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="flex inline ml-8 text-lg">{{ $car->fuel }}</p>
                    </div>

                    <div class="absolute flex-row flex mt-28 text-lg">
                        <div class="text-left flex-nowrap flex shrink-0 grow-0 w-[230px]"><svg fill="#ffffff"
                                class="w-5 h-5 flex inline w-max float-left" height="100px" width="100px"
                                version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64"
                                enable-background="new 0 0 64 64" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path id="Gear-box_1_"
                                        d="M51.4560013,58.9450493C50.7681007,58.29245,49.9188995,57.8595505,49,57.6498489v-3.8351974 c0-3.4819031-2.7382927-6.3149033-6.1035004-6.3149033H42v-3.6855965c0-1.6836014-0.6397018-3.2656021-1.8008003-4.4546013 c-0.8711014-0.8951988-1.9980011-1.4995003-3.2020988-1.7409019L35.0237045,15.91185 c2.9298935-1.1890001,5.0035934-4.0606003,5.0035934-7.4116001c0-4.4112-3.5887985-8-7.9999962-8 c-4.4111023,0-8.0000019,3.5888-8.0000019,8c0,3.3509998,2.073801,6.2226,5.0037003,7.4116001l-1.9724007,21.6982002 c-1.2250996,0.2338982-2.3736,0.8403015-3.2577991,1.7486C22.6396008,40.5490494,22,42.1315498,22,43.8141518v3.6855965h-0.8964996 c-3.3652,0-6.1035004,2.8330002-6.1035004,6.3149033v3.8354988c-0.9189997,0.2094002-1.7685995,0.642498-2.4569998,1.2958984 c-0.9804993,0.9326019-1.5429993,2.2280006-1.5429993,3.5536995l1,1h40l1-1C53,61.1740494,52.4375,59.8786507,51.4560013,58.9450493 z M26.0272999,8.5002499c0-3.3085999,2.6914062-6,6.0000019-6s5.9999962,2.6913998,5.9999962,6 c0,3.3080997-2.6913986,5.9990005-5.9999962,5.9990005S26.0272999,11.8083496,26.0272999,8.5002499z M32.0273018,16.4992504 c0.3512993,0,0.6948967-0.0305004,1.0341988-0.0747013l1.8710976,20.5751991h-5.8104973l1.8710995-20.5751991 C31.3325005,16.46875,31.6760006,16.4992504,32.0273018,16.4992504z M24,43.8141518 c0-1.1411018,0.4491997-2.2563019,1.2334003-3.0596008c0.7880993-0.8090019,1.8339996-1.2548027,2.9453049-1.2548027h7.6425953 c1.1112976,0,2.1571999,0.4453011,2.9453011,1.2558022C39.5508003,41.5578499,40,42.6730499,40,43.8141518v3.6855965H24V43.8141518z M17,53.8146515c0-2.3794022,1.8408012-4.3149033,4.1035004-4.3149033H23h18h1.8964996 C45.1591988,49.4997482,47,51.4352493,47,53.8146515v3.6850967H17V53.8146515z M13.1816006,61.4997482 c0.1553001-0.4096985,0.4042997-0.7856979,0.7392998-1.1035995c0.6006002-0.5697975,1.4345999-0.8964005,2.2889996-0.8964005 h31.580101c0.8544998,0,1.6884995,0.3266029,2.2880974,0.8955002c0.3350029,0.3183022,0.5850029,0.6948013,0.7402,1.1044998 H13.1816006z">
                                    </path>
                                </g>
                            </svg><span class="ml-2">{{ $car->gearbox }}</span>
                        </div>
                        <div class="text-left flex-wrap flex shrink-0 grow-0 w-[230px]">
                            <div class="rounded-full h-5 w-5 mt-0.5 flex inline float-left"
                                style="background-color: {{ $car->color }}"></div>
                            <p class="ml-3 uppercase">{{ $car->color }}</p>
                        </div>
                        <div class="w-[250px] flex-initial flex-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 flex inline w-max float-left">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <p class="flex inline ml-8 text-lg">{{ $car->location }}</p>
                        </div>


                    </div>
                    @isset($number->phone)
                        <div class="absolute flex-row flex mt-52 text-lg">
                            <div class="w-[250px] flex-initial flex-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 flex inline w-max float-left">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>

                                <p class="flex inline ml-8 text-lg">{{ $number->phone }}</p>

                            </div>
                        </div>
                    @endisset
                    @if ($car->feauters != null)
                        <div class="absolute container flex-wrap max-w-xl flex  max-h-max items-left mt-80 text-lg">
                            <x-features :features='$car->feauters'></x-features>
                        </div>

                </div>
                @endif
                @if ($car->feauters == null)
                    <div class="absolute container flex-wrap max-w-xl flex items-left mt-80 text-2xl">
                        More Description:{{ $car->description }}
                    </div>
                @endif

            </div>
            @if ($car->feauters != null)
                <div class="relative flex mt-10 ml-20 max-h-max text-2xl">
                    More Description:{{ $car->description }}
                </div>
            @endif
        </div>

    </div>
</x-layout>
