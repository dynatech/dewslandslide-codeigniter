<!--

     Created by: Kevin Dhale dela Cruz
     
     A viewing table for individual monitoring events
     located at /application/views/public_alert/
     
     Linked at [host]/public_alert/monitoring_events/[release_id]
     
 -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/public_alert/monitoring_events_individual.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/public_alert/bulletin.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/public_alert/monitoring_events_individual.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/public_alert/bulletin.css">
<script src="<?php echo base_url(); ?>/js/third-party/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<div id="page-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12 text-center">
                <div id="page-header">SITE ALERT MONITORING <small>Event Timeline</small></div>          
            </div>          
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div id="site-code" class="container-line-text timeline-head-text">---</div>
                    <span class="circle right"></span>
                </div>
                <h4 id="address" class="primary-color">---</h4>
                <h4 id="event_timeframe" class="primary-color">---</h4>            
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container-line bottom-line">
                    <span class="circle left"></span>
                    <span class="circle right"></span>
                </div>       
            </div>
        </div>      

        <div class="row">
            <div class="col-sm-12 text-center">
                <button id="sort-timeline" type="button" class="btn btn-primary" title="Sort timeline">
                    <span class="fa fa-angle-double-up"></span>
                </button>
            </div>    
        </div>

        <br/>

        <div id="timeline" class="row">
            <div class="col-sm-6" id="timeline-column-left">
                <ul class="timeline">
                </ul>
            </div>

            <div class="col-sm-6" id="timeline-column-right">
                <ul class="timeline">
                </ul>
            </div>
            <!-- END OF WHOLE TIMELINE DIV -->
        </div>
    </div>
</div>


<!-- TEMPLATES -->
<li id="ewi-card-template" class="timeline" hidden="hidden">
    <div class="timeline-panel ewi-card">
        <div class="timeline-heading">
            <div class="row">
                <div class="col-sm-2">
                    <div class="number-box">
                        <span>EWI</span>
                    </div>                                                                         
                </div>
                <div class="col-sm-9 head-column">
                    <h2 class="head"><span class="small card-title">Early Warning Release</span><span class="card-title-ts">September 25th 2018, 12:00 PM</span></h2>
                </div>
                <div class="col-sm-1 text-right">
                    <span class="fa fa-edit"></span>
                </div>                                
            </div>
        </div>
        <div class="timeline-body">
            <div class="row">
                <div class="col-sm-6">
                    Release Time: <strong><span class="release_time">2:43 DM</span></strong>
                </div>
                <div class="col-sm-6 text-right">
                    Internal Alert Level: <strong><span class="internal_alert_level">A3-sGmred</span></strong>
                </div>
            </div>
            
            <div class="row"><hr></div>

            <div class="triggers">
                <ul>
                </ul>
                <div class="row"><hr></div>
            </div>

            <div class="comments-div">
                Comments:&ensp;<strong><span class="comments">Dummy Comment</span></strong>
                <div class="row"><hr></div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-xs print">Show Bulletin</button>
                </div>
                <div class="col-sm-9 reporters text-right">
                    <span class="mt">Reporter MT</span> | <span class="ct">Reporter CT</span>
                </div>
            </div>
        </div>
    </div>
</li>

<li id="narrative-card-template" class="timeline-inverted" hidden="hidden">
    <div class="timeline-panel narrative-card">
        <div class="timeline-heading">
            <div class="row">
                <div class="col-sm-2">
                    <div class="number-box-narrative">
                        <span>NAR</span>
                    </div>                                                      
                </div>
                <div class="col-sm-10 narrative-title">
                    Narrative | <span class="narrative-ts">September 25th 2018, 12:05 PM</span>
                </div>
            </div>
        </div>
        <div class="timeline-body">
            "<span class="narrative-span">
                "Called  LEWC Maryann Bugtong to inform her about the lowering of alert to A0, she responded and aske her to relay the information to BLGU."
            </span>"
        </div>
    </div>
</li> 

<li id="eos-card-template" class="timeline" hidden="hidden">
    <div class="timeline-panel eos-card">
        <div class="timeline-heading">
            <!-- <h4 class="timeline-title">Title</h4> -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="number-box">
                        <span>EOS</span>
                    </div>                                                                         
                </div>
                <div class="col-sm-10 head-column">
                    <h2 class="head"><span class="small card-title">End-of-Shift Analysis</span><span class="card-title-ts">September 25th 2018, 8:30 AM</span></h2>
                </div>                                
            </div>
        </div>
        <div class="timeline-body">                               
            <div class="analysis-div">
                <strong>DATA ANALYSIS:</strong><br />- <em>Subsurface data: <strong>LABB</strong> - All node movements are within noise range. <strong>LABT</strong> - Node 1 across slope shows big fluctuations which might be caused by temperature changes. The rest of node movements are within noise range. </em><br />- <em>Surficial data: No surficial data received from LEWC</em><br />- <em>Rainfall data:&nbsp;LABTW - both 1- and 3-day cumulative rainfall data are below their respective thresholds. 1-day cumulative plot is showing a continuous downward trend while the 3-day cumulative plot stabilizes. A peak of 23mm rainfall was recorded during the shift around 3 PM.</em>
            </div>
            <div class="row"><hr></div>                                
            <div class="row">
                <div class="col-sm-12 reporters text-right">
                    <span class="mt">Reporter MT</span> | <span class="ct">Reporter CT</span>
                </div>
            </div>
        </div>
    </div>
</li>

<!-- MODALS -->

<!-- Modal for EDIT Entry -->
<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Early Warning Information Release Entry</h4>
            </div>
            <form id="modalForm" name='form' role='form'>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label" for="data_timestamp">Data Timestamp</label>
                        <div class='input-group date datetime'>
                            <input type='text' class="form-control" id="data_timestamp" name="data_timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="release_time">Time of Release</label>
                        <div class='input-group date time' >
                            <input type='text' class="form-control" id="release_time" name="release_time" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>
                </div>
                <div id="od_area" hidden="hidden">
                    <div class="row line"><hr></div>
                    <div class="row">
                        <div class="col-sm-3 text-center area_label"><h4><b>ON-DEMAND</b></h4></div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="trigger_od">Request Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control trigger_time" id="trigger_od" name="trigger_od" placeholder="Enter timestamp" disabled="disabled" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="trigger_od_info">Requested by</label>
                                    <div class="input-group">
                                        <label class="checkbox-inline"><input type="checkbox" class="od_group" name="llmc" value="llmc" disabled="disabled">LEWC</label>
                                        <label class="checkbox-inline"><input type="checkbox" class="od_group" name="lgu" value="lgu" disabled="disabled">LGU</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="reason">Reason for Request</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon3">Monitoring requested due to</span>
                                        <textarea class="form-control" rows="1" id="reason" name="reason" placeholder="Enter reason for request." maxlength="200" aria-describedby="basic-addon3" disabled="disabled"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="trigger_od_info">Current Site Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_od_info" name="trigger_od_info" placeholder="Enter basic site details" maxlength="200" disabled="disabled"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!------ END OF ON-DEMAND ------>
                <div id="rain_area" hidden="hidden">
                    <div class="row line"><hr></div>
                    <div class="row">
                        <div class="col-sm-3 text-center area_label"><h4><b>RAINFALL</b></h4></div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="trigger_rain">Trigger Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control" id="trigger_rain" name="trigger_rain" disabled="disabled"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="trigger_rain_info">Technical Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_rain_info" name="trigger_rain_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                                                
                </div>
                <div id="eq_area" hidden="hidden">
                    <div class="row line"><hr></div>
                    <div class="row">
                        <div class="col-sm-4 text-center area_label"><h4><b>EARTHQUAKE</b></h4></div>
                        <div class="form-group col-sm-8">
                            <label for="trigger_eq">Trigger Timestamp</label>
                            <div class='input-group date datetime'>
                                <input type='text' class="form-control" id="trigger_eq" name="trigger_eq" disabled="disabled"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="magnitude">Magnitude</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="magnitude" name="magnitude" disabled="disabled">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="latitude">Latitude</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="latitude" name="latitude" disabled="disabled">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="longitude">Longitude</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="longitude" name="longitude" disabled="disabled">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="trigger_eq_info">Technical Info:</label>
                            <textarea class="form-control trigger_info" rows="1" id="trigger_eq_info" name="trigger_eq_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                        </div>      
                    </div>
                                  
                </div>
                 <div id="ground_area" hidden="hidden">
                    <div class="row line"><hr></div>
                    <div class="row">
                        <div class="col-sm-3 text-center area_label"><h4><b>GROUND</b></h4></div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="trigger_ground_1">L2 (g) Trigger Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control" id="trigger_ground_1" name="trigger_ground_1" disabled="disabled"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="trigger_ground_2">L3 (G) Trigger Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control" id="trigger_ground_2" name="trigger_ground_2" disabled="disabled"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="trigger_ground_1_info">Technical Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_ground_1_info" name="trigger_ground_1_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="trigger_ground_2_info">Technical Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_ground_2_info" name="trigger_ground_2_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>
                <div id="sensor_area" hidden="hidden">
                    <div class="row line"><hr></div>
                    <div class="row">
                        <div class="col-sm-3 text-center area_label"><h4><b>SENSOR</b></h4></div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="trigger_sensor_1">L2 (g) Trigger Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control" id="trigger_sensor_1" name="trigger_sensor_1" disabled="disabled"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="trigger_sensor_2">L3 (G) Trigger Timestamp</label>
                                    <div class='input-group date datetime'>
                                        <input type='text' class="form-control" id="trigger_sensor_2" name="trigger_sensor_2" disabled="disabled"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="trigger_sensor_1_info">Technical Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_sensor_1_info" name="trigger_sensor_1_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="trigger_sensor_2_info">Technical Info:</label>
                                    <textarea class="form-control trigger_info" rows="1" id="trigger_sensor_2_info" name="trigger_sensor_2_info" placeholder="Enter basic technical detail" maxlength="200" disabled="disabled"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row line"><hr></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" rows="3" id="comments" name="comments" maxlength="256" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="update" class="btn btn-danger" role="button" type="submit">Update</button>
            </div>
            </form>
        </div>
    </div>
</div> <!-- End of EDIT Modal -->
<!-- EWI MODAL -->

<!-- Modal for Successful Entry -->
<div class="modal fade" id="outcome" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Entry</h4>
            </div>
            <div class="modal-body">
                <p>Entry successfully updated!</p>
            </div>
            <div class="modal-footer">
                <button id="refresh" class="btn btn-primary" role="button" type="submit">Okay</button>
            </div>
        </div>
    </div>
</div> <!-- End of SUCCESS Modal -->

<!-- IMPORT BULLETIN MODALS -->
<?php echo $bulletin_modals; ?>