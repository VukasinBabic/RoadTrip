@extends('layouts.head')
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js">
	</script>
<style>
#map {
	height: 80%; 
	width: 60%; 
	margin: auto;
}
</style>
</head>
<body>

	@include('layouts.nav') @if(!empty($message))
	<div class="alert alert-success">{{ $message }}</div>
	@endif
	<div class="pb-3 pt-3" style="text-align: center" >
	<h3 >Road trip: {{ $name }}</h3>
	<a href="{{ route('roadtrips') }}" class="btn btn-xs btn-info">
            					
    	<span class="glyphicon glyphicon-pencil">Road trip list</span>
            					
    </a>
    </div>
	<div id="map" class="align-items-center"></div>
	
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
                             path: points,
                             strokeColor: " #ff0000",
                             strokeOpacity: .7,
                             strokeWeight: 4
                        });
                        poly.setMap(map);
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
	//We call the Initiliaze function, after the google maps API is called.
    google.maps.event.addDomListener(window, 'load', initialize);</script>
</body>
</html>












