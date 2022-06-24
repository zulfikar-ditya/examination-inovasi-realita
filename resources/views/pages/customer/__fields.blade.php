<x-form  :action="$model ? route('customer.update', $model) : route('customer.store')" :method="$model ? 'update' : 'create'">
    <div class="row">

        <div class="col-md-6">
            <x-input :type="'text'" :name="'nama'" :value="$model ? $model->nama : ''" :required="true" :autofocus="true"/>
        </div>

        <div class="col-md-6">
            <x-input :type="'text'" :name="'alamat'" :value="$model ? $model->alamat : ''" :required="true" :autofocus="false"/>
        </div>

        <div class="col-md-6">
            <x-input :type="'date'" :name="'tanggal_lahir'" :value="$model ? $model->tanggal_la : ''" :required="true" :autofocus="false"/>
        </div>

        <div class="col-md-6">
            <x-select :name="'customer_type_id'" :required="true" :autofocus="false" :id="'form-customer-type'">
                @foreach ($customer_types as $item)
                    <option value="{{$item->id}}" {{$model && $model->customer_type_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </x-select>
        </div>
        
            
        <div class="col-md-6">
            <x-input :type="'text'" :name="'longitude'" :value="$model ? $model->longitude : ''" :required="true" :autofocus="false"/>
        </div>

        <div class="col-md-6">
            <x-input :type="'text'" :name="'latitude'" :value="$model ? $model->latitude : ''" :required="true" :autofocus="false"/>
        </div>
            
        {{-- * ----------------------------- map ------------------------------------ --}}
        {{-- <div class="col-md-6">
            <input type="hidden" name="longitude" id="lat" value="0">
            <input type="hidden" name="latitude" id="lng" value="0">
            <div class="mb-5">
                <label for="">Pin Dari Maps</label>
                <div id='map' class="w-full mt-3 h-96"></div>
            </div>
        </div> --}}
        {{-- * ----------------------------- / map ------------------------------------ --}}


    </div>
</x-form>

@section('js')

    {{-- * --------------------------------------------------- select 2 form ------------------------------------------------------------ --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#form-customer-type').select2();
        });
    </script>
    {{-- * --------------------------------------------------- /select 2 form ------------------------------------------------------------ --}}

    {{-- * --------------------------------------------------- google map ------------------------------------------------------------ --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_KEY') }}" async></script>
    <script>
        let map;

        let lat = document.getElementById('lat');
        let lng = document.getElementById('lng');

        function initMap() {
            // =========== core =================== 
            const myLatlng = {
                lat: 0, 
                lng: 0
            };
            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatlng, 
                zoom: 8, 
                mapTypeId: "roadmap", //[roadmap, satellite, hybrid, terrain]
                gestureHandling: "auto", //[cooperative, auto]
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                rotateControl: true,
                fullscreenControl: true
            });
            var marker = new google.maps.Marker({
                position: myLatlng,
                map,
                title: "Hello World!",
            });

            map.addListener("click", (mapsMouseEvent) => {
                marker.setPosition(mapsMouseEvent.latLng)
                console.log(mapsMouseEvent.latLng.lat());
                console.log(mapsMouseEvent.latLng.lng());
                lat.value = mapsMouseEvent.latLng.lat();
                lng.value = mapsMouseEvent.latLng.lng();
            });
        }

    </script> --}}
    {{-- * --------------------------------------------------- /google map ------------------------------------------------------------ --}}

    {{-- * ----------------------------- LEAFLET MAP ---------------------------- --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>


    <script>
        map = L.map('map', {
            center: [51.505, -0.09],
            zoom: 13
        });

        var greenIcon = L.icon({
            iconUrl: '{{ asset("images/leaf-orange.png") }}',

            iconSize:     [38, 95], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        L.marker([51.5, -0.09], {icon: greenIcon}).addTo(map);
    </script> --}}
    {{-- * ----------------------------- /LEAFLET MAP ---------------------------- --}}

@endsection