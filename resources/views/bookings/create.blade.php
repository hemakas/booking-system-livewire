<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create New Booking') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-2">
          
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200 ">
            <form class="w-full max-w-lg" action="{{ route('bookings.store') }}" method="post">
              @csrf
              <div class="flex flex-wrap -mx-3 mb-6">
                {{-- channel --}}
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="channel">
                    Channel
                  </label>
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="channel">
                    @foreach ($channels as $channel)
                      @if(old('channel') == $channel->id)
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
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="room">
                    Room
                  </label>
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="room">
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
              </div>

              {{-- rate plan --}}
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ratePlan">
                    Rate Plan
                  </label>
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="ratePlan">
                    @foreach ($ratePlans as $ratePlan)
                      @if(old('ratePlan') == $ratePlan->id)
                        <option value="{{ $ratePlan->id }}" selected>{{ $ratePlan->name }}</option>
                      @else
                        <option value="{{ $ratePlan->id }}">{{ $ratePlan->name }}</option>
                      @endif
                    @endforeach
                  </select>
                  {{-- rate plan error --}}
                  @error('ratePlan')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- comment --}}
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="comment">
                    Comment
                  </label>
                  <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="comment" type="text">{{ old('comment') }}</textarea> 
                  {{-- comment error --}}
                  @error('comment')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
              </div>
          </div>

          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            
            <div class="flex flex-wrap -mx-3 mb-6">
              {{-- first name --}}
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstName">
                  First Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" name="firstName" type="text" placeholder="Jane" value="{{ old('firstName') }}">
                {{-- firstName error --}}
                @error('firstName')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>

              {{-- last name --}}
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastName">
                  Last Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="lastName" type="text" placeholder="Doe" value="{{ old('lastName') }}">
                {{-- lastName error --}}
                @error('lastName')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="flex flex-wrap -mx-3 mb-6">
              {{-- contact mobile --}}
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="contactMobile">
                  Contact Mobile
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" name="contactMobile" type="text" value="{{ old('contactMobile') }}">
                {{-- contactMobile error --}}
                @error('contactMobile')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>

              {{-- contact email --}}
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="contactEmail">
                  Contact Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="contactEmail" type="text" value="{{ old('contactEmail') }}">
                {{-- contactEmail error --}}
                @error('contactEmail')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              {{-- no of adults --}}
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="noOfAdults">
                  No. of Adults
                </label>
                <input type="number" class="appearance-none w-full text-center bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 md:text-basecursor-default" name="noOfAdults" value="{{ old('noOfAdults') }}">
              </div>

              {{-- no. of children --}}
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="noOfChildren">
                  No. of Children
                </label>
                <input type="number" class="appearance-none w-full text-center bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 md:text-basecursor-default" name="noOfChildren" value="{{ old('noOfChildren') }}">
              </div>

              {{-- no. of rooms --}}
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="noOfRooms">
                  No. of Rooms
                </label>
                <input type="number" class="appearance-none w-full text-center bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 md:text-basecursor-default" name="noOfRooms" value="{{ old('noOfRooms') }}">
              </div>
            </div>

            {{-- total amount --}}
            <div class="w-full px-3 mb-6 md:mb-0">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="totalAmount">
                  Total Amount (Rs.) 
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="totalAmount" type="text" placeholder>
              </div>
            </div>

            
            {{-- create button --}}
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                  Create
              </button>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>

</x-app-layout>
