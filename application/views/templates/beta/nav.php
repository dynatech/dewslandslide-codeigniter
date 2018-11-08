
<div class="container">
    <div class="row" id="header-row">
        <div class="col-sm-8">
            <a class="navbar-brand" href="<?php echo base_url(); ?>home"><span id="project-name">PROJECT DYNASLOPE</span></a>
        </div>

        <div class="col-sm-4 text-right">
            <span><img id="dynaslope-logo" src="/images/beta/dynaslope-logo.png" /></span>
            <span class="nav-general-text text-center">
                <div>IMPLEMENTED</div>
                <div>AND FUNDED BY</div>
            </span>
            <span><img id="dost-phivolcs-logo" src="/images/beta/dost-phivolcs-logo.png" /></span>
        </div>
    </div>
</div>

<div class="nav-row" id="navigation">
    <ul>
        <span id="logo" class="col-sm-4" hidden><a href="<?php echo base_url(); ?>home">PROJECT DYNASLOPE</a></span>
        <span id="links">
        	<div class="row">
        		<div class="col-sm-offset-2 col-sm-7">
        			<li class="dropdown">
		        		<span class="dropdown-title">Monitoring</span>
		        		<div class="dropdown-content">
		                    <span class="dropdown-header">Site Alerts</span>
		                    <a href="<?php echo base_url(); ?>dashboard">Monitoring Dashboard</a>
		                    <a href="<?php echo base_url(); ?>monitoring/release_form">Early Warning Release Form</a>
		                    <a href="<?php echo base_url(); ?>monitoring/events">Monitoring Events Table</a>
		                	<hr class="divider" />
		                    <span class="dropdown-header">Communication</span>
		                    <a href="<?php echo base_url(); ?>communications/chatterbox_beta">Chatterbox</a>
		                    <a href="<?php echo base_url(); ?>communications/ewi_template">Early Warning Information Template Creator</a>
		                    <hr class="divider" />
		                    <span class="dropdown-header">Miscellaneous</span>
		                    <a href="<?php echo base_url(); ?>monitoring/faq">Manuals, Primer, and FAQs</a>
		                    <a href="<?php echo base_url(); ?>monitoring/issues_and_reminders">Monitoring Issues and Reminders</a>
		                    <a href="<?php echo base_url(); ?>gintags/manager">GINTAGs Manager</span></a>
		                    <a href="<?php echo base_url(); ?>site_info/index">Site information</span></a>
		                </div>
		        	</li>
		        	<li class="dropdown">
		        		<span class="dropdown-title">Analysis</span>
		        		<div class="dropdown-content">
		                    <span class="dropdown-header">Sensors and Rain Gauges</span>
		                    <a href="<?php echo base_url(); ?>analysis/site_analysis">Site Analysis</a>
		                    <a href="<?php echo base_url(); ?>analysis/rainfall_scanner">Rainfall Scanner</a>
		                    <a href="<?php echo base_url(); ?>analysis/surficial">Surficial Markers Page</a>
		                    <a href="<?php echo base_url(); ?>analysis/manifestations">Manifestations of Movement Page</a>
		                    <hr class="divider" />
		                    <span class="dropdown-header">Communication</span>
		                    <a href="<?php echo base_url(); ?>communications/responsetracker">Response Tracker</a>
		                    <a href="<?php echo base_url(); ?>generalinformation/index">Generic Information Tags</a>
		                </div>
		        	</li>
		        	<li class="dropdown">
		        		<span class="dropdown-title">Reports</span>
		        		<div class="dropdown-content">
		            		<span class="dropdown-header">End-Of-Shift Report and Narratives</span>
		                    <a href="<?php echo base_url(); ?>reports/accomplishment/form">Filing Form and Report Generator</a>
		                    <a href="<?php echo base_url(); ?>reports/accomplishment/checker">Shift Events and Releases Checker</a>
		                </div>
		        	</li>
        		</div>
        		<div class="col-sm-3 text-right">
        			<li class="dropdown">
		        		<span class="dropdown-title"><span class="fa fa-user"></span>&ensp;<span id="user_name"><?php echo "Kevin Dhale"; // echo $first_name; ?></span></span>
		        		<div class="dropdown-content">
		                    <a href="#"><small><span class="fa fa-user"></span></small>&ensp;Profile</a>
	                        <a href="#"><small><span class="fa fa-cog"></span></small>&ensp;Settings</a>
	                        <hr class="divider" />
	                        <a href="../../staff/all"><small><span class="fa fa-users"></span></small>&ensp;Staff Profile</a>
	                        <a href="../../logout"><small><span class="fa fa-power-off"></span></small>&ensp;Log Out</a>
		                </div>
		        	</li>
        		</div>
        	</div>
        </span>
    </ul>
</div>

<div class="modal fade js-loading-bar" id="loading" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="progress progress-popup">
                    <div class="progress-bar progress-bar-striped active" style="width: 100%">Loading...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function() {
    (function($) {
        "use strict";

        let $navbar = $("#navigation"),
            y_pos = $navbar.offset().top;

        $(document).scroll(function() {
            let scrollTop = $(this).scrollTop();

            if (scrollTop > y_pos) {
                $navbar.addClass("sticky");
                $navbar.find("#links").addClass("col-sm-8");
                $navbar.find("#logo").show();
                $("#page-wrapper").addClass("sticky-wrapper");
            } else if (scrollTop <= y_pos) {
                $navbar.removeClass("sticky");
                $navbar.find("#links").removeClass("col-sm-8").clearQueue();
                $navbar.find("#logo").hide();
                $("#page-wrapper").removeClass("sticky-wrapper");
            }
        });
    })(jQuery, undefined);
});
</script>