<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create New Booking ') }} 
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-2">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 ">
              <form action="{{ route('bookings.store') }}" method="post">
                @csrf

                <div class="grid grid-cols-2 mb-6 gap-2">
                  {{-- checkIn --}}
                  <div>
                    <label for="checkIn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checkin</label>
                    <input datepicker type="text" name="checkIn" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="{{ old('checkIn') }}" autocomplete="off" >
                    {{-- checkIn error --}}
                    @error('checkIn')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                  </div>
  
                  {{-- checkOut --}}
                  <div>
                    <label for="checkOut" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checkout</label>
                    <input datepicker type="text" name="checkOut" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="{{ old('checkOut') }}" autocomplete="off">
                    {{-- checkOut error --}}
                    @error('checkOut')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              
                {{-- channel --}}
                <div class="mb-6">
                  <label for="channel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Channel</label>
                  <select name="channel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($channels as $channel)
                      @if(old('channel')  == $channel->id)
                          <option value="{{ $channel->id }}" selected>{{ $channel->name }}</option>
                        @else
                          <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endif
                      @endforeach
                  </select>
                  {{-- channel error --}}
                  @error('channel')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                {{-- room --}}
                <div class="mb-6">
                  <label for="room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Room</label>
                  <select name="room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($rooms as $room)
                      @if(old('room') == $room->id)
                          <option value="{{ $room->id }}" selected>{{ $room->name }}</option>
                        @else
                          <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endif
                      @endforeach
                  </select>
                  {{-- room error --}}
                  @error('room')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                {{-- ratePlan --}}
                <div class="mb-6">
                  <label for="ratePlan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rate Plan</label>
                  <select name="ratePlan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($ratePlans as $ratePlan)
                      @if(old('ratePlan') == $ratePlan->id)
                          <option value="{{ $ratePlan->id }}" selected>{{ $ratePlan->name }}</option>
                        @else
                          <option value="{{ $ratePlan->id }}">{{ $ratePlan->name }}</option>
                        @endif
                      @endforeach
                  </select>
                  {{-- ratePlan --}}
                  @error('ratePlan')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                {{-- comment --}}
                <div class="mb-6">
                  <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Comment</label>
                  <textarea name="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">{{ old('comment') }}</textarea>
                  @error('comment')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
              <div class="grid grid-cols-2 mb-6 gap-2">
                {{-- firstName --}}
                <div>
                  <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name</label>
                  <input type="text" name="firstName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="John" value="{{ old('firstName') }}">
                  {{-- firstName error --}}
                  @error('firstName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                {{-- lastName --}}
                <div>
                  <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name</label>
                  <input type="text" name="lastName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Doe" value="{{ old('lastName') }}">
                  {{-- lastName error --}}
                  @error('lastName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="grid grid-cols-3 mb-6 gap-2">
                {{-- contactMobile --}}
                <div>
                  <label for="contactMobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Mobile</label>
                  <input type="text" name="contactMobile" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="0714445556" value="{{ old('contactMobile') }}">
                  {{-- contactMobile error --}}
                  @error('contactMobile')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                {{-- contactEmail --}}
                <div class="col-span-2">
                  <label for="contactEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Email</label>
                  <input type="email" name="contactEmail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@example.com" value="{{ old('contactEmail') }}">
                  {{-- contactEmail error --}}
                  @error('contactEmail')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- bookingDate --}}
              <div class="mb-6">
                <label for="bookingDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Booking Date</label>
                <input datepicker type="text" name="bookingDate" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="{{ old('bookingDate') }}" autocomplete="off">
                {{-- bookingDate error --}}
                @error('bookingDate')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>

              <div class="grid grid-cols-3 mb-6 gap-2">
                {{-- noOfAdults --}}
                <div>
                  <label for="noOfAdults" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. of Adults</label>
                  <input type="number" name="noOfAdults" class="appearance-none text-center shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ old('noOfAdults') }}">
                </div>

                {{-- noOfChildren --}}
                <div>
                  <label for="noOfChildren" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. of Children</label>
                  <input type="number" name="noOfChildren" class="appearance-none text-center shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ old('noOfChildren') }}">
                </div>
              
                {{-- noOfRooms --}}
                <div>
                  <label for="noOfRooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. of Rooms</label>
                  <input type="number" name="noOfRooms" class="appearance-none text-center shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ old('noOfRooms') }}">
                </div>
              </div>

              {{-- totalAmount --}}
              <div lass="mb-6">
                <label for="totalAmount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Amount</label>
                <div class="flex mb-6">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    Rs. 
                  </span>
                  <input type="text" name="totalAmount" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 text-right focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('totalAmount') }}">
                </div>
                {{-- totalAmount error --}}
                @error('totalAmount')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>

              {{-- update button --}}
              <div>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>
