<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('suuGhar') }}
        </h2>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </x-slot>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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


                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            {{--  start openstreatmaps --}}
                            {{-- <div id="mapdiv" style="width: 100%; height: 500px; "  ></div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/OpenLayers.js"></script>
                    <script>
                        map = new OpenLayers.Map("mapdiv");
                        map.addLayer(new OpenLayers.Layer.OSM());

                        var lonLat = new OpenLayers.LonLat(85.3206, 27.70169)
                            .transform(
                                new OpenLayers.Projection("EPSG:4326"),
                                map.getProjectionObject()
                            );

                        var zoom = 13;

                        var markers = new OpenLayers.Layer.Markers("Markers");
                        map.addLayer(markers);

                        markers.addMarker(new OpenLayers.Marker(lonLat));

                        map.setCenter(lonLat, zoom);

                        // Disable browser zoom on the map div
                        document.getElementById("mapdiv").addEventListener("wheel", function (e) {
                            e.preventDefault();
                        }, { passive: false });
                    </script> --}}
                            {{-- end openstreatmaps --}}

        {{-- start google map --}}
                    <div id="map" style="width: 100%; height: 500px; " class="my-3"></div>

                            <script>
                                let map;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: 27.70169,
                                            lng: 85.3206
                                        },
                                        zoom: 13,

                                        scrollwheel: true,
                                    });

                                    const uluru = {
                                        lat: 0,
                                        lng: 0
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
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZmutik0rkonFUN9xw0u9V7qPnV6GNP1Q&callback=initMap" type="text/javascript"></script>
                            {{-- end google map --}}

                        </div>
                    </div>
                    <br>
                    {{-- start form --}}
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
                                    <td> <u>{{ $item->image_url . 'link' }}</u></td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                    {{-- end table --}}
                </div>
            </div>
            <br>

        </div>
    </div>
</x-app-layout>
