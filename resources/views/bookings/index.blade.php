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
                                    buttons
                                </td>
                                {{-- <form action="{{ route('tasks.destroy', $tasks->id) }}">
                                    <input type="hidden" name="_method" value="_DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                </form> --}}
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                {{ $bookings->links() }}
            </div>

        {{-- </div> --}}
    </div>

</x-app-layout>
