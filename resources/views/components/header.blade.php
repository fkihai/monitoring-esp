<div class="app-header-inner">
    <div class="container-fluid py-2">
        <div class="app-header-content">
            <div class="row justify-content-center align-items-center">
                <div class="col text-center">
                    <span class="text-light">Sistem Monitoring Closed House</span>
                </div>
                <div class="col-auto text-white text-center text-sm-end">
                    <span id="datetime">{{ date('h:i:s', strtotime($data->created_at)) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
