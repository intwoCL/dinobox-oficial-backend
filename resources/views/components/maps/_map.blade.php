@push('stylesheet')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin="">
</script>

<style>
  #mimapa {height: 600px;}
</style>
@endpush

<div id="mimapa"></div>

@php
  $dire =  $c->direcciones;
@endphp

<pre>{{ $dire }}</pre>

@push('javascript')
<script>

  mapboxgl.accessToken = 'pk.eyJ1IjoiYmVtdG9ycmVzIiwiYSI6ImNqY3dvdGlmZjBnNm8yeW5zNTMzemZxaW0ifQ.EHISAJYq1EioCIzBw-wHfw';


    var mymap = L.map('mimapa').setView([-33.448890, -70.669265], 18);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 25,
    attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
}).addTo(mymap);


    var marker = L.marker([-33.448890, -70.669265]).addTo(mymap);
    marker.bindPopup("<b>Mi ubicación</b><br><a href='#'>Solicita más información</a>");

</script>
@endpush
