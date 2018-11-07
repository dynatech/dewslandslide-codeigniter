
<script type="text/javascript" src="/js/third-party/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/third-party/datatables.min.js"></script>
<script src="/js/dewslandslide/data_analysis/sensor_overview.js"></script>
<script src="<?php echo base_url(); ?>js/third-party/bootstrap-tagsinput.js"></script>

<div id="page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div><h1 class="page-header">Sensor Overview Page</div>
      </div>
    </div>
    <div class="row">
      <ul class="nav nav-tabs nav-justified">
          <li class="active"><a data-toggle="tab" href="#deact-sensor"><strong>Deactivated Sensors</strong></a></li>
          <li><a data-toggle="tab" href="#deact-logger"><strong>Deactivated Dataloggers</strong></a></li>
          <li><a data-toggle="tab" href="#logger-health"><strong>Datalogger Health</strong></a></li>
          <li><a data-toggle="tab" href="#rain-gauges"><strong>Rain Gauges</strong></a></li>
          <li><a data-toggle="tab" href="#soil-moisture"><strong>Soil Moisture</strong></a></li>
          <li><a data-toggle="tab" href="#piezometer"><strong>Piezometer</strong></a></li>
        </ul>
    </div>
  </br>
    <div class="tab-content">
      <div id="deact-sensor" class="tab-pane fade in active">
      </div>
      <div id="deact-logger" class="tab-pane fade in">
      </div>
      <div id="logger-health" class="tab-pane fade in">
      </div>
      <div id="rain-gauges" class="tab-pane fade in">
      </div>
      <div id="soil-moisture" class="tab-pane fade in">
      </div>
      <div id="piezometer" class="tab-pane fade in">
      </div>
    </div>

    <div class="col-sm-12" id="table-container" hidden="hidden">
      <div id="table-div">
        <h4 id="table-title" hidden="hidden"></h4>
      <table id="table-template" class="display table table-striped" cellspacing="0"
      width="100%" hidden="hidden">
      <thead id="header">
        <tr>
          <th>Logger Name</th>
          <th id="cheader">Number of Days Down</th>
          <th class="removable">Data Presence</th>
          <th class="removable">Last Data Available</th>
        </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
        <tr id="row-template" hidden="hidden">
        <td id="logger-name"></td>
        <td id="time-delta"></td>
        <td id="data-presence"></td>
        <td id="last-data-available"></td>
      </tr>
      <tr id="deact-row-template" hidden="hidden">
        <td id="logger-name"></td>
        <td id="date-deactivated"></td>
      </tr>
    </table>
  </div>
  </div>
</div>
