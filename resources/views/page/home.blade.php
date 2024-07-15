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
                    {{$data->temp}} °C
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
                    {{$data->nh3}} %
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
@endsection

@section('realtime')
<script>
     $(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: '/realtime',
            type: 'GET',
            success: function(data) {
                $('#temp').text(data.temp);
                $('#hum').text(data.hum);
                $('#nh3').text(data.nh3);
                $('#fan1').prop('checked',data.fan1);
                $('#fan2').prop('checked',data.fan2);
                $('#fan3').prop('checked',data.fan3);
                $('#fan4').prop('checked',data.fan4);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data: " + error);
            }
        });
    }, 30000); // 60000 milliseconds = 1 minute
});
</script>
@endsection
