
<aside class="min-w-80 bg-slate-700  py-2 px-3 divide-y divide-slate-500  overflow-y-auto h-screen">
    @if(auth()->user()->role == 'ADMIN')
        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200 text-2xl mb-1 flex justify-between items-center px-2">Dashboard <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200   text-lg "><a href="{{route("dashboard.stats")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-chart-simple text-slate-800 min-w-5"></i> Statistics </a></li>

        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200  text-2xl mb-1 flex justify-between items-center px-2">Clients <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200   text-lg "><a href="{{route("dashboard.clients")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-people-group text-slate-800 min-w-5"></i> Clients List</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("dashboard.clients.add")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-person-circle-plus text-slate-800 min-w-5"></i> Add Client</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("import.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-slate-800 min-w-5"></i> Import Clients</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("export.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-slate-800 min-w-5"></i> Export Clients</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200  text-2xl mb-1 flex justify-between items-center px-2">Mechanicians <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200   text-lg "><a href="{{route("mechanicians")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-users-gear text-slate-800 min-w-5"></i> Mechanicians List</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("dashboard.mechanicians.add")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-person-circle-plus text-slate-800 min-w-5"></i> Add Mechanician</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("import.mechanic.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-slate-800 min-w-5"></i> Import Mechanicians</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("export.mechanic.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-slate-800 min-w-5"></i> Export Mechanicians</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200  text-2xl mb-1 flex justify-between items-center px-2">Vehicles <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200   text-lg "><a href="{{route("getAllVecles")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-car text-slate-800 min-w-5"></i> Vehicles List</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("dashboard.vehicles.add")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-slate-800 min-w-5"></i> Add Vehicle</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("import.vehicles.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-up text-slate-800 min-w-5"></i> Import Vehicles</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("export.vehicles.get")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-file-arrow-down text-slate-800 min-w-5"></i> Export Vehicles</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200  text-2xl mb-1 flex justify-between items-center px-2">Parts <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200   text-lg "><a href="{{route("spareparts.index")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-car text-slate-800 min-w-5"></i> Parts List</a></li>
            <li class="text-slate-200   text-lg "><a href="{{route("spareparts.create")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-slate-800 min-w-5"></i> Add Vehicle</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200 text-2xl mb-1 flex justify-between items-center px-2">Réparations <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200 text-lg"><a href="{{ route('reparations.index') }}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-wrench text-slate-800 min-w-5"></i> Réparations List</a></li>
            <li class="text-slate-200 text-lg"><a href="{{ route('reparations.create') }}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-square-plus text-slate-800 min-w-5"></i> Add Réparation</a></li>
        </ul>

        <ul class="flex flex-col gap-2 py-3 px-3">
            <span class="text-slate-200 text-2xl mb-1 flex justify-between items-center px-2">Factures <i class="fa-solid fa-chevron-down text-sm"></i></span>
            <li class="text-slate-200 text-lg">
                <a href="{{ route('factures.index') }}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center">
                    <i class="fa-solid fa-file-invoice text-slate-800 min-w-5"></i> Factures List
                </a>
            </li>
            <li class="text-slate-200 text-lg">
                <a href="{{ route('factures.create') }}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center">
                    <i class="fa-solid fa-square-plus text-slate-800 min-w-5"></i> Add Facture
                </a>
            </li>
        </ul>
    @endif

    @if (Auth::user()->role == "CLIENT")

    <ul class="flex flex-col gap-2 py-3 px-3">
        <span class="text-slate-200 text-2xl mb-1 flex justify-between items-center px-2">Profile <i class="fa-solid fa-chevron-down text-sm"></i></span>
        <li class="text-slate-200   text-lg "><a href="{{route("client.info")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-circle-info text-slate-800 min-w-5"></i> Client information </a></li>
        <li class="text-slate-200   text-lg "><a href="{{route("client.vehicles")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-car text-slate-800 min-w-5"></i> Client vehicles </a></li>
        <li class="text-slate-200   text-lg "><a href="{{route("client.reparations")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid fa-wrench text-slate-800 min-w-5"></i> Client Reparations </a></li>
        <li class="text-slate-200   text-lg "><a href="{{route("client.invoices")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-file-invoice text-slate-800 min-w-5"></i> Client Invoices </a></li>
    </ul>

    @endif
    @if (Auth::user()->role == "MECHANIC")

    <ul class="flex flex-col gap-2 py-3 px-3">
        <span class="text-slate-200 text-2xl mb-1 flex justify-between items-center px-2">Profile <i class="fa-solid fa-chevron-down text-sm"></i></span>
        <li class="text-slate-200   text-lg "><a href="{{route("mechanic.info")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-circle-info text-slate-800 min-w-5"></i> Mechanic information </a></li>
        <li class="text-slate-200   text-lg "><a href="{{route("mechanic.repairs")}}" class="shadow-md py-1 px-3 bg-slate-500 rounded flex gap-3 items-center"><i class="fa-solid  fa-wrench text-slate-800 min-w-5"></i> Mechanic reparations </a></li>
    </ul>

    @endif
</aside>
