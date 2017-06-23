var map = document.querySelector('.carte');
var paths = map.querySelectorAll('.carte svg a');
var links = map.querySelectorAll('.panel-body li');

//Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
    NodeList.prototype.forEach = function(callback) {
        [].forEach.call(this, callback);
    }
}

var activeArea = function(id) {
    map.querySelectorAll('.is-active').forEach(function (item){
            item.classList.remove('is-active');
        });
    if (id !== undefined) {
        document.querySelector('.path-' + id).classList.add('is-active');
        document.querySelector('#region-' + id).classList.add('is-active');
        console.log(id);
    }
}

paths.forEach(function (path) {
    path.addEventListener('mouseenter', function() {
        var id = this.children[0].classList[1].replace('path-','');
        console.log(id);
        activeArea(id);
    });
});

links.forEach(function (link) {
    link.addEventListener('mouseenter', function() {
        var id = this.id.replace('region-','');
        activeArea(id);
    });
});

paths.forEach(function (path) {
    path.addEventListener('mouseleave', function() {
        activeArea();
    });
});

links.forEach(function (link) {
    link.addEventListener('mouseleave', function() {
        activeArea();
    });
});