<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create New Room ') }} 
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-2">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 ">
              <form action="{{ route('rooms.store') }}" method="post">
                @csrf

                {{-- roomName --}}
                <div class="mb-6">
                  <label for="roomName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Room Name</label>
                  <input type="text" name="roomName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Room Name" value="{{ old('roomName') }}">
                  {{-- roomName error --}}
                  @error('roomName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

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
