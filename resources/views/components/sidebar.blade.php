
<aside class="min-w-80 bg-gray-700  py-2 px-3 divide-y divide-gray-500  overflow-y-auto h-screen">
    @if(auth()->user()->role == 'ADMIN')
        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200 text-2xl  flex justify-between items-center px-2">{{ __("sidebar.dashboard")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200   text-lg "><a href="{{route("dashboard.stats")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-chart-simple text-gray-800 min-w-5"></i> {{ __("sidebar.dashboard")}} </a></li>

        </ul>

        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200  text-2xl  flex justify-between items-center px-2">{{ __("sidebar.clients")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200   text-lg "><a href="{{route("dashboard.clients")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-people-group text-gray-800 min-w-5"></i> {{ __("sidebar.client_list")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("dashboard.clients.add")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-person-circle-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_client")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("import.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-gray-800 min-w-5"></i> {{ __("sidebar.import_clients")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("export.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-gray-800 min-w-5"></i> {{ __("sidebar.export_clients")}}</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200  text-2xl  flex justify-between items-center px-2">{{ __("sidebar.mechanicians")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200   text-lg "><a href="{{route("mechanicians")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-users-gear text-gray-800 min-w-5"></i> {{ __("sidebar.mechanic_list")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("dashboard.mechanicians.add")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-person-circle-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_mechanic")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("import.mechanic.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-gray-800 min-w-5"></i> {{ __("sidebar.import_mechanics")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("export.mechanic.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-gray-800 min-w-5"></i> {{ __("sidebar.export_mechanics")}}</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200  text-2xl  flex justify-between items-center px-2">{{ __("sidebar.vehicles")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200   text-lg "><a href="{{route("getAllVecles")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-car text-gray-800 min-w-5"></i> {{ __("sidebar.vehicle_list")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("dashboard.vehicles.add")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_vehicle")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("import.vehicles.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-gray-800 min-w-5"></i> {{ __("sidebar.import_vehicles")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("export.vehicles.get")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-gray-800 min-w-5"></i> {{ __("sidebar.export_vehicles")}}</a></li>
        </ul>



        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200 text-2xl  flex justify-between items-center px-2">{{ __("sidebar.repairs")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200 text-lg"><a href="{{ route('reparations.index') }}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-wrench text-gray-800 min-w-5"></i> {{ __("sidebar.repairs_list")}}</a></li>
            <li class="text-gray-200 text-lg"><a href="{{ route('reparations.create') }}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_repair")}}</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200 text-2xl  flex justify-between items-center px-2">{{ __("sidebar.invoices")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200 text-lg">
                <a href="{{ route('factures.index') }}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center">
                    <i class="fa-solid fa-file-invoice text-gray-800 min-w-5"></i> {{ __("sidebar.invoices_list")}}
                </a>
            </li>
            <li class="text-gray-200 text-lg">
                <a href="{{ route('factures.create') }}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center">
                    <i class="fa-solid fa-square-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_invoice")}}
                </a>
            </li>
        </ul>


        <ul class="flex flex-col gap-2 py-2 px-3">
            <span class="text-gray-200  text-2xl  flex justify-between items-center px-2">{{ __("sidebar.parts")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-gray-200   text-lg "><a href="{{route("spareparts.index")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-car text-gray-800 min-w-5"></i> {{ __("sidebar.parts_list")}}</a></li>
            <li class="text-gray-200   text-lg "><a href="{{route("spareparts.create")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-gray-800 min-w-5"></i> {{ __("sidebar.add_part")}}</a></li>
        </ul>
    @endif

    @if (Auth::user()->role == "CLIENT")

    <ul class="flex flex-col gap-2 py-2 px-3">
        <span class="text-gray-200 text-2xl  flex justify-between items-center px-2">{{ __("sidebar.profile")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
        <li class="text-gray-200   text-lg "><a href="{{route("client.info")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-circle-info text-gray-800 min-w-5"></i> {{ __("sidebar.client_information")}} </a></li>
        <li class="text-gray-200   text-lg "><a href="{{route("client.vehicles")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-car text-gray-800 min-w-5"></i> {{ __("sidebar.client_vehicles")}} </a></li>
        <li class="text-gray-200   text-lg "><a href="{{route("client.reparations")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid fa-wrench text-gray-800 min-w-5"></i> {{ __("sidebar.client_reparations")}} </a></li>
        <li class="text-gray-200   text-lg "><a href="{{route("client.invoices")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-file-invoice text-gray-800 min-w-5"></i> {{ __("sidebar.client_invoices")}} </a></li>
    </ul>

    @endif
    @if (Auth::user()->role == "MECHANIC")

    <ul class="flex flex-col gap-2 py-2 px-3">
        <span class="text-gray-200 text-2xl  flex justify-between items-center px-2">{{ __("sidebar.profile")}} <i class="fa-solid fa-chevron-down text-sm"></i></span>
        <li class="text-gray-200   text-lg "><a href="{{route("mechanic.info")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-circle-info text-gray-800 min-w-5"></i> {{ __("sidebar.mechanic_information")}} </a></li>
        <li class="text-gray-200   text-lg "><a href="{{route("mechanic.repairs")}}" class="shadow-md py-1 px-3 bg-gray-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-wrench text-gray-800 min-w-5"></i> {{ __("sidebar.mechanic_repairs")}} </a></li>
    </ul>

    @endif
</aside>
