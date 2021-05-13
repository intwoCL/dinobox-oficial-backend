@push('stylesheet')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <title>Calcular rutas</title>
  <style>
      #mapa{
          height: 600px;
      }
  </style>
@endpush

<div id='mapa'></div>

@push('javascript')
<script>
  if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(position){
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;

          var mymap = L.map('mapa', {
              center: [latitude, longitude],
              zoom: 12
          });

          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              maxZoom: 25,
              attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: 'mapbox/streets-v11'
          }).addTo(mymap);

          L.Routing.control({
              waypoints: [
                  L.latLng(latitude, longitude),
                  L.latLng(37.17059, -3.60552)
              ],
              language: 'es'
          }).addTo(mymap);
      });
  }
  else{
      var mymap = L.map('mapa', {
          center: [37.17059, -3.60552],
          zoom: 17
      });

      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
          maxZoom: 25,
          attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: 'mapbox/streets-v11'
      }).addTo(mymap);
  }
</script>
@endpush
