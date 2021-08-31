var startLayer = L.layerGroup(); // layer for start-marker
var stopLayer = L.layerGroup(); // layer for stop-marker
var runsLayer = L.layerGroup(); // layer for users existing runs

var markerType = "start";
var startX, startY, stopX, stopY;

function startUp(){ // body onload function
  mapStart();
}

function mapStart() {
  // Create the map and adding layers
  map = L.map('map').setView([51.505, -0.09], 12);
  map.addLayer(startLayer);
  map.addLayer(stopLayer);
  map.addLayer(runsLayer);

  map.on("click", function (e) {
    // Really easy solution to creating Start-marker and Stop-marker
    if(markerType === "start"){
      startLayer.clearLayers();
      runsLayer.clearLayers();
      startLat = e.latlng.lat;
      startLng = e.latlng.lng;
      var mp = new L.Marker([startLat, startLng]).addTo(startLayer);
      mp.bindPopup("<b>Startpunkt</b>").openPopup();
      document.getElementById("startX").value = startLat;
      document.getElementById("startY").value = startLng;
      markerType = "stop";
    }
    else{
      stopLayer.clearLayers();
      runsLayer.clearLayers();
      stopLat = e.latlng.lat;
      stopLng = e.latlng.lng;
      var mp = new L.Marker([stopLat, stopLng]).addTo(stopLayer);
      mp.bindPopup("<b>Slutpunkt</b>").openPopup();
      document.getElementById("stopX").value = stopLat;
      document.getElementById("stopY").value = stopLng;
      markerType = "start";
      
      var polygon = L.polyline([ // Writes a line between the start and stop-marker
        [startLat, startLng],
        [stopLat, stopLng]
      ]).addTo(stopLayer);
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
        runsLayer.clearLayers();
        startLayer.clearLayers();
        stopLayer.clearLayers();
        for (let i = 0; i < response.length; i++) {
          // Stop-marker
          var mp2 = new L.Marker([response[i]["stopLatitude"], response[i]["stopLongitude"]]).addTo(runsLayer);
          mp2.bindPopup("Slutpunkt").openPopup();
          // Start-marker
          var mp = new L.Marker([response[i]["startLatitude"], response[i]["startLongitude"]]).addTo(runsLayer);
          mp.bindPopup("<b>"+ response[i]["type"] + " i " + response[i]["length"] +  "km</b><br>" + response[i]["date"]).openPopup(); 
          // Line between
          var polygon = L.polyline([
            [response[i]["startLatitude"], response[i]["startLongitude"]],
            [response[i]["stopLatitude"], response[i]["stopLongitude"]]
          ]).addTo(stopLayer);

          // Add text to the table foreach run
          text += "<tr><th scope='row'>" + (i+1) + "</th><td>" + response[i]["type"] + "</td><td>" + response[i]["length"] +  " km </td><td>" + response[i]["date"] + "</td></tr>";
        }
        table.innerHTML = text;
      }

    });
  });
});