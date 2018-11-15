<script type="text/javascript" src="/js/third-party/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/third-party/datatables.min.js"></script>
<script src="/js/dewslandslide/data_analysis/sensor_overview.js"></script>
<script src="<?php echo base_url(); ?>js/third-party/bootstrap-tagsinput.js"></script>

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="page-header">Dataloggers and Sensors Overview</div>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#deact-sensor"><strong>Deactivated Sensors</strong></a></li>
            <li><a data-toggle="tab" href="#logger-health"><strong>Datalogger Health</strong></a></li>
            <li><a data-toggle="tab" href="#rain-gauges"><strong>Rain Gauges</strong></a></li>
            <li><a data-toggle="tab" href="#soil-moisture"><strong>Soil Moisture</strong></a></li>
            <li><a data-toggle="tab" href="#piezometer"><strong>Piezometer</strong></a></li>
        </ul>

        </br>

        <div class="tab-content">
            <div id="deact-sensor" class="tab-pane fade in active"></div>
            <div id="logger-health" class="tab-pane fade in"></div>
            <div id="rain-gauges" class="tab-pane fade in"></div>
            <div id="soil-moisture" class="tab-pane fade in"></div>
            <div id="piezometer" class="tab-pane fade in"></div>
        </div>
    </div>

    <div class="col-sm-12" id="table-container" hidden="hidden">
        <div id="table-div">
            <h4 id="table-title" hidden="hidden"></h4>
            <table id="table-template" class="display table table-striped" cellspacing="0" width="100%" hidden="hidden">
                <thead id="header">
                    <tr>
                        <th class="text-left">Logger Name</th>
                        <th id="cheader" class="text-right">Number of Days Down</th>
                        <th id="removable">Data Presence</th>
                        <th id="removable" class="text-right">Last Data Available</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
                <tr id="row-template" hidden="hidden">
                    <td id="logger-name" class="text-left"></td>
                    <td id="time-delta" class="text-right"></td>
                    <td id="data-presence" class="text-left"></td>
                    <td id="last-data-available" class="text-right"></td>
                </tr>
                <tr id="deact-row-template" hidden="hidden">
                    <td id="logger-name" class="text-left"></td>
                    <td id="date-deactivated" class="text-right"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col-sm-12" id="deact-table-container" hidden="hidden">
        <div id="deact-sensor-div" class="col-sm-6">
            <h4 id="table-title" class="text-center" hidden="hidden"></h4>
            <table id="deact-sensor-template" class="display table table-striped" cellspacing="0" width="100%" hidden="hidden">
                <thead id="header">
                    <tr>
                        <th class="text-left">Logger Name</th>
                        <th class="text-right">Date Deactivated</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
                <tr id="deact-row-template" hidden="hidden">
                    <td id="logger-name" class="text-left"></td>
                    <td id="date-deactivated" class="text-right"></td>
                </tr>
            </table>
        </div>

        <div id="deact-logger-div" class="col-sm-6">
            <h4 id="table-title" class="text-center" hidden="hidden"></h4>
            <table id="deact-logger-template" class="display table table-striped" cellspacing="0" width="100%" hidden="hidden">
                <thead id="header">
                    <tr>
                        <th class="text-left">Logger Name</th>
                        <th class="text-right">Deactivated Date</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
                <tr id="deact-row-template" hidden="hidden">
                    <td id="logger-name" class="text-left"></td>
                    <td id="date-deactivated" class="text-right"></td>
                </tr>
            </table>
        </div>
    </div>
</div>