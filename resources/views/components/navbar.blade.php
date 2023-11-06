@props(['page'])
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
<div class="float-left h-screen w-[250px] text-white text-sm bg-zinc-900 flex-nowrap">
    <div>
        <img src="{{ asset('images/formula.png') }}" class="w-24 h-24 mx-auto mt-2.5">
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='main'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('dashboard')}}" class="m-6 rounded-full ">Dashboard</a>
    </div>
    <div>
        <p class="mt-2"><hr></p>
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='manageads'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('manageAds')}}" class="m-6 rounded-full mt-6">Manage Ads</a>
    </div>
    <div>
        <p class="mt-1"><hr></p>
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='create'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('modelCreate')}}" class="m-6 rounded-full ">Create Model</a>
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='modelmanage'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('manageModels')}}" class="m-6 rounded-full ">Manage Models</a>
    </div>
    <div>
        <p class="mt-1"><hr></p>
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='createuser'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('createUser')}}" class="m-6 rounded-full ">Create User</a>
    </div>
    <div class="w-3/4 ml-8 p-1 rounded-sm @php if($page=='usermanage'){
        echo ('active: bg-zinc-800');
    } @endphp">
        <a href="{{route('manageUsers')}}" class="m-6 rounded-full ">Manage Users</a>
    </div>
</div>
