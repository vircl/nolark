window.onload = function () {

    L.mapquest.key = 'ubp4jBoUV5xF6SVaaSDwJAqYFvZPM7VV';

    var map = L.mapquest.map('map', {
        center: [43.12115, 5.94037],
        layers: L.mapquest.tileLayer('map'),
        zoom: 12
    });
    map.addControl(L.mapquest.control());

    L.mapquest.textMarker([43.12115, 5.94037], {
        text: 'Nolark',
        position: 'right',
        type: 'marker',
        icon: {
            primaryColor: '#333333',
            secondaryColor: '#333333',
            size: 'sm'
        }
    }).addTo(map);
}
