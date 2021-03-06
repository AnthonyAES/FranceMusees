/*function maps(){*/
//Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
    NodeList.prototype.forEach = function(callback) {
        [].forEach.call(this, callback);
    }
}

var styled =[
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#eae9ed"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d2e0b7"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d2e0b7"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d2e0b7"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#b3dced"
            },
            {
                "visibility": "on"
            }
        ]
    }
];

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
             
             var lon = result.lon[0];
             var lat = result.lat[0];
             
              var myCenter = new google.maps.LatLng(lat,lon);
  var mapCanvas = document.getElementById("map"+id);
  var mapOptions = {center: myCenter, zoom: 15, styles :styled};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:nameMuseum
    });
  infowindow.open(map,marker);
  });
             
      
        });
        
        
        console.log(adrGeo);
/*        initMap(id);*/
    });
});

var linked2 = document.querySelectorAll('.more a');

linked2.forEach(function (linkeds2) {
    linkeds2.addEventListener('click', function() {
        console.log(linkeds2.id);
        var idLong = linkeds2.id;
        var id = idLong.replace('linkB', '');
        
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
  var mapOptions = {center: myCenter, zoom: 15, styles :styled};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:nameMuseum
    });
  infowindow.open(map,marker);
  });
             
      
        });
        
        
        console.log(adrGeo);
/*        initMap(id);*/
    });
});