/*function maps(){*/
//Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
    NodeList.prototype.forEach = function(callback) {
        [].forEach.call(this, callback);
    }
}

var linked = document.querySelectorAll('.title_vignette a');

linked.forEach(function (linkeds) {
    linkeds.addEventListener('click', function() {
        console.log(linkeds.id);
        var idLong = linkeds.id;
        var id = idLong.replace('linkN', '');
        
         var adrPropre = 'p#adresscom' +id;
        console.log(adrPropre);
        var adressComp = document.querySelector(adrPropre).innerText;
        var nameMuseum = document.querySelector('#nameMusee'+id).innerText;
        var adrGeo = nameMuseum + " " + adressComp;
         $.getJSON("geocode.php?adress="+adrGeo, function(result){
             
             console.log(result);
             
             var lon = result.lon[0];
             var lat = result.lat[0];
             
              var myCenter = new google.maps.LatLng(lat,lon);
  var mapCanvas = document.getElementById("map"+id);
  var mapOptions = {center: myCenter, zoom: 15, styles :[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:"Hello World!"
    });
  infowindow.open(map,marker);
  });
             
      
        });
        
        
        console.log(adrGeo);
/*        initMap(id);*/
    });
});

/*var initMap = function(id) {
    console.log(id);
    var adrPropre = 'p#adresscom' +id;
    console.log(adrPropre);
    var adressComp = document.querySelector(adrPropre).innerText;
    var nameMuseum = document.querySelector('#nameMusee'+id).innerText;
    var adrGeo = nameMuseum + " " + adressComp;
    console.log(adrGeo);
	// Une variable pour contenir notre future marker
	var myMarker = null;
 
	// Des coordonnées de départ
	var myLatlng = new google.maps.LatLng(34.397, 150.644);
 
	// Les options de notre carte
	var myOptions = {
		zoom: 15,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
 
    
	// On créé la carte
	var myMap = new google.maps.Map(
		document.querySelector('#map'+id),
		myOptions
	);
 
	// L'adresse que nous allons rechercher
	var GeocoderOptions = {
	    'address' : adrGeo,
	    'region' : 'FR'
	}
 
	// Notre fonction qui traitera le resultat
	function GeocodingResult( results , status )
	{
	  // Si la recher à fonctionné
	  if( status == google.maps.GeocoderStatus.OK ) {
 
	    // S'il existait déjà un marker sur la map,
	    // on l'enlève
	    if(myMarker != null) {
	      myMarker.setMap(null);
	    }
 
	    // On créé donc un nouveau marker sur l'adresse géocodée
	    myMarker = new google.maps.Marker({
	      position: results[0].geometry.location,
	      map: myMap,
	      title: nameMuseum
	    });
 
	    // Et on centre la vue sur ce marker
	    myMap.setCenter(results[0].geometry.location);
 
	  } // Fin si status OK
 
	} // Fin de la fonction
 
	// Nous pouvons maintenant lancer la recherche de l'adresse
	var myGeocoder = new google.maps.Geocoder();
	myGeocoder.geocode( GeocoderOptions, GeocodingResult );


    }*/
    
/*}*/
/*function initMap() {
                    var myCenter = new google.maps.LatLng(47.6, 6.1);
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {center: myCenter, zoom:10, scrollwheel: false};
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({position:myCenter});
                    marker.setMap(map);
                }*/