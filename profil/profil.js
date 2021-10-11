/* JavaScript for profile.php */
var startLayer = L.layerGroup(); // layer for start-marker
var stopLayer = L.layerGroup(); // layer for stop-marker
var lineLayer = L.layerGroup();
var runsLayer = L.layerGroup(); // layer for users existing runs

var markerType = "start";
var startLat, startLng, stopLat, stopLng;
var map;
var map2;
var markers = []; // store the start and end-points markers
var marker;

function startUp() { // body onload function
    mapStart();
    showRunsDiagram();
    showAllRuns()
    // $.ajax({
    //     type: "GET",
    //     url: "controller.php",
    //     data: "getSession",
    //     dataType: "json",
    //     success: function (response) {
    //         session = response;
    //         console.log(session);
    //         $('#changeMembership').val(session).change();
    //     }

    // });
}

function mapStart() {
    // Create the map and adding layers
    map = L.map('map').setView([51.505, -0.09], 12);
    map2 = L.map('map2').setView([51.505, -0.09], 10);
    map.addLayer(startLayer);
    map.addLayer(stopLayer);
    map.addLayer(lineLayer);
    map2.addLayer(runsLayer);

    map.on("click", function (e) { // when the map is clicked on
        placeMarker(e); // function for placing down marker
        marker.on('dragend', function (e) { // trigger after a marker have been dragged
            markers[e.target.options.id].lat = e.target.getLatLng().lat;
            markers[e.target.options.id].lng = e.target.getLatLng().lng;

            document.getElementById(e.target.options.type + "X").value = e.target.getLatLng().lat;
            document.getElementById(e.target.options.type + "Y").value = e.target.getLatLng().lng;

            if (markers.length === 2) { // if there is two markers draw a line between them
                drawLine();
            }
            changeMarkerType(e.target.options.type); // Change the markerType to the same type as the marker being dragged
        });

    });
}

function placeMarker(e) {
    if (markerType === "start") { // place down start-point
        var id = 0;
        startLayer.clearLayers();
        var layer = startLayer;
        var newMarkerType = "stop";
    }
    else if (markerType === "stop") { // place down end-point
        var id = 1;
        stopLayer.clearLayers();
        var layer = stopLayer;
        var newMarkerType = "start";
    }
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    marker = new L.Marker([lat, lng], {
        draggable: true,
        id: id,
        type: markerType
    }).addTo(layer);
    marker.bindPopup("<b>" + markerType + " point</b>").openPopup();
    markers[id] = { lat, lng, markerType };

    document.getElementById(markerType + "X").value = lat;
    document.getElementById(markerType + "Y").value = lng;

    changeMarkerType(newMarkerType);
    if (markers.length === 2) {
        drawLine();
    }
}

function drawLine() {
    lineLayer.clearLayers();
    var polygon = L.polyline([ // Writes a line between the start and stop-marker
        [markers[0].lat, markers[0].lng],
        [markers[1].lat, markers[1].lng]
    ]).addTo(lineLayer);
}

function changeMarkerType(newType) { // Change the varible markerType and change the Color on the buttons
    markerType = newType;
    id1 = "startPoint";
    id2 = "endPoint";
    text = "You are now placing a " + newType + " marker";
    if (newType === "stop") {
        id1 = "endPoint";
        id2 = "startPoint";
    }
    document.getElementById(id1).className = "btn btn-primary active";
    document.getElementById(id2).className = "btn btn-outline-primary";
    document.getElementById("markerTypeText").innerHTML = text;
}

function showAllRuns() {
    $.ajax({
        type: "GET",
        url: "../controller.php",
        data: "getRuns",
        dataType: "json",
        success: function (response) {
            var table = document.getElementById("runsList");
            var text = "";
            runsLayer.clearLayers();
            markers.length = 0;
            changeMarkerType("start");
            for (let i = 0; i < response.length; i++) {
                // Stop-marker
                var mp2 = new L.Marker([response[i]["stopLatitude"], response[i]["stopLongitude"]]).addTo(runsLayer);
                mp2.bindPopup("Slutpunkt").openPopup();
                // Start-marker
                var mp = new L.Marker([response[i]["startLatitude"], response[i]["startLongitude"]]).addTo(runsLayer);
                mp.bindPopup("<b>" + response[i]["type"] + " i " + response[i]["length"] + "km</b><br>" + response[i]["date"]).openPopup();
                // Line between
                var polygon = L.polyline([
                    [response[i]["startLatitude"], response[i]["startLongitude"]],
                    [response[i]["stopLatitude"], response[i]["stopLongitude"]]
                ]).addTo(runsLayer);

                // Add text to the table foreach run
                text += "<tr><th scope='row'>" + (i + 1) + "</th><td>" + response[i]["type"] + "</td><td>" + response[i]["length"] + " km </td><td>" + response[i]["date"] + "</td></tr>";
            }
            table.innerHTML = text;
        }
    });
}

function showRunsDiagram() {
    $.ajax({
        type: "GET",
        url: "/trainingApp/controller.php",
        data: "getRunsDiagram",
        dataType: "json",
        success: function (response) {
            var lengths = [];
            var dates = [];
            for (var i = 0; i < response.length; i++) {
                lengths.push(parseInt(response[i]["length"], 10));
                dates.push(response[i]["date"] + " " + response[i]["type"]);
            }
            var ctx = document.getElementById('profileDiagram');
            var profileDiagram = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Your latest runs',
                        data: lengths,
                        fill: false,
                        borderColor: '#39A2DB',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
}

// $(document).ready(function () {

// });