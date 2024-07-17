'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

// CHART
window.chartColors = {
	green: '#75c181',
	blue: '#5b99ea',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

// Function to create line chart config
function createLineChartConfig(labels, datasets) {
    return {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
                align: 'start'
            },
            maintainAspectRatio: false,

            tooltip: {
                enabled: false
            },
            hover: {
                mode: null
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        drawBorder: false,
                        color: window.chartColors.border
                    },
                    scaleLabel: {
                        display: false
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        drawBorder: false,
                        color: window.chartColors.border
                    },
                    scaleLabel: {
                        display: false
                    },
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(value, index, values) {
                            return value.toLocaleString();
                        }
                    }
                }]
            }
        }
    };
}

const tempDatasets = [
    {
        label: 'Temp',
        backgroundColor: "rgba(255, 255, 255, 0.10)",
        borderColor: "rgba(117,193,129, 0.8)",
        data: window.tempData.slice().reverse()
    },
];
const humDatasets = [
    {
        label: 'Humidity',
        backgroundColor: "rgba(255, 255, 255, 0.10)",
        borderColor: "rgba(117,193,129, 0.8)",
        data: window.humData.slice().reverse()
    },
];
const nh3Datasets = [
    {
        label: 'NH3',
        backgroundColor: "rgba(255, 255, 255, 0.10)",
        borderColor: "rgba(117,193,129, 0.8)",
        data: window.nh3Data.slice().reverse()
    },
];

const labels = Array.from({ length: window.tempData.length }, (v, i) => i + 1);

const tempLineChartConfig = createLineChartConfig(labels, tempDatasets);
const humLineChartConfig = createLineChartConfig(labels, humDatasets);
const nh3LineChartConfig = createLineChartConfig(labels, nh3Datasets);

// Generate charts on load
window.addEventListener('load', function(){
	var lineChart = document.getElementById('chart-line-temp').getContext('2d');
	window.myLine = new Chart(lineChart, tempLineChartConfig);

	var lineChart = document.getElementById('chart-line-hum').getContext('2d');
	window.myLine = new Chart(lineChart, humLineChartConfig);

	var lineChart = document.getElementById('chart-line-nh3').getContext('2d');
	window.myLine = new Chart(lineChart, nh3LineChartConfig);
});
