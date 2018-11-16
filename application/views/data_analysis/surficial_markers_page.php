
<script type="text/javascript" src="/js/third-party/highcharts.js"></script>
<script type="text/javascript" src="/js/third-party/exporting.js"></script>
<script type="text/javascript" src="/js/third-party/no-data-to-display.js"></script>
<script type="text/javascript" src="/js/third-party/highcharts-more.js"></script>

<script type="text/javascript" src="/js/dewslandslide/data_analysis/site_analysis_main.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/surficial_plotter.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/surficial_markers_page.js"></script>

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div id="page-header">SURFICIAL MARKERS</div>
            </div>
        </div>

        <div class="row">
            <div id="column-1" class="col-sm-2">
                <div id="markers-panel" class="panel panel-primary">
                    <div class="panel-heading text-center">Site Markers</div>
                    <div class="panel-body">
                        <div>
                            <label class="control-label" for="site_code">Site Code</label>
                            <select class="form-control" id="site_code" name="site_code">
                                <option value="">---</option>
                                <?php foreach ($sites as $site): ?>
                                    <?php
                                        $sc = strtoupper($site->site_code);
                                        $address = "$sc ($site->barangay, $site->municipality, $site->province)";
                                    ?>
                                    <option value="<?php echo $site->site_code; ?>"><?php echo $address; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row"><hr class="options-divider"/></div>

                        <ul class="nav nav-pills nav-stacked">
                            <li class="text-center add-marker"><a>Add Marker</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="column-2" class="col-sm-8">
                <div id="marker-info-panel" class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Marker Information
                            </div>
                            <div class="col-sm-3 text-right">
                                <span id="marker-edit" class="fa fa-edit"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div class="row text-center">
                            <div class="col-sm-3">
                                <strong>Description:</strong>&emsp;<span class="description">Example</span>
                            </div>
                            <div class="col-sm-3">
                                <strong>Latitude:</strong>&emsp;<span class="latitude">Example</span>
                            </div>
                            <div class="col-sm-3">
                                <strong>Longitude:</strong>&emsp;<span class="longitude">Example</span>
                            </div>
                            <div class="col-sm-3">
                                <strong>In Use:</strong>&emsp;<span class="in_use">Example</span>
                            </div>
                       </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Graph
                            </div>
                            <div class="col-sm-3 text-right">
                                <div class="btn-group" id="surficial-duration">
                                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="surficial-duration-btn">
                                        3 months&emsp;<span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a data-value="7" data-duration="days">7 days</a></li>
                                        <li><a data-value="10" data-duration="days">10 days</a></li>
                                        <li><a data-value="2" data-duration="weeks">2 weeks</a></li>
                                        <li><a data-value="1" data-duration="month">1 month</a></li>
                                        <li class="active"><a data-value="3" data-duration="months">3 months</a></li>
                                        <li><a data-value="6" data-duration="months">6 months</a></li>
                                        <li><a data-value="1" data-duration="year">1 year</a></li>
                                        <li><a data-value="All" data-duration="">All</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div id="surficial-plots"></div>
                    </div>
                </div>
            </div>

            <div id="column-3" class="col-sm-2">
                <div id="history-panel" class="panel panel-primary">
                    <div class="panel-heading text-center">Marker History</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <!-- <li class="list-group-item text-center">
                                <div class="small">12/09/2018 19:30</div>
                                <div>Add</div>
                            </li>
                            <li class="list-group-item text-center">Second item</li>
                            <li class="list-group-item text-center">Third item</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="markers-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Surficial Marker Modal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="marker_name">Marker Name</label>
                                    <select class="form-control" id="marker_name" name="marker_name">
                                        <option value="">---</option>
                                        <?php foreach (range("A", "Z") as $char): ?>
                                            <option class="name-option" value="<?php echo $char; ?>"><?php echo $char; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="latitude">Latitude</label>
                                    <input type="number" step="0.1" min="0" class="form-control" id="latitude" name="latitude" placeholder="Enter latitude">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="longitude">Longitude</label>
                                    <input type="number" step="0.1" min="0" class="form-control" id="longitude" name="longitude" placeholder="Enter longitude">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea class="form-control" rows="4" id="description" name="description" placeholder="Enter description" maxlength="360"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="control-label" for="in_use">In Use</label>
                                    <select class="form-control" id="in_use" name="in_use">
                                        <option value="">---</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-marker" class="btn btn-danger submit-btn">Add Marker</button>
                    <button type="submit" id="update-marker" class="btn btn-danger submit-btn">Update Marker</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<div id="markers-data-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Surficial Marker Data Modal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong>Timestamp:</strong>&ensp;<span id="timestamp"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label" for="measurement">Measurement</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="measurement" name="measurement" placeholder="Enter measurement">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete-point" class="btn btn-danger submit-btn">Delete</button>
                    <button type="button" id="update-point" class="btn btn-danger submit-btn">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<div id="markers-verification-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Surficial Marker Verification Modal</h4>
                </div>
                <div class="modal-body">
                    <br />
                    <p>
                        Do you really want to <strong><span class="event">ADD</span></strong> <span class="marker-object">Marker A</span>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-marker" class="btn btn-danger submit-btn">Add Marker</button>
                    <button type="button" id="update-marker" class="btn btn-danger submit-btn">Update Marker</button>
                    <button type="button" id="delete-point" class="btn btn-danger submit-btn">Delete Data</button>
                    <button type="button" id="update-point" class="btn btn-danger submit-btn">Update Data</button>
                    <button type="button" class="btn btn-default cancel-btn" data-dismiss="modal">Cancel</button>
                </div>
            </form>    
        </div>
    </div>
</div>