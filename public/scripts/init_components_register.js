
$(document).ready(() => {
    //initialize tootil y calendario boostrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // config  map
    let mapOptions = {
        center: [$('#lat').val(),$('#long').val()],
        zoom: 20
    }

    //initialize mapa
    let map = new L.map('map', mapOptions);

    // create a map Layer
    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);

    //onChange long y lat form map
    $('#lat').change(()=>{
        map.panTo(new L.LatLng($('#lat').val(),$('#long').val()));
    });
    $('#long').change(()=>{
        map.panTo(new L.LatLng($('#lat').val(),$('#long').val()));
    });
});