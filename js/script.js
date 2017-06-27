var map = document.querySelector('.carte-int');
var paths = document.querySelectorAll('.carte-int>svg>a>path');
var groups = document.querySelectorAll('.carte-int g.path-N');
var links = document.querySelectorAll('.panel-body>ul>li>a');

//Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
    NodeList.prototype.forEach = function(callback) {
        [].forEach.call(this, callback);
    }
}

var activeArea = function(id, id2) {
    map.querySelectorAll('.is-active').forEach(function (item){
        item.classList.remove('is-active');
    });
    if (id !== undefined) {
        var fullId = '#FR-' + id + "-" + id2;
        document.querySelector(fullId).classList.add('is-active');
        document.querySelector('#region-'+id2).classList.add('is-active');
        document.querySelector('#list-'+id+'-'+id2).classList.add('is-active');
    }
}

var activeArea2 = function(id, id2) {
    map.querySelectorAll('.is-active').forEach(function (item){
        item.classList.remove('is-active');
    });
    if (id !== undefined) {
        var fullId = '#FR-' + id + "-" + id2 + ">path";
        document.querySelector(fullId).classList.add('is-active');
        document.querySelector(fullId+":nth-child(2)").classList.add('is-active');
        document.querySelector('#region-'+id2).classList.add('is-active');
        document.querySelector('#list-'+id+'-'+id2).classList.add('is-active');
    }
}

var activeArea4 = function(id, id2) {
    map.querySelectorAll('.is-active').forEach(function (item){
        item.classList.remove('is-active');
    });
    if (id !== undefined) {
        var id1 = id.slice(5, 7);
        var id2 = id.slice(8, 10);
        var fullId = '#FR-' + id1 + "-" + id2;
        var g = document.querySelector('g.path-N');
        document.querySelector(fullId).classList.add('is-active');
        if("#"+g.id == fullId){
            document.querySelector(fullId+">path").classList.add('is-active');  
            document.querySelector(fullId+">path:nth-child(2)").classList.add('is-active');  
        }else {

        }
    }
}

paths.forEach(function (path) {
    path.addEventListener('mouseenter', function() {
        var idLong = path.id;
        var id = idLong.slice(3, 5);
        var id2 = idLong.slice(-1);
        /*var menuHref = document.querySelector('#region-'+id2).href;
        var menuHrefShort = menuHref.replace ('http://vesoul.codeur.online/front/santhony/FranceMusees/','');*/
        activeArea(id, id2);
        /*document.querySelector(menuHrefShort).classList.add('in');*/
    });
});

paths.forEach(function (path) {
    path.addEventListener('mouseleave', function() {
        var idLong = path.id;
        var id = idLong.slice(3, 5);
        var id2 = idLong.slice(-1);
        /*var menuHref = document.querySelector('#region-'+id2).href;
        var menuHrefShort = menuHref.replace ('http://vesoul.codeur.online/front/santhony/FranceMusees/','');*/
        activeArea();
        document.querySelector('#region-'+id2).classList.remove('is-active');
        document.querySelector('#list-'+id+"-"+id2).classList.remove('is-active');
        /*document.querySelector(menuHrefShort).classList.remove('in');*/
    });
});

groups.forEach(function (group) {
    group.addEventListener('mouseenter', function() {
        var idLong = group.id;
        var id = idLong.slice(3, 5);
        var id2 = idLong.slice(-1);
        activeArea2(id, id2);
    });
});

groups.forEach(function (group) {
    group.addEventListener('mouseleave', function() {
        var idLong = group.id;
        var id = idLong.slice(3, 5);
        var id2 = idLong.slice(-1);
        activeArea2();
        document.querySelector('#region-'+id2).classList.remove('is-active');
        document.querySelector('#list-'+id+'-'+id2).classList.remove('is-active');
    });
});

links.forEach(function (link) {
    link.addEventListener('mouseenter', function() {
        var id = link.id;
        activeArea4(id);
    });
});

links.forEach(function (link) {
    link.addEventListener('mouseleave', function() {
        activeArea4();
    });
});



/*-----------------------------------------*/


    $(function(){
      // bind change event to select
      $('#dep_select').on('change', function () {
          var url = $(this).val(); // get selected value
          var departement = "departement.php?id=";
          if (url) { // require a URL
              window.location = departement + url; // redirect
          }
          return false;
      });
    });

    function selected() {
        var url = window.location.href.slice(-5, -2);
        if(url == "id="){
            var id = window.location.href.slice(-2);
            var optSelect = document.querySelector('option[value="'+id+'"]');
            optSelect.selected = true;
        }
    }

selected();




