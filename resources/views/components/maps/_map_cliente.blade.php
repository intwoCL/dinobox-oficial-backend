@push('stylesheet')
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>

<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">

<!-- Promise polyfill script is required -->
<!-- to use Mapbox GL Geocoder in IE 11. -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>


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

@push('javascript')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYmVtdG9ycmVzIiwiYSI6ImNqY3dvdGlmZjBnNm8yeW5zNTMzemZxaW0ifQ.EHISAJYq1EioCIzBw-wHfw';


  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position){
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      // var map = new mapboxgl.Map({
      //     container: 'map',
      //     style: 'mapbox://styles/mapbox/streets-v11',
      //     center: [longitude, latitude],
      //     zoom: 13
      // });

      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
          center: [longitude, latitude],
        // center: [-79.4512, 43.6568],
        zoom: 13
        });

        // Add the control to the map.
        // map.addControl(
        //   new MapboxGeocoder({
        //     accessToken: mapboxgl.accessToken,
        //     mapboxgl: mapboxgl
        //   })


        // );

        // map.addControl(new mapboxgl.GeolocateControl({
        //   positionOptions: {
        //       enableHighAccuracy: true
        //   },
        //   trackUserLocation: true
        // }));

        // function forwardGeocoder(query) {
        //   console.log('Hola',query);

        //   var matchingFeatures = [];
        //   for (var i = 0; i < customData.features.length; i++) {
        //   var feature = customData.features[i];
        //   // Handle queries with different capitalization
        //   // than the source data by calling toLowerCase().
        //   if (
        //     feature.properties.title
        //     .toLowerCase()
        //     .search(query.toLowerCase()) !== -1
        //   ) {
        //     // Add a tree emoji as a prefix for custom
        //     // data results using carmen geojson format:
        //     // https://github.com/mapbox/carmen/blob/master/carmen-geojson.md
        //     feature['place_name'] = '🌲 ' + feature.properties.title;
        //     feature['center'] = feature.geometry.coordinates;
        //     feature['place_type'] = ['park'];
        //     matchingFeatures.push(feature);
        //     }
        //   }
        //   return matchingFeatures;
        // }


        var geocoder = new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          marker: {
          color: 'orange'
        },
          mapboxgl: mapboxgl,
          localGeocoder: forwardGeocoder,
        });

        map.addControl(geocoder);

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