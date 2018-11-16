<!--
    
     Created by: Kevin Dhale dela Cruz
     
     A checker view for monitoring shift releases
     located at /application/views/reports/
     
     Linked at [host]/reports/accomplishment/checker
     
 -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/reports/accomplishment_checker.js"></script>

<style type="text/css">
	.v-middle { vertical-align: middle !important; }
</style>

<div id="page-wrapper">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="page-header">Monitoring Report <small>Shift Checker</small></div>
            </div>
        </div>

        <!-- Panel Div -->
        <form role="form" id="checkerForm" method="get">
        	<div class="row">
	        	<div class="form-group col-sm-6">
		            <label class="control-label" for="shift_start">Start of Shift</label>
		            <div class='input-group date datetime shift_start'>
		                <input type='text' class="form-control" id="shift_start" name="shift_start" placeholder="Enter timestamp" />
		                <span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
		            </div>        
	          	</div>

	        	<div class="form-group col-sm-6">
		            <label class="control-label" for="shift_end">End of Shift</label>
		            <div class='input-group date datetime shift_end'>
		                <input type='text' class="form-control" id="shift_end" name="shift_end" placeholder="Enter timestamp" />
		                <span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
		            </div>  
	          	</div>
        	</div>

		    <div class="row">
		    	<div class="col-md-12">
		    		<hr>
		   			<button type="submit" class="btn btn-primary btn-md pull-right" id="check">Check</button>
		   		</div>
		    </div>
		</form>

		<hr class="hr">

		<div class="panel panel-primary">
			<div class="panel-heading">
				Monitoring Shift
			</div>
	    	<div class="panel-body">
	    		<div class="row" id="reporters">
	    			<div class="col-sm-6 text-center">
	    				<strong>IOMP-MT :</strong>&emsp;<span id="mt">No monitoring personnel on-duty</span>
	    			</div>
	    			<div class="col-sm-6 text-center">
	    				<strong>IOMP-CT :</strong>&emsp;<span id="ct">No monitoring personnel on-duty</span>
	    			</div>
	    		</div>

	    		<hr>

    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<th class="text-center">Site</th>
    						<th class="text-center">Monitoring Releases</th>
    					</tr>
    				</thead>
    				<tbody id="reports">
    					<tr>
    						<td class="text-center td-padding" colspan="2">No monitoring events and releases for the shift</td>
    					</tr>
    				</tbody>
    			</table>
	    	</div>
	  	</div>
	</div> <!-- End of div container-fluid -->
</div> <!-- End of div page-wrapper -->