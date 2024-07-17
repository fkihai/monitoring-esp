@extends('base')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="container mt-3">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">Temperature</h5>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <!-- Example using Font Awesome icons (adjust as needed) -->
                  <i class="fa-solid fa-temperature-high icon-large text-info"></i>
                </div>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <h2 id="temp">
                    {{ $data->temp }} &deg;C
                  </h2>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="container mt-3">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">Humidity</h5>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <!-- Example using Font Awesome icons (adjust as needed) -->
                  <i class="fas fa-tint icon-large text-info"></i>
                </div>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <h2 id="hum">
                    {{$data->hum}} %
                  </h2>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="container mt-3">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">NH3</h5>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <!-- Example using Font Awesome icons (adjust as needed) -->
                  <i class="fas fa-flask icon-large text-info"></i>
                </div>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <h2 id="nh3">
                    {{$data->nh3}} ppm
                  </h2>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="container">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">FAN 1</h5>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-switch display-4">
                        <input class="form-check-input" type="checkbox" id="fan1" disabled {{ $data->fan1 ? 'checked' : '' }}>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">FAN 2</h5>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-switch display-4">
                      <input class="form-check-input" type="checkbox" id="fan2" disabled {{ $data->fan2 ? 'checked' : '' }}>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">FAN 3</h5>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-switch display-4">
                      <input class="form-check-input" type="checkbox" id="fan3" disabled {{ $data->fan3 ? 'checked' : '' }}>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="card shadow-lg p-4 mb-5 bg-body rounded card-custom">
              <div class="card-body text-center">
                <h5 class="card-title mb-4">FAN 4</h5>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-switch display-4">
                      <input class="form-check-input" type="checkbox" id="fan4" disabled {{ $data->fan4 ? 'checked' : '' }}>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3 border-0">
                <h4 class="app-card-title">Temp</h4>
            </div>
            <div class="app-card-body p-4">
                <div class="chart-container">
                    <canvas id="chart-line-temp" ></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3 border-0">
                <h4 class="app-card-title">Humidity</h4>
            </div>
            <div class="app-card-body p-4">
                <div class="chart-container">
                    <canvas id="chart-line-hum" ></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3 border-0">
                <h4 class="app-card-title">NH3</h4>
            </div>
            <div class="app-card-body p-4">
                <div class="chart-container">
                    <canvas id="chart-line-nh3" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('realtime')

<script>
    window.tempData = @json($tempData);
    window.humData = @json($humData);
    window.nh3Data = @json($nh3Data);
    window.lengthState = @json($lengthState);
</script>

<script>
var lengthState  =  window.lengthState.length;
function parseDateTime(dateTimeString) {
    // Create a new Date object using the provided string
    const parsedDate = new Date(dateTimeString);

    // Check if the Date object is valid (parsing successful)
    if (parsedDate.toString() !== "Invalid Date") {
        // Extract and format the desired components
        const year = parsedDate.getFullYear();
        const month = parsedDate.getMonth() + 1; // Adjust month index (0-based to 1-based)
        const day = parsedDate.getDate();
        const hour = parsedDate.getHours();
        const minute = parsedDate.getMinutes();
        const second = parsedDate.getSeconds();

        // Example formatting (adjust as needed)
        const formattedDateTime = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}:${second.toString().padStart(2, '0')}`;

        return formattedDateTime;
    } else {
        // Handle invalid datetime string
        console.error("Invalid datetime format. Expected format: YYYY-MM-DDTHH:mm:ss.sssZ");
        return null;
    }
}

$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: '/realtime',
            type: 'GET',
            success: function(data) {
                $('#datetime').text(parseDateTime(data.dataLast.created_at));
                $('#temp').text(`${data.dataLast.temp} \u00B0C`);
                $('#hum').text(`${data.dataLast.hum} %`);
                $('#nh3').text(`${data.dataLast.nh3} ppm`);
                $('#fan1').prop('checked',data.dataLast.fan1 == 1 ? true : false);
                $('#fan2').prop('checked',data.dataLast.fan2 == 1 ? true : false);
                $('#fan3').prop('checked',data.dataLast.fan3 == 1 ? true : false);
                $('#fan4').prop('checked',data.dataLast.fan4 == 1 ? true : false);

                if(lengthState != data.stateDataLength.length){
                    tempChart(data.temp);
                    humChart(data.hum);
                    nh3Chart(data.nh3);
                    lengthState = data.stateDataLength.length;
                }

            },
            error: function(xhr, status, error) {
                console.error("Error fetching data: " + error);
            }
        });
    }, 1000); // 60000 milliseconds = 1 minute
});


function tempChart(data){
    const lineChartElement = document.getElementById('chart-line-temp');
    let tempChart = new Chart(lineChartElement.getContext('2d'), tempLineChartConfig);
    tempChart.data.datasets[0].data = data.slice().reverse();
    tempChart.data.labels = Array.from({ length: data.length }, (v, i) => i + 1);
    tempChart.update();
}

function humChart(data){
    const lineChartElement = document.getElementById('chart-line-hum');
    let humChart = new Chart(lineChartElement.getContext('2d'), humLineChartConfig);
    humChart.data.datasets[0].data = data.slice().reverse();
    humChart.data.labels = Array.from({ length: data.length }, (v, i) => i + 1);
    humChart.update();
}

function nh3Chart(data){
    const lineChartElement = document.getElementById('chart-line-nh3');
    let nh3Chart = new Chart(lineChartElement.getContext('2d'), nh3LineChartConfig);
    nh3Chart.data.datasets[0].data = data.slice().reverse();
    nh3Chart.data.labels = Array.from({ length: data.length }, (v, i) => i + 1);
    nh3Chart.update();
}











</script>
<script src="{{asset('plugins/chart.js/chart.min.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
@endsection
