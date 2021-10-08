var chartData = [       // Example data for chart
    ["2021-08-13",19],
    ["2021-08-15",8],
    ["2021-08-19",7],
    ["2021-08-22",22],
    ["2021-08-23",3],
    ["2021-08-27",9],
];

function startUp() { // body onload function
    mapStart();
    showRunsDiagram();
}

function mapStart() {
    // Create the map
    var map = L.map('display-map').setView([51.505, -0.09], 12);
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