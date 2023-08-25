<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('suuGhar') }}
        </h2>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
                        <form action="{{ route('toiletCodinates.store') }}" method="POST">
                            @csrf

                            {{-- map  --}}

                            <div id="map" style="width: 100%; height: 500px;" class="my-3"></div>

                            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/OpenLayers.js"></script>
                            <script>
                                function initMap() {

                                    var zoom = 16;

                                    var lonLat = new OpenLayers.LonLat(85.3206, 27.70169)
                                        .transform(
                                            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                                            new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator Projection
                                        );


                                    var map = new OpenLayers.Map("map");
                                    map.addLayer(new OpenLayers.Layer.OSM());

                                    map.setCenter(lonLat, zoom);

                                    var markers = new OpenLayers.Layer.Markers("Markers");
                                    map.addLayer(markers);

                                    var marker = new OpenLayers.Marker(lonLat);
                                    const check = document.getElementById('map');
                                    check.addEventListener("click", function(e) {
                                        console.log("clicked here: ", e)
                                    })
                                }
                                --}}

                            {{-- // initMap(); --}}



                            {{-- // var getcodinates = marker.events.register("click", marker, function (evt) {
                                //         var clickedLonLat = marker.lonlat;
                                //         var lat = clickedLonLat.lat;
                                //         var lon = clickedLonLat.lon;
                                //         alert("Latitude: " + lat + "\nLongitude: " + lon);
                                //     });

                                //     markers.addMarker(marker); --}}
                            {{-- </script> --}}

                            {{-- end map --}}




                            {{-- google map --}}
                            <script>
                                let map;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: 27.690174201403295,
                                            lng: 85.29114919320999
                                        },
                                        zoom: 13,

                                        scrollwheel: true,
                                    });
                                    const uluru = {
                                        lat: 27.690174201403295,
                                        lng: 85.29114919320999
                                    };
                                    let marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map,
                                        draggable: true
                                    });
                                    google.maps.event.addListener(marker, 'position_changed',
                                        function() {
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })
                                    google.maps.event.addListener(map, 'click',
                                        function(event) {
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

                            {{-- end google map --}}


                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="name">Name:</label>
                                <input
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                    type="text" name="name" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="address">Address:</label>
                                <input
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                    type="text" name="address" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="latitude">Latitude:</label>
                                <input id="lat"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                    type="text" name="latitude" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="longitude">Longitude:</label>
                                <input id="lng"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                    type="text" name="longitude" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="nearest_station">Nearest Station:</label>
                                <input
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                    type="text" name="nearest_station" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-semibold mb-1" for="image_url">Image URL:</label>
                                <input type="file">
                            </div>

                            <div class="mb-4">
                                <button
                                    class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 focus:outline-none"
                                    type="submit">Add Location</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
