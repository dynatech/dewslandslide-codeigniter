
    
     Created by: Kevin Dhale dela Cruz
     
     A viewing table for individual monitoring events
     located at /application/views/public_alert/
     
     Linked at [host]/public_alert/monitoring_events/[release_id]
     
 -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/public_alert/monitoring_events_individual.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/public_alert/bulletin.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/public_alert/monitoring_events_individual.css">
<script src="<?php echo base_url(); ?>/js/third-party/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<div id="page-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header">EVENT MONITORING PAGE</div>          
            </div>          
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div id="site-code" class="container-line-text timeline-head-text"></div>
                    <span class="circle right"></span>
                </div>
                <h4 id="address"></h4>
                <h4 id="event_timeframe"></h4>
                <br>                      
            </div>
        </div>        
        <div id="timeline" class="row">
            <div class="col-sm-6" id="timeline-column-left">
                <ul class="timeline">
                    <li class="buffer"></li>
                </ul>
            </div>

            <div class="col-sm-6" id="timeline-column-right">
                <ul class="timeline">
                    <li class="buffer"></li>
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
                    <a href="#" id="edit-release-btn">
                        <span class="fa fa-edit" id="release_id"></span>
                    </a>
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
                Comments:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span class="comments">Dummy Comment</span></strong>
                <div class="row"><hr></div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-xs print" value="release_id">Show Bulletin</button>
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