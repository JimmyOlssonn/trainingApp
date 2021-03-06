var chartData = [       // Example data for chart
    ["2021-08-13", 19],
    ["2021-08-15", 8],
    ["2021-08-19", 7],
    ["2021-08-22", 22],
    ["2021-08-23", 3],
    ["2021-08-27", 9],
];

var mapData = [
    ["2021-08-13", 19, 51.48749613695947, -0.11984002369270554, 51.487282354387425, -0.062465772452053876],
]

var displayLayer = L.layerGroup();
var map;
var profileDiagram;



function startUp() { // body onload function
    // mapStart();
    // showRunsDiagram();
}

function mapStart() {
    // Create the map
    map = L.map('display-map').setView([51.505, -0.09], 12);
    map.addLayer(displayLayer);
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.boxZoom.disable();
    map.keyboard.disable();
    map.removeControl(map.zoomControl);

    displayLayer.clearLayers();
    for (let i = 0; i < mapData.length; i++) {
        var mp = new L.Marker([mapData[i][2], mapData[i][3]]).addTo(displayLayer);
        var mp2 = new L.Marker([mapData[i][4], mapData[i][5]]).addTo(displayLayer);
        mp.bindPopup("<b>" + mapData[i][1] + "km</b><br>" + mapData[i][0]).openPopup();
        var polygon = L.polyline([
            [mapData[i][2], mapData[i][3]],
            [mapData[i][4], mapData[i][5]]
        ]).addTo(displayLayer);
    }
}

function showRunsDiagram() { // Create Chart
    var lengths = [];
    var dates = [];
    for (var i = 0; i < chartData.length; i++) { // Add the data to new varibles
        lengths.push(chartData[i][1]);
        dates.push(chartData[i][0]);
    }
    var ctx = document.getElementById('display-diagram');
    profileDiagram = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Träningar senaste 2 veckorna',
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

// Determine if the element is in the viewport
function elementInViewport(el) {
    var rect = el[0].getBoundingClientRect();
    return (rect.top == $(window).height());
}
// On-scroll event listener
$(window).on('scroll resize', function () {
    if ($(window).scrollTop() == 0) {
        $('#navbar').css("background-color", "transparent");
    }
    else {
        $('#navbar').css("background-color", "#333333");
    }
});

function columnMouseover(target) {
    anime({
        targets: target,
        boxShadow: "inset 0 0 200px black",
        easing: "linear",
        duration: 500,
    });
    anime({
        targets: target.querySelector("p"),
        opacity: 1,
        easing: "linear",
        duration: 500,
    });
    
}

function columnMouseout(target) {
    anime({
        targets: target,
        boxShadow: "inset 0 0 0px black",
        easing: "linear",
        durataion: 500
    });
    anime({
        targets: target.querySelector("p"),
        opacity: 0,
        easing: "linear",
        duration: 500,
    });
}

