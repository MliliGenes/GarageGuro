<header class="min-h-12 bg-gray-800 max-h-screen flex">
    <div class="text-center w-80 flex justify-center items-center">
        <h1 class="uppercase font-medium text-2xl text-gray-200">Garage<span class="text-gray-400 font-light italic">Guro</span></h1>
    </div>

    <div class="flex-auto flex items-center justify-end px-6 gap-4">

        <span class="text-gray-200 text-md font-normal uppercase">{{ auth()->user()->firstName }} {{ auth()->user()->lastName }} ( {{ auth()->user()->role === "ADMIN" ? __('actions.admin') : (auth()->user()->role === "CLIENT" ? __('actions.client') : __('actions.mechanic')) }} )</span>
      </div>
      <ul class="divide-x text-white uppercase text-xs flex h-12 items-center bg-gray-600">
        @foreach (config('app.available_locales') as $lang => $locale)
            <li class="px-6">
                <a href="{{ route('locale.switch', $locale) }}">{{ $lang }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{route('logout')}}" class="text-gray-200 text-md font-normal uppercase px-6 flex items-center bg-gray-700 w-32 justify-center">{{ __('auth.Logout') }}</a>
</header>
