var chartData = [       // Example data for chart
    ["2021-08-13",19],
    ["2021-08-15",8],
    ["2021-08-19",7],
    ["2021-08-22",22],
    ["2021-08-23",3],
    ["2021-08-27",9],
];

var mapData = [
    ["2021-08-13",19,51.48749613695947,-0.11984002369270554, 51.487282354387425,-0.062465772452053876],
]

var displayLayer = L.layerGroup();
var map;

function startUp() { // body onload function
    mapStart();
    showRunsDiagram();
}

function mapStart() {
    // Create the map
    map = L.map('display-map').setView([51.505, -0.09], 12);
    map.addLayer(displayLayer);

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
    var profileDiagram = new Chart(ctx, {
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

function toggleLoginModal(){
    $("#register-modal").hide();
    $("#login-modal").toggle();
}

function toggleRegModal(){
    $("#login-modal").toggle();
    $("#register-modal").toggle();
}