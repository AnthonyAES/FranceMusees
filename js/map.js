function initMap() {
    var adressComp = document.querySelector('.adressecomp').innerText;
    console.log(adressComp);
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
		document.getElementById('map'),
		myOptions
	);
 
	// L'adresse que nous allons rechercher
	var GeocoderOptions = {
	    'address' : adressComp,
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
	      title: "Palais de l\'Elysée"
	    });
 
	    // Et on centre la vue sur ce marker
	    myMap.setCenter(results[0].geometry.location);
 
	  } // Fin si status OK
 
	} // Fin de la fonction
 
	// Nous pouvons maintenant lancer la recherche de l'adresse
	var myGeocoder = new google.maps.Geocoder();
	myGeocoder.geocode( GeocoderOptions, GeocodingResult );
}

/*function initMap() {
                    var myCenter = new google.maps.LatLng(47.6, 6.1);
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {center: myCenter, zoom:10, scrollwheel: false};
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({position:myCenter});
                    marker.setMap(map);
                }*/