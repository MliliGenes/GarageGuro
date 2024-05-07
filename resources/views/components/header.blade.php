<header class="min-h-14 bg-slate-800 max-h-screen flex">
    <div class="text-center w-80 flex justify-center items-center">
        <h1 class="uppercase font-medium text-2xl text-slate-200">Garage<span class="text-slate-400 font-light italic">Guro</span></h1>
    </div>
    <div class="flex-auto flex items-center justify-end px-6">
        <span class="text-slate-200 text-md font-normal uppercase ">{{auth()->user()->firstName}} {{auth()->user()->lastName }}</span>
    </div>
    <a href="{{route('logout')}}" class="text-slate-200 text-md font-normal uppercase px-6 flex items-center bg-slate-700">Logout</a>
</header>
