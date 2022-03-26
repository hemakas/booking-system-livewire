<x-app-layout>
    <x-slot name="header">
        <div class="relative col-span-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Bookings') }}
            </h2>
        </div>
        <div class="relative">
            <a href="{{ route('bookings.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New</a>
        </div>
    </x-slot>
          
    {{-- data table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Client Name</th>
                    <th scope="col" class="px-6 py-3">Client's Phone</th>
                    <th scope="col" class="px-6 py-3">Client's Email</th>
                    <th scope="col" class="px-6 py-3">Check In</th>
                    <th scope="col" class="px-6 py-3">Check Out</th>
                    <th scope="col" class="px-6 py-3">Channel</th>
                    <th scope="col" class="px-6 py-3">Room</th>
                    <th scope="col" class="px-6 py-3">Rate Plan</th>
                    <th scope="col" class="px-6 py-3">No. of Rooms</th>
                    <th scope="col" class="px-6 py-3">No. of Adults</th>
                    <th scope="col" class="px-6 py-3">No. of Children</th>
                    <th scope="col" class="px-6 py-3">Booking Date</th>
                    <th scope="col" class="px-6 py-3">Total Amount</th>
                    <th scope="col" class="px-6 py-3">Comment</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody>
                {{-- table data --}}
                @foreach ($bookings as $booking)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $booking->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $booking->first_name }} {{ $booking->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->contact_mobile }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->contact_email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->check_in }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->check_out }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->channel->name ?? '(n/a)'}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->room->name ?? '(n/a)'}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->ratePlan->name ?? '(n/a)' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->no_of_rooms }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->no_of_adults }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->no_of_children }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->booking_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->total_amount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->comment }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{-- edit link --}}
                            <form action="{{ route('bookings.edit', $booking->id) }}" method="post">
                                @csrf
                                @method('GET')
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                            </form>

                            {{-- delete link --}}
                            <button type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline" data-modal-toggle="defaultModal">Delete</button>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- pagination --}}
        {{ $bookings->links() }}

    </div>

    {{-- delete confirmation modal --}}
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          
          <div class="p-6 space-y-6">
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
              Are you sure you want to delete this record?
            </p>
          </div>
          
          <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
            <form action="{{ route('bookings.destroy', $booking) }}" method="post">
                @csrf
                @method('DELETE')
                <button data-modal-toggle="defaultModal" type="sumbmit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yes</button>
            </form>
            <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
          </div>

            
                
          </div>
        </div>
      </div>

</x-app-layout>
