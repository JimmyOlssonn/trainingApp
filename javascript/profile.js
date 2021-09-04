/* JavaScript for profile.php */
var startLayer = L.layerGroup(); // layer for start-marker
var stopLayer = L.layerGroup(); // layer for stop-marker
var lineLayer = L.layerGroup();
var runsLayer = L.layerGroup(); // layer for users existing runs

var markerType = "start";
var startLat, startLng, stopLat, stopLng;

function startUp() { // body onload function
  mapStart();
}

function mapStart() {
  // Create the map and adding layers
  map = L.map('map').setView([51.505, -0.09], 12);
  map.addLayer(startLayer);
  map.addLayer(stopLayer);
  map.addLayer(lineLayer);
  map.addLayer(runsLayer);

  map.on("click", function (e) {

    // Really easy solution to creating Start-marker and Stop-marker
    if (markerType === "start") {
      startLayer.clearLayers();
      runsLayer.clearLayers();
      startLat = e.latlng.lat;
      startLng = e.latlng.lng;
      var mp = new L.Marker([startLat, startLng]).addTo(startLayer);
      mp.bindPopup("<b>Start point</b>").openPopup();
      document.getElementById("startX").value = startLat;
      document.getElementById("startY").value = startLng;
      changeMarkerType("stop");
    }
    else if (markerType === "stop"){
      stopLayer.clearLayers();
      runsLayer.clearLayers();
      stopLat = e.latlng.lat;
      stopLng = e.latlng.lng;
      var mp = new L.Marker([stopLat, stopLng]).addTo(stopLayer);
      mp.bindPopup("<b>End point</b>").openPopup();
      document.getElementById("stopX").value = stopLat;
      document.getElementById("stopY").value = stopLng;
      changeMarkerType("start");
    }
    if(startLat !== undefined && stopLat !== undefined){
      lineLayer.clearLayers();
      var polygon = L.polyline([ // Writes a line between the start and stop-marker
        [startLat, startLng],
        [stopLat, stopLng]
      ]).addTo(lineLayer);
    }
  });

  $.ajax({
    type: "GET",
    url: "controller.php",
    data: "getSession",
    dataType: "json",
    success: function (response) {
      session = response;
      console.log(session);
      $('#changeMembership').val(session).change();
    }

  });
}

function changeMarkerType(type){ // Change the varible markerType and change the Color on the buttons
  markerType = type;
  var id1 = "startPoint";
  var id2 = "endPoint";
  if(type === "stop"){
    id1 = "endPoint";
    id2 = "startPoint";
  }
  document.getElementById(id1).className = "btn btn-primary active";
  document.getElementById(id2).className = "btn btn-outline-primary";
}

$(document).ready(function () {
  $(click).click(function () {

    $.ajax({
      type: "GET",
      url: "controller.php",
      data: "getRuns",
      dataType: "json",
      success: function (response) {
        var table = document.getElementById("runsList");
        var text = "";
        lineLayer.clearLayers();
        runsLayer.clearLayers();
        startLayer.clearLayers();
        stopLayer.clearLayers();
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
  });
});