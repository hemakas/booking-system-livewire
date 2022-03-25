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
    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
            <div class="table w-full p-2">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    ID
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Channel
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Room
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Rate Plan
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    No. of Rooms
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Check In
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Check Out
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    No. of Adults
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    No. of Children
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Booking Date
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Client Name
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Client's Phone
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Client's Email
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Total Amount
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Comment
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Action
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($bookings as $booking)
                            <tr class="bg-gray-50 text-center">
                                <td class="p-2 border-r">
                                    {{ $booking->id }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->channel->name ?? '(n/a)'}}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->room->name ?? '(n/a)'}}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->ratePlan->name ?? '(n/a)' }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->no_of_rooms }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->check_in }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->check_out }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->no_of_adults }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->no_of_children }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->booking_date }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->first_name }} {{ $booking->last_name }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->contact_mobile }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->contact_email }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->total_amount }}
                                </td>
                                <td class="p-2 border-r">
                                    {{ $booking->comment }}
                                </td>
                                <td class="p-2 border-r">
                                    {{-- edit link --}}
                                    <form action="{{ route('bookings.edit', $booking->id) }}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-100 dark:hover:bg-blue-700 dark:focus:ring-blue-100">Edit</button>
                                    </form>

                                    {{-- delete link --}}
                                    <button type="button" class="text-red-500 hover:text-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-toggle="defaultModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                {{ $bookings->links() }}
            </div>

        {{-- </div> --}}
    </div>

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
