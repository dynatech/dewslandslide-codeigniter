<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/pms.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/crud_page.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/site_info/site_info.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-slider.min.css" />
<link rel="stylesheet" type="text/css" href="/css/dewslandslide/dewsresponsetracker.css" />
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-toggle.min.css">

<script src="/js/dewslandslide/communications_beta/dewsresponsetracker.js"></script>
<script src="/js/third-party/highcharts.js"></script>
<script src="/js/third-party/exporting.js"></script>
<script src="/js/third-party/bootstrap-slider.min.js"></script>
<script src="/js/third-party/bootstrap-toggle.min.js"></script>

<main class="page site_info">
    <section class="clean-block clean-cart">
        <div class="container">
            <div class="block-heading">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div id="title-page-container" class="container-line-text timeline-head-text">Response Tracker</div>
                    <span class="circle right"></span>
                </div>
            </div>

        </div>
    </section>
</main>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row col-md-3" id="reliability-row" >
            <div class="col-md-12" >
                <div class="panel panel-primary " id="tracker-filter-panel" >
                	<div class="panel-heading">Filter Options</div>
                	<div class="panel-body">
                		<div class="col-md-12 form-group hideable">
                			<label class="control-label " for="search_ec">Category</label>
                			<div id="filter-category">
                				<div class="input-group-btn">
                					<select class="form-control" name="category" id="category-selection">
                						<option disabled selected>---</option>
                						<option value="site">Site</option>
                						<option value="allsites">All Sites</option>
                						<option value="person">Person</option>
                					</select>
                				</div>
                			</div>
                		</div>
                		<div class="col-md-12">
			            	<div class="form-group hideable">
				                <label class="control-label" for="search_ec">Search</label>
				                <input type="text" class="form-control" id="filter-key" name="search_ec" placeholder="Search" disabled />
				            </div>
			            </div>
                       
			            <div class="col-md-12 form-group hideable">
			            	<label class="control-label " for="search_ec">Start Date</label>
			            	<div  id="date-selector-rtracker">
			            		<div class="input-group date datetime" id="entry">
			            			<input type="text" class="form-control" id="from-date" name="from-date" placeholder="Start date" aria-required="true" aria-invalid="false">
			            			<span class="input-group-addon">
			            				<span class="glyphicon glyphicon-calendar"></span>
			            			</span>
			            		</div>
			            	</div>
			            </div>
			            <div class="col-md-12 form-group hideable">
			            	<label class="control-label " for="search_ec">End Date</label>
			            	<div  id="date-selector-rtracker">
			            		<div class="input-group date datetime" id="entry">
			            			<input type="text" class="form-control" id="to-date" name="to-date" placeholder="End date" aria-required="true" aria-invalid="false">
			            			<span class="input-group-addon">
			            				<span class="glyphicon glyphicon-calendar"></span>
			            			</span>
			            		</div>
			            	</div>
			            </div>
			            <div class="col-md-12 form-group hideable">
			            	<label class="control-label " for="search_ec">Data Resolution</label>
			            	<div id="div-data-resolution">
			            		<select class="form-control" name="category" id="data-resolution">
			            			<option disabled >Data Resolution</option>
			            			<option selected value="hourly">Hourly</option>
			            			<option value="daily">Daily</option>
			            			<option value="weekly">Weekly</option>
			            			<option value="monthly">Monthly</option>
			            		</select>

			            	</div>
			            </div>
			            <div class="col-md-12 form-group hideable">
			            	<div id="filter-category-submit">
			            		<button type="button" class="btn btn-success" id="confirm-filter-btn" disabled>Confirm</button>  
			            	</div>
			            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-9" >   
            <div  id="reliability-pane" >
                <div class="panel panel-primary" id="reliability-panel">
                    <div class="panel-heading">Reliability</div>
                    <div class="panel-body">
                        <div id="reliability-chart-container"></div>
                    </div>
                </div>      
            </div>

           <div  id="adp-pane">
                <div class="panel panel-primary" id="average-delay-panel">
                    <div class="panel-heading">Average delay per reply</div>
                    <div class="panel-body">
                        <div id="average-delay-container"></div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    <div class="modal fade" id="response_tracker-loader-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1000000000;">

    	<div class="loader">
    		<div class="dot"></div>
    		<div class="dot"></div>
    		<div class="dot"></div>
    		<div class="dot"></div>
    		<div class="dot"></div>
    	</div>

    </div>
