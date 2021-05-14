@push('stylesheet')
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">

<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">

<style>
  #map { position: absolute; top: 0; bottom: 0; width: 100%; height: 800px;}
  </style>

@endpush


<h1>Hola</h1>
<div id="map"></div>


@push('javascript')
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYmVtdG9ycmVzIiwiYSI6ImNqY3dvdGlmZjBnNm8yeW5zNTMzemZxaW0ifQ.EHISAJYq1EioCIzBw-wHfw';


	// mapboxgl.accessToken = 'pk.eyJ1IjoiYmVtdG9ycmVzIiwiYSI6ImNqY3dvdGlmZjBnNm8yeW5zNTMzemZxaW0ifQ.EHISAJYq1EioCIzBw-wHfw';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-70.7679523, -33.6315897],
        zoom: 13
    });

    map.addControl(
        new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }),
        'top-left'
    );

    // map.setLayoutProperty('country-label', 'text-field', ['get','name_es']);

// Create a default Marker and add it to the map.
    var marker1 = new mapboxgl.Marker()
    .setLngLat([-33.6315897,-70.7679523])
    .addTo(map);

    // Create a default Marker, colored black, rotated 45 degrees.
    // var marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
    // .setLngLat([-33.6315929,-70.7679523])
    // .addTo(map);

</script>
@endpush
