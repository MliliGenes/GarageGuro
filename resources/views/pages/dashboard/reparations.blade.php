@extends('pages.dashboard.layout')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<div>
    <!-- Search Bar -->

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reparations as $reparation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$reparation->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$reparation->description}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reparation->status}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reparation->startDate}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reparation->endDate}}
                    </td>
                    <td class="px-6 py-4 text-md">
                        <button class="remove-btn p-1" data-id="{{$reparation->id}}"><i class="fa-solid fa-trash text-red-600"></i></button>
                        <button class="update-btn p-1" data-id="{{$reparation->id}}"><i class="fa-solid fa-pen-to-square text-green-600"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->

<div id="delete-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center  md:inset-0 h-full bg-black bg-opacity-50">
    <div class="absolute top-1/2 left-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 bg-white shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirm Delete</h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-4 md:p-5 space-y-4">
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                Are you sure you want to delete this reparation?
            </p>
            <form class="flex justify-end space-x-4" action="{{ route('reparations.destroy') }}" method="post" id="delete-form">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="delete-id">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="confirm-delete-btn">
                    Confirm Delete
                </button>
                <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="delete-modal">
                    Cancel
                </button>
            </form>
        </div>
    </div>
</div>


    <!-- Update Modal -->
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:inset-0 h-full bg-black bg-opacity-50">
        <div class="absolute top-1/2 left-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 bg-white shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Update Reparation</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form class="space-y-4" action="{{ route('reparations.update', ['id' => '']) }}" method="post" id="update-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="update-id">
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <div class="mb-5">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
                            </div>

                            <div class="mb-5">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="Pending" id="pending">Pending</option>
                                    <option value="In Progress" id="in_progress">In Progress</option>
                                    <option value="Completed" id="completed">Completed</option>
                                    <option value="Cancelled" id="cancelled">Cancelled</option>
                                </select>
                            </div>

                            <div class="mb-5">
                                <label for="startDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                <input type="date" id="startDate" name="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>

                            <div class="mb-5">
                                <label for="endDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                                <input type="date" id="endDate" name="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                            </div>


                        </div>
                        <div class="flex-1">
                            <div class="mb-5">
                                <label for="mechanicNotes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mechanic Notes</label>
                                <textarea id="mechanicNotes" name="mechanicNotes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-24 resize-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mechanic Notes" ></textarea>
                            </div>

                            <div class="mb-5">
                                <label for="clientNotes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client Notes</label>
                                <textarea id="clientNotes" name="clientNotes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-24 resize-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Client Notes" ></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="mechanicID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mechanic ID</label>
                                <input type="text" id="mechanicID" name="mechanicID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mechanic ID" required />
                            </div>

                            <div class="mb-5">
                                <label for="vehicleID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle ID</label>
                                <input type="text" id="vehicleID" name="vehicleID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Vehicle ID" required />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Reparation
                        </button>
                        <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="update-modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Pagination -->
    <div class="bg-gray-600">
        {{ $reparations->links() }}
    </div>
</div>

<script>

        $(".remove-btn").click(function(){
            var id = $(this).data('id');
            console.log(id);
            // Show the delete modal
            $('#delete-modal').removeClass('hidden');
            $('#delete-id').val(id);
        });

        $(".update-btn").click(async function(){
            var id = $(this).data('id');
            let reparation = await fetch('/reparations/' + id);
            let reparationData = await reparation.json();
            console.log(reparationData);
            // Populate form fields with reparation data for updating
            $('#description').val(reparationData.description);
            $('#startDate').val(reparationData.startDate); // Use the correct key from the response object
            $('#endDate').val(reparationData.endDate); // Use the correct key from the response object
            $('#mechanicNotes').val(reparationData.mechanicNotes); // Use the correct key from the response object
            $('#clientNotes').val(reparationData.clientNotes); // Use the correct key from the response object, handling null values
            $('#mechanicID').val(reparationData.mechanicID); // Use the correct key from the response object
            $('#vehicleID').val(reparationData.vehicleID); // Use the correct key from the response object

            // Show the update modal
            $('#update-modal').removeClass('hidden');
            $('#update-id').val(id);
        });

        $('[data-modal-hide]').click(function(){
            var targetModal = $(this).attr('data-modal-hide');
            $('#' + targetModal).addClass('hidden');
        });

        var reparationsJson = @json($reparations);
        console.log(reparationsJson);

</script>
@endsection
