@push('stylesheet')

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%;}
#coordenadas {
    display: block;
    position: relative;
    margin: 0px auto;
    width: 40%;
    padding: 5px;
    border: none;
    border-radius: 7px;
    font-size: 15px;
font-family: Montserrat;
    text-align: center;
    color: #000;
    background: #D6EAF8;
}
</style>

@endpush

<div id='map'></div>
<pre id='coordenadas'></pre>

@push('javascript')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYmVtdG9ycmVzIiwiYSI6ImNqY3dvdGlmZjBnNm8yeW5zNTMzemZxaW0ifQ.EHISAJYq1EioCIzBw-wHfw';


  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position){
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [longitude, latitude],
          zoom: 13
      });

      map.addControl(new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          mapboxgl: mapboxgl
      }));

      map.addControl(new mapboxgl.NavigationControl());
      // map.addControl(new mapboxgl.FullscreenControl());
      map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
          enableHighAccuracy: true
        },
        trackUserLocation: true
      }));
      // map.on('mousemove', function (e) {
      //     document.getElementById('coordenadas').innerHTML =
      //         JSON.stringify(e.lngLat);
      // });

      marker = new mapboxgl.Marker();

      function add_marker (event) {
          var coordinates = event.lngLat;
          console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
          marker.setLngLat(coordinates).addTo(map);
        }

      map.on('click', add_marker.bind(this));
    });
  }
  else{
      // var mymap = L.map('mapa', {
      //     center: [37.17059, -3.60552],
      //     zoom: 17
      // });

      // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      //     maxZoom: 25,
      //     attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
      //     id: 'mapbox/streets-v11'
      // }).addTo(mymap);
  }

  </script>
@endpush