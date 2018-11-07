 <link href="/css/dewslandslide/chatterbox.css" rel="stylesheet" type="text/css">
<!-- ChatterBox CSS --> 
<link rel="stylesheet" type="text/css" href="/css/third-party/awesomplete.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<script src="/js/third-party/awesomplete.js"></script>
<script src="/js/third-party/handlebars.js"></script>
<script src="/js/third-party/moment-locales.js"></script>
<script src="/js/third-party/typeahead.js"></script>
<script src="/js/third-party/bootstrap-tagsinput.js"></script>
<script src="/js/third-party/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="/js/dewslandslide/communications_beta/cbx_variables.js"></script>
<script src="/js/dewslandslide/communications_beta/websocket_server.js"></script>

<script src="/js/dewslandslide/communications_beta/chatterbox_ui.js"></script>
<script type="text/javascript">
  first_name = "<?php echo $first_name; ?>";
  tagger_user_id = "<?php echo $user_id; ?>";
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div id="page-header">CHATTERBOX</div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div id="markers-panel" class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Messages
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified quick-access-tab">
                                <li role="presentation" class="active pointer"><a data-target="#registered" aria-controls="registered" role="tab" data-toggle="tab">Inbox</a></li>
                                <li role="presentation" class="pointer"><a data-target="#unknown" aria-controls="unknown" role="tab" data-toggle="tab">Unregistered</a></li>
                                <li role="presentation" class="pointer"><a data-target="#event-inbox" aria-controls="event-inbox" role="tab" data-toggle="tab">Event</a></li>
                                <li role="presentation" class="pointer"><a data-target="#datalogger" aria-controls="datalogger" role="tab" data-toggle="tab">Datalogger</a></li>
                             </ul>

                              <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="registered">
                                    <ul id="quick-inbox-display" class="list-group">
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="unknown">
                                    <ul id="quick-unregistered-inbox-display" class="friend-list"></ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="event-inbox">
                                    <ul id="quick-event-inbox-display" class="friend-list"></ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="datalogger">
                                    <ul id="datalogger-inbox-display" class="friend-list"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-primary" id="recent-activity-panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Recent Activity
                            </div>
                            <div class="col-sm-3 text-right">
                                <button type="button" class="btn btn-primary btn-xs" id="go-to-conversation">Conversation</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div id="surficial-plots"></div>
                    </div>
                </div>

                <div class="panel panel-primary" id="conversation-panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Conversation Panel
                            </div>
                            <div class="col-sm-3 text-right">
                                <button type="button" class="btn btn-primary btn-xs" id="go-recent-activity">Recent Activity</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div id="surficial-plots"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Conversation Panel
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div id="surficial-plots"></div>
                    </div>
                </div>
                 <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Quick Access
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div id="surficial-plots"></div>
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
                                        <option value="2">No</option>
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

<script src="/js/dewslandslide/communications_beta/initializer.js"></script>
<script src="/js/dewslandslide/communications_beta/cbx_main.js"></script>
<script src="/js/dewslandslide/communications_beta/event_handler.js"></script>
<script src="/js/dewslandslide/communications_beta/responsive.js"></script>