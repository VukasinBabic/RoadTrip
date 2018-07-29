@extends('layouts.head')
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js">
	</script>
<style>
/* Set the size of the div element that contains the map */
#map {
	height: 500px; /* The height is 400 pixels */
	width: 80%; /* The width is the width of the web page */
}
</style>
</head>
<body>

	@include('layouts.nav') @if(!empty($message))
	<div class="alert alert-success">{{ $message }}</div>
	@endif

	<a href="{{ route('roadtrips') }}" class="btn btn-xs btn-info">
            					
    	<span class="glyphicon glyphicon-pencil">Road trip list</span>
            					
    </a>
	<h3>My Google Maps Demo</h3>
	<!--The div element for the map -->
	<div id="map"></div>
	<script>
      
    function initialize() {
          var route1Latlng = new google.maps.LatLng(44,20);
          var mapOptions = {
               center: route1Latlng,
               zoom: 3,
               mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          var map = new google.maps.Map(document.getElementById("map"), mapOptions);
          $.ajax({
               type: "GET",
               url: "{!! url($path) !!}",
               dataType: "xml",
               success: function (xml) {

                   	console.log(xml)
                    var points = [];
                    var bounds = new google.maps.LatLngBounds();

                    $(xml).find("trkpt").each(function () {
                         var lat = $(this).attr("lat");
                         var lon = $(this).attr("lon");
                         var p = new google.maps.LatLng(lat, lon);
                         points.push(p);
                         bounds.extend(p);
                    });
                    var poly = new google.maps.Polyline({
                         // use your own style here
                         path: points,
                         strokeColor: "#000000",
                         strokeOpacity: .7,
                         strokeWeight: 4
                    });
                    poly.setMap(map);
                    // fit bounds to track
                    map.fitBounds(bounds);
                    
                    
               },
               failure:function(){
					alert('fail	')
                   }
                   
          });
     }
        
</script>

	<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_yrDAFYTGI6LYchUWsXEFsg1sTLw2Sh4&libraries=geometry,places,visualization,drawing"></script>

	<script type="text/javascript">

    google.maps.event.addDomListener(window, 'load', initialize);</script>
</body>
</html>












