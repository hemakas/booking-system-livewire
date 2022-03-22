<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- data table -->
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
                                    Description
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
                                    {{ $booking->description }}
                                </td>

                                {{-- <form action="{{ route('tasks.destroy', $tasks->id) }}">
                                    <input type="hidden" name="_method" value="_DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                </form> --}}
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</x-app-layout>
