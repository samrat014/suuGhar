<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('suuGhar') }}
        </h2>
    </x-slot>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}

                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Nearest Station</th>
                                <th>show location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($toiletCodinates as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->latitude }}</td>
                                <td>{{ $item->longitude }}</td>
                                <td>{{ $item->nearest_station }}</td>
                                {{-- <td>{{ $item->image_url }}</td> --}}
                                <td>{{ 'link' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                    {{-- end table --}}
                </div>
            </div>
            <br>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                                  {{--
                <div id="map" style="height: 400px;"></div>

                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" onload="initMap()"></script>
                <script>
                    function initMap() {
                        const map = new google.maps.Map(document.getElementById('map'), {
                            center: { lat: 10 , lng:  10  },
                            zoom: 10,
                        });
                    }
                </script>
 --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
