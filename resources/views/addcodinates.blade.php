<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('suuGhar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
                        <form action="{{ route('toiletCodinates.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="name">Name:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="name" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="address">Address:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="address" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="latitude">Latitude:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="latitude" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="longitude">Longitude:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="longitude" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="nearest_station">Nearest Station:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="nearest_station" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="image_url">Image URL:</label>
                                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" type="text" name="image_url" required>
                            </div>

                            <div class="mb-4">
                                <button class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 focus:outline-none" type="submit">Add Location</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
