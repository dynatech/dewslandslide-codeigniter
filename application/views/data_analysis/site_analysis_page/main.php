<!-- Highcharts Library -->
<script src="/js/third-party/highstock.js"></script>
<script src="/js/third-party/heatmap.js"></script>
<script src="/js/third-party/exporting.js"></script>
<script src="/js/third-party/no-data-to-display.js"></script>
<script src="/js/third-party/highcharts-more.js"></script>
<script src="/js/third-party/anime.min.js"></script>

<!-- Sticky Sidebar Library -->
<script src="/js/third-party/sticky-sidebar.js"></script>

<!-- Typeahead Tagsinput -->
<script src="/js/third-party/typeahead.js"></script>
<script src="/js/third-party/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<!-- Chart Plotter Files -->
<script type="text/javascript" src="/js/dewslandslide/data_analysis/site_analysis_main.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/rainfall_plotter.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/surficial_plotter.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/subsurface_column_plotter.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/subsurface_node_plotter.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/download_site_charts.js"></script>
<script type="text/javascript" src="/js/dewslandslide/data_analysis/data_tagging_plugin.js"></script>

<!-- CSS Files -->
<link rel="stylesheet" type="text/css" href="/css/dewslandslide/data_analysis/site_analysis.css">

<div class="center menu" id="data-tagging-container">
    <div id="data-tagging"></div>
</div>

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="page-header">Integrated Site Analysis</div>
            </div>
        </div>
        <div class="col-sm-3" id="options-bar" data-collapsed="false">
            <?php echo $options_bar; ?>
        </div>
        
        <div class="col-sm-9" id="main-plots-container">
            <div class="row">
                <ol class="breadcrumb">
                    <li class="main">Site Analysis Page</li>
                </ol>
            </div>

            <div class="section" id="site-plots-container" hidden>
                <?php echo $site_level_plots; ?>
            </div>

            <div class="section" id="subsurface-column-plots-container" hidden>
                <?php echo $subsurface_column_level_plots; ?>
            </div>

            <div class="section" id="subsurface-node-plots-container" hidden>
                <?php echo $subsurface_node_level_plots; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="chart-options" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Download Charts</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert" id="select-chart-message" hidden>
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 
                        Please select at least one chart to continue downloading.
                </div>

                <div class="row">
                    <div class="col-sm-12"><label>Site Level</label><br></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                            <label><input class="download-chart-checkbox" type="checkbox" value="rainfall">Rainfall</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                          <label><input class="download-chart-checkbox" type="checkbox" value="surficial">Surficial</label>
                        </div>
                    </div>
                </div>
                
                <div class="row"><hr/></div>

                <div class="row">
                    <div class="col-sm-12"><label>Column Level</label><br></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                          <label><input class="download-chart-checkbox" type="checkbox" value="node-health">Node Health</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                            <label><input class="download-chart-checkbox" type="checkbox" value="data-presence">Data Presence</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                            <label><input class="download-chart-checkbox" type="checkbox" value="communication-health">Communication Health</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                            <label><input class="download-chart-checkbox" type="checkbox" value="subsurface">Subsurface</label>
                        </div>
                    </div>
                </div>

                <div class="row"><hr/></div>

                <div class="row">
                    <div class="col-sm-12"><label>Node Level</label><br></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="checkbox">
                            <label><input class="download-chart-checkbox" type="checkbox" value="node">Node</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-sm" id="download-charts-selected">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download
                </button>
            </div>
        </div>
    </div>
</div>

<div id="site_svg">
    <?php echo $site_analysis_svg; ?>
</div>

<div class="modal fade" id="error-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Integrated Site Analysis Page</h4>
            </div>
            <div class="modal-body">
                <p>Problem loading some parts of this page:</p>
                <ul></ul>
                See console for error details.
            </div>
            <div class="modal-footer">
                <button id="cancel" class="btn btn-info" data-dismiss="modal" role="button">Okay</button>
            </div>
        </div>
    </div>
</div> <!-- End of MODAL AREA -->

<!-- Modal -->
<div class="modal fade" id="data-tagging-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document" id="data-tagging-modal-size">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="data-tagging-label">Data Tagging</h4>
      </div>
      <div class="modal-body">
        <div class="form-group hideable" id="charts-tagging-option">
            <label class="control-label" for="charts-option">Select Chart</label>
            <select class="form-control" id="charts-option" name="charts-option">
                <option value="rainfall">Rainfall</option>
                <option value="surficial">Surficial</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group hideable" id="data-tag-container">
                    <label class="control-label" for="tag_selected">Data Tag</label>
                    <input type="text" class="form-control" data-provide="typeahead" id="tag_selected" name="tag_selected" placeholder="E.g #DataTag" required />
                </div>
            </div>
        </div>
        <table class="table" id="tag-details">
            <thead>
                <tr>
                    <th>Table</th>
                    <th>Data Start</th>
                    <th>Data End</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="data_table">Mark</td>
                    <td id="data_start">Otto</td>
                    <td id="data_end">@mdo</td>
                </tr>
            </tbody>
        </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-enable-data-tagging">Enable</button>
        <button type="button" class="btn btn-primary" id="btn-save-data-tag">Save</button>
      </div>
    </div>
  </div>
</div>
