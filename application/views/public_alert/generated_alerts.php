<script src="<?php echo base_url(); ?>js/dewslandslide/public_alert/generated_alerts.js"></script>

<h2 id="invalid-header" hidden="hidden"><strong>Invalid Alerts</strong></h2>
<div id="invalid-alerts-group">
	<div id="invalid-panel-template" class="alert alert-danger" hidden="hidden">
		<div class="row">
			<div class="col-sm-3">
				<strong>
					<span id="invalid-site-code"></span> | 
					<span id="invalid-timestamp"></span> | 
					<span id="invalid-alert-symbol"></span>
				</strong>
			</div>
			<div class="col-sm-6">
				<strong><span id="invalid-remarks"></span></strong>
			</div>
			<div class="col-sm-3 text-right">
				<strong><span id="invalid-iomp"></span></strong>
			</div>
		</div>
	</div>
</div>

<h2 id="alert-header" hidden="hidden"><strong>Site Alerts</strong></h2>
<div class="panel-group" id="alerts-panel-group">
	<div class="panel panel-info" id="alert-panel-template" hidden="hidden">
		<div class="panel-heading" data-toggle="collapse" href="#collapse1">
			<h4 class="panel-title">
				<div class="row">
					<div class="col-xs-6">
						<small id="alert-timestamp"></small> | 
						<b><i id="alert-site-code"></i></b> | 
						<span id="alert-symbol"></span>
					</div>
					<div class="col-xs-6 text-right">
						<span class="badge" id="alert-validity"></span>
					</div>
				</div>
			</h4>
		</div>
		<div class="panel-collapse collapse">
			<div class="panel-body">
				<div class="panel-collapse collapse in" aria-expanded="true">
					<div class="panel-body text-dark">
						<div class="row" id="panel-table-row">
							<div class="col-sm-4" id="table-template" hidden="hidden">
								<label><u></u></label>
								<table class="table table-hover table-condensed">
									<thead>
										<tr>
											<th class="table-header-1"></th>
											<th class="table-header-2"></th>
										</tr>
									</thead>
									<tbody id="inside-panel-table">
										<tr id="inside-panel-row" hidden="hidden">
											<td id="column-1"></td>
											<td id="column-2"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="tech-info-area">
							<div class="row" >
								<div class="col-sm-12"><h3><u>Technical Info</u></h3></div>
							</div>
							<div class="row" id="tech-info-row">
								<div class="col-sm-12" id="tech-info-template" hidden="hidden">
									<span id="tech-info-source"><strong></strong>:</span>
									<span id="tech-info-text"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 id="no-alert-header" hidden="hidden"><strong>Sites with No Alerts</strong></h2>
<div class="panel-group" id="no-alerts-panel-group">
	<div class="panel panel-success" id="no-alert-panel-template" hidden="hidden">
		<div class="panel-heading" data-toggle="collapse" href="#collapse1">
			<h4 class="panel-title">
				<div class="row">
					<div class="col-xs-6">
						<small id="no-alert-timestamp"></small> | 
						<b><i id="no-alert-site-code"></i></b> | 
						<span id="no-alert-symbol"></span>
					</div>
				</div>
			</h4>
		</div>
		<div class="panel-collapse collapse">
			<div class="panel-body">
				<div class="panel-collapse collapse in" aria-expanded="true">
					<div class="panel-body text-dark">
						<div class="row" id="panel-table-row">
							<div class="col-sm-4" id="table-template" hidden="hidden">
								<label><u></u></label>
								<table class="table table-hover table-condensed">
									<thead>
										<tr>
											<th class="table-header-1"></th>
											<th class="table-header-2"></th>
										</tr>
									</thead>
									<tbody id="inside-panel-table">
										<tr id="inside-panel-row" hidden="hidden">
											<td id="column-1"></td>
											<td id="column-2"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<label class="text-danger" id="no-sub-sensor" hidden="hidden">No Subsurface Sensors...</label>