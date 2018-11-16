
<!-- ChatterBox CSS --> 
<link rel="stylesheet" type="text/css" href="/css/third-party/awesomplete.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">
<link href="/css/dewslandslide/chatterbox.css" rel="stylesheet" type="text/css">
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
            <div class="col-sm-4">

                <div class="panel panel-primary" id="quick-access-panel" hidden>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Quick Access
                            </div>
                            <div class="col-sm-3 text-right">
                                <span class="pointer bug fa fa-bug" hidden></span>
                                <span id="hide-quick-access" class="pointer fa fa-envelope" title="Inbox"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <ul class="nav nav-tabs nav-justified quick-access-tab">
                            <li class="active pointer"><a data-toggle="tab" data-target="#quick-release">Site with Event</a></li>
                            <li class="pointer"><a data-toggle="tab" data-target="#group-message">Group Message</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="quick-release" class="tab-pane fade in active">
                                <ul id="quick-release-display" class="friend-list"></ul>
                            </div>
                            <div id="group-message" class="tab-pane fade">
                                <ul id="group-message-display" class="friend-list"></ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="messages-panel" class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Messages
                            </div>
                            <div class="col-sm-3 text-right">
                                <span class="pointer bug fa fa-bug" hidden></span>
                                <span id="network-reference" class="pointer fa fa-signal" title="Cellular Network Reference"></span>
                                <span id="go-to-quick-access" class="pointer fa fa-bars" title="Quick Access"></span>
                                <span id="options" class="pointer fa fa-cogs" title="Options"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 form-group">
                            <div class="text-center" id="options-panel" hidden><br>
                                <!-- <div class="panel panel-default"> -->
                                    <!-- <div class="panel-body"> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary btn-xs btn-block" id="btn-contact-settings">
                                                    <span class="pointer fa fa-address-book"></span> Contact Settings
                                                </button><br>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary btn-xs btn-block" id="btn-advanced-search">
                                                    <span class="pointer fa fa-check-square"></span> Quick Site Selection
                                                </button><br>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary btn-xs btn-block" id="btn-gbl-search">
                                                    <span class="pointer fa fa-search"></span> Quick Search
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary btn-xs btn-block" id="btn-automation-settings">
                                                    <span class="pointer fa fa-clock"></span> Semi-Automation Settings
                                                </button>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div><br>

                            <div class="input-group" id="contact-suggestion-container">
                                <input type="text" class="awesomplete form-control dropdown-input" id="contact-suggestion" placeholder="Type name..." data-multiple />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="go-chat" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified quick-access-tab">
                            <li role="presentation" class="active pointer"><a data-target="#registered" aria-controls="registered" role="tab" data-toggle="tab">Inbox</a></li>
                            <li role="presentation" class="pointer"><a data-target="#unknown" aria-controls="unknown" role="tab" data-toggle="tab">Unregistered</a></li>
                            <li role="presentation" class="pointer"><a data-target="#event-inbox" aria-controls="event-inbox" role="tab" data-toggle="tab">Event</a></li>
                            <li role="presentation" class="pointer"><a data-target="#datalogger" aria-controls="datalogger" role="tab" data-toggle="tab">Datalogger</a></li>
                         </ul>

                          <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="row" id="inbox-loader">
                                <div class="col-md-offset-4 col-md-5">
                                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="registered">
                                <ul id="quick-inbox-display" class="friend-list">
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

                <div id="network-panel" class="panel panel-primary" hidden>
                    <div class="panel-heading text-center">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Network Reference
                            </div>
                            <div class="col-sm-3 text-right">
                                <span class="pointer bug fa fa-bug" hidden></span>
                                <span id="hide-network-display" class="pointer fa fa-envelope" title="Inbox"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 form-group">
                            <div class="row">
                               
                                <div class="col-sm-12 text-center">
                                    <hr>GLOBE<hr>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0817</div>
                                    <div class="col-sm-2">0905</div>
                                    <div class="col-sm-2">0906</div>
                                    <div class="col-sm-2">0915</div>
                                    <div class="col-sm-2">0916</div>
                                    <div class="col-sm-2">0917</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0926</div>
                                    <div class="col-sm-2">0927</div>
                                    <div class="col-sm-2">0935</div>
                                    <div class="col-sm-2">0936</div>
                                    <div class="col-sm-2">0937</div>
                                    <div class="col-sm-2">0945</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0955</div>
                                    <div class="col-sm-2">0956</div>
                                    <div class="col-sm-2">0965</div>
                                    <div class="col-sm-2">0966</div>
                                    <div class="col-sm-2">0975</div>
                                    <div class="col-sm-2">0967</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0977</div>
                                    <div class="col-sm-2">0994</div>
                                    <div class="col-sm-2">0995</div>
                                    <div class="col-sm-2">0996</div>
                                    <div class="col-sm-2">0997</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <hr>SMART<hr>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0813</div>
                                    <div class="col-sm-2">0907</div>
                                    <div class="col-sm-2">0908</div>
                                    <div class="col-sm-2">0909</div>
                                    <div class="col-sm-2">0910</div>
                                    <div class="col-sm-2">0911</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0912</div>
                                    <div class="col-sm-2">0913</div>
                                    <div class="col-sm-2">0914</div>
                                    <div class="col-sm-2">0918</div>
                                    <div class="col-sm-2">0919</div>
                                    <div class="col-sm-2">0920</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0921</div>
                                    <div class="col-sm-2">0928</div>
                                    <div class="col-sm-2">0929</div>
                                    <div class="col-sm-2">0930</div>
                                    <div class="col-sm-2">0938</div>
                                    <div class="col-sm-2">0939</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0940</div>
                                    <div class="col-sm-2">0946</div>
                                    <div class="col-sm-2">0947</div>
                                    <div class="col-sm-2">0948</div>
                                    <div class="col-sm-2">0949</div>
                                    <div class="col-sm-2">0950</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0951</div>
                                    <div class="col-sm-2">0989</div>
                                    <div class="col-sm-2">0970</div>
                                    <div class="col-sm-2">0981</div>
                                    <div class="col-sm-2">0989</div>
                                    <div class="col-sm-2">0992</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0998</div>
                                    <div class="col-sm-2">0922</div>
                                    <div class="col-sm-2">0923</div>
                                    <div class="col-sm-2">0924</div>
                                    <div class="col-sm-2">0925</div>
                                    <div class="col-sm-2">0931</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0932</div>
                                    <div class="col-sm-2">0933</div>
                                    <div class="col-sm-2">0934</div>
                                    <div class="col-sm-2">0942</div>
                                    <div class="col-sm-2">0941</div>
                                    <div class="col-sm-2">0943</div>
                                </div>
                                <div class="col-sm-12 network-container">
                                    <div class="col-sm-2">0944</div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>

            <div class="col-sm-8" id="chatterbox-main-container">

                <div class="panel panel-primary" id="recent-activity-panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                Recent Activity
                            </div>
                            <div class="col-sm-3 text-right">
                                <span class="pointer bug fa fa-bug" hidden></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                         <div class="panel-body activity-body">
                            <div class="row form-group">
                                <h4>Recently Viewed Contacts</h4>
                                <div class="rv_contacts">
                                </div>
                            </div>
                            <div class="row form-group">
                                <h4>Recently Viewed Sites</h4>
                                <div class="rv_sites">
                                </div>
                            </div>
                            <div class="row form-group" style="padding: 15px;">
                                <h4>Routine Section</h4>
                                <div class="routine_section">
                                    <br>
                                    <div class="col-md-12"><label id="def-recipients" hidden>Default recipients: LEWC</label></div>
                                    <div class="col-md-12">
                                        <div id="routine-message-container">
                                          <!-- Nav tabs -->
                                          <ul class="nav nav-tabs" role="tablist" id="routine-tabs">
                                            <li role="presentation" class="active" id="routine-reminder-option"><a href="#reminder_tab" aria-controls="reminder_tab" role="tab" data-toggle="tab">Reminder Message</a></li>
                                            <li role="presentation" id="routine-actual-option"><a href="#routine_tab" aria-controls="routine_tab" role="tab" data-toggle="tab">Routine Message</a></li>
                                          </ul>

                                          <!-- Tab panes -->
                                          <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="reminder_tab">
                                                <br>
                                                <textarea class="form-control" id="routine-reminder-message" cols="30" rows="10">Loading message. . . </textarea>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="routine_tab">
                                                <br>
                                                <textarea class="form-control" id="routine-default-message" cols="30" rows="10">Loading message. . .</textarea>
                                            </div>
                                          </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"><br><button type="button" class="btn btn-primary" id="send-routine-message" hidden>Send Message</button></div>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="panel panel-primary" id="conversation-panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 text-center" id="conversation-details">
                                Conversation Panel
                            </div>
                            <div class="col-sm-3 text-right">
                                <span class="pointer bug fa fa-bug" hidden></span>
                                <span id="go-to-recent-activity" class="pointer fa fa-hourglass" title="Recent Activity"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       <div class="panel-body chatbox-padding">
                        <div class="form-group">
                            <div class="chat-message">
                                <ul id="messages" class="chat"></ul>
                            </div>
                            <div style="padding: 15px;">
                                <textarea id="msg" name="msg" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4 text-center" id="chatbox-warning" hidden>
                                    <div class="alert alert-info" role="alert">
                                        <b>Message cannot leave blank</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px; margin-top: -20px;">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" id="send-msg">Send Message</button>
                                <br>
                                <br>
                                <a data-target="#" id="btn-ewi" data-toggle="modal" data-dismiss="modal">Load Message Templates</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="chatterbox-loader-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1000000000;">
    <div class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

</div>

<!-- EWI MODAL -->
    <div class="modal fade col-lg-12" id="early-warning-modal" role="dialog">
      <div class="modal-dialog modal-md" id="ewi-modal-cs-dialog">
        <div class="modal-content" id="ewi-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>EARLY WARNING INFORMATION</h4>
          </div>
          <div class="modal-body row-fluid">
            <div class="ewi-container">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group" id="site-group">
                    <label for="sites">Sites :</label>
                    <select name="" id="sites" name="sites" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group" id="site-group">
                    <label for="alert_status">Alert Status :</label>
                    <select name="" id="alert_status" name="alert_status" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="ewi-date-picker">Time of release :</label>
                    <div class='input-group date' id='ewi-date-picker'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group" id="alert-group">
                    <label for="alert-lvl">Alert Level :</label>
                    <select name="" id="alert-lvl" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group" id="alert-group">
                    <label for="internal-alert">Internal Alert :</label>
                    <select name="" id="internal-alert" class="form-control">
                    </select>
                  </div>
                </div>
              </div>
              <hr>
                <div class="row">
                  <div class="col-sm-6">
                          <div class="form-group" id="#">
                        <label for="#">Rainfall Information for :</label>
                        <select name="" id="rainfall-sites" class="form-control">
                            <option value="#" default>---</option>
                            <option value="SAMAR-SITES">Samar Sites</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                      <label for="ewi-date-picker">As of :</label>
                        <div class='input-group date' id='rfi-date-picker'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="#">Cummulative:</label>
                        <select name="" id="rainfall-cummulative" class="form-control">
                            <option value="1d" default>1-Day</option>
                            <option value="3d">3-Day</option>
                        </select>
                    </div>
                </div>
            </div>
          </div>
            <div class="modal-footer">
                <div class="form-group cmd-ewi-chatterbox right-content">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" value="submit" id="confirm-ewi" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- END EWI MODAL -->

    <div class="modal fade" id="ground-meas-reminder-modal" tabindex="-1" role="dialog" aria-labelledby="groundMeasReminderModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="sms-reminder-modal-title" name="sms-reminder-modal-title">Ground Measurement / Observation Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="ground-meas-scrollable-div">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="category">Monitoring Type:</label>
                                    <select class="form-control" id="gnd-meas-category">
                                        <option value="event">Event Monitoring</option>
                                        <option value="extended">Extended Monitoring</option>
                                        <option value="routine">Routine Monitoring</option>
                                    </select>
                                </div>                                
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">PLEASE TAKE NOTE: The ground data reminder will be automatically sent to intended recipients at the prescribed time after changes (if any) have been saved.</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Reminder Recipients: <strong>LEWC</strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Site Selection</h4>
                                        <div class="gndmeas-reminder-site-container">
                                            <div id="gnd-sitenames-0" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-1" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-2" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-3" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-4" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-5" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>                                          
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-info" id="no-site-on-monitoring">
                                            <div class="panel-heading" id="no-site-on-monitoring-msg"></div>
                                        </div>
                                    </div>                  
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h4>Reminder Message</h4>
                                <div class="form-group">
                                    <label for="reminder-message" id="label-reminder-message">You can edit the message to be sent to the community.</label>
                                    <textarea class="form-control" rows="8" id="reminder-message" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row"><hr/></div>
                        
                        <div id="special-case-container"></div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="button" id="add-special-case" class="btn btn-info" role="button"><i class="fas fa-plus"></i> Add Special Case</button>
                            </div>
                        </div>

                        <!-- START OF HIDDEN ROW - to be used for appending special cases. -->
                        <div class="special-case-template" id="special-case-template" hidden="hidden"> 
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span class="input-group-btn">
                                        <button class="remove btn btn-danger" type="button">X</button>
                                    </span>
                                </div>
                            </div>
                            <div id="special-case-body" class="row gnd-settings-container">
                                <div class="col-sm-6"> <!-- SET A CLASSNAME FOR THIS SHIT -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Special Reminder Recipients</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Site Selection</h4>
                                            <div id="special-case-sites" class="special-case-site-container">

                                            </div>
                                        </div>                     
                                    </div>
                                </div>
                                <div class="col-sm-6"> <!-- SET A CLASSNAME FOR THIS SHIT -->
                                    <h4>Special Reminder Message</h4>
                                    <div class="form-group">
                                        <label for="special-case-message" id="label-reminder-message">You can edit the message to be sent to the community.</label>
                                        <textarea class="form-control special-case-message-container" rows="8" id="special-case-message" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><hr/></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="reset-button" class="btn btn-default"><i class="fas fa-eraser"></i> Reset Templates</button>
                            <button type="button" id="save-gnd-meas-settings-button" class="btn btn-primary"><i class="pointer fa fa-save" aria-hidden="true"></i> Save Templates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="quick-search-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Quick Search</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group hideable">
                    <label class="control-label" for="search_via">Seach via</label>
                        <select class="form-control" name="search_via" id="search-via">
                            <option value="0">---------------------</option>
                            <option value="messages">via Message</option>
                            <option value="gintags">via Gintags</option>
                            <option value="ts_sent">via Timestamp Sent</option>
                            <option value="ts_written">via Timestamp Written</option>
                            <option value="unknown">via Unknown Numbers</option>
                        </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group hideable">
                    <label class="control-label" for="search_keyword">Search Keyword</label>
                        <input type="text" class="form-control" id="search-keyword" name="search-keyword" placeholder="E.g Magandang Umaga" required />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group hideable">
                    <label class="control-label" for="search_limit">Search Limit</label>
                        <input type="number" class="form-control" id="search-limit" name="search-limit" placeholder="E.g 1" required />
                </div>
            </div>
            <div class="col-md-8">
                <div class="pull-right quick-search-top-margin">
                    <button type="button" class="btn btn-default" id="clear-search">Clear</button>
                    <button type="button" class="btn btn-primary" id="submit-search">Search</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="search-global-message-container">
            <div class="result-message">
                <ul id="search-global-result" class="chat">
                </ul>
                <div style="display: table;margin: 0 auto;">
                    <ul class="pagination-sm" id="searched-key-pages" style="display: table-cell;" hidden></ul>
                </div>
            </div>
        </div>
            
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade col-lg" id="advanced-search" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-info">Quick Group Selection of Recipients</h4>
          </div>
          <div class="modal-body row-fluid">

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" data-target="#comm-group" id="comm-grp-flag">Community Group Selection</a></li>
              <li><a data-toggle="tab" data-target="#emp-group" id="emp-grp-flag">Employee Group Selection<i class="text-warning"> *BETA*</i></a></li>
            </ul>

            <div class="tab-content grp-selection">
              <div id="comm-group" class="tab-pane fade in active">
                <div class="row form-group">
                  <p>Select Offices:
                    <button id="checkAllOffices" type="button" class="btn btn-primary btn-xs">Check All</button>
                    <button id="uncheckAllOffices" type="button" class="btn btn-info btn-xs">Uncheck All</button>
                  </p>
                  <div id="modal-select-offices">
                    <div id="offices-0" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="offices-1" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="offices-2" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="offices-3" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="offices-4" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="offices-5" class="col-md-2 col-sm-2 col-xs-2"></div>
                  </div>
                </div>
                <div class="row form-group">
                  <p>Early Warning Information Recipients:</p>
                  <div id="modal-select-recipients">
                    <label class="radio-inline"><input type="radio" name="opt-ewi-recipients" value="false" checked="true">All</label>
                    <label class="radio-inline"><input type="radio" name="opt-ewi-recipients" value="true" checked="true">Only selected EWI Receivers</label>
                  </div>
                </div>
                <Br/>
                <div class="row form-group">
                  <p>Select Site Names:
                    <button id="checkAllSitenames" type="button" class="btn btn-primary btn-xs">Check All</button>
                    <button id="uncheckAllSitenames" type="button" class="btn btn-info btn-xs">Uncheck All</button>
                  </p>
                  <div id="modal-select-sitenames">
                    <div id="sitenames-0" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="sitenames-1" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="sitenames-2" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="sitenames-3" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="sitenames-4" class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div id="sitenames-5" class="col-md-2 col-sm-2 col-xs-2"></div>
                  </div>
                </div>
              </div>
              <div id="emp-group" class="tab-pane fade">
                <div class="row form-group">
                  <p>Select Tag:
                    <button id="checkAllTags" type="button" class="btn btn-primary btn-xs">Check All</button>
                    <button id="uncheckAllTags" type="button" class="btn btn-info btn-xs">Uncheck All</button>
                  </p>
                  <div id="modal-select-grp-tags">
                    <div id="tag-0" class="col-md-3 col-sm-2 col-xs-2"></div>
                    <div id="tag-1" class="col-md-3 col-sm-2 col-xs-2"></div>
                    <div id="tag-2" class="col-md-3 col-sm-2 col-xs-2"></div>
                    <div id="tag-3" class="col-md-3 col-sm-2 col-xs-2"></div>
                    <div id="tag-4" class="col-md-3 col-sm-2 col-xs-2"></div>
                    <div id="tag-5" class="col-md-3 col-sm-2 col-xs-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <span id="load-groups-wrapper" data-toggle="tooltip" title="">
              <button id="go-load-groups" type="button" class="btn btn-primary" data-dismiss="modal" >Okay</button>
            </span>
            <button id="exit-load-group" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade in" id="contact-settings" role="dialog">
  <div class="modal-dialog modal-lg" id="modal-cs-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-info"><span class="glyphicon glyphicon-chevron-left" id="go_back" hidden>&nbsp;</span>Contact Settings</h4>
      </div>

    <div class="modal-body row-fluid">
      <div class="contact-settings-container">

        <div class="row">
          <div class="col-md-6 form-group">
            <label for="contact-category">Contact Category</label>
            <select id="contact-category" class="btn btn-default form-control" name="contact-category" title="Contact Category">
              <option disabled selected value="default">--</option>
              <option value="econtacts">Employee Contacts</option>
              <option value="ccontacts">Community Contacts</option>
              <option value="unregistered">Unregistered Contacts</option>
            </select>  
          </div>

          <div class="col-md-6 from-group">
            <label for="settings-cmd">What do you want to do?</label>
            <select id="settings-cmd" class="btn btn-default form-control" disabled>
              <option disabled selected value="default">--</option>
              <option value="addcontact">Add Contact</option>
              <option value="updatecontact">Update Existing Contact</option>
            </select>  
          </div>
        </div>

        <hr>

        <table id="emp-response-contact-container" class="display table table-striped" cellspacing="0" width="100%" hidden>
          <thead>
            <tr>
            </tr>
          </thead>
        </table>

        <table id="comm-response-contact-container" class="display table table-striped" cellspacing="0" width="100%" hidden>
          <thead>
            <tr>
            </tr>
          </thead>
        </table>

        <!-- <table id="unregistered-contact-container" class="display table table-striped" cellspacing="0" width="100%">
          <thead>
            <tr>
            </tr>
          </thead>
        </table>

        <div id="unregistered-wrapper">
            <form id="unregistered-form">
                <b>UNREGISTERED FORM</b>
            </form>
        </div> -->

        <div id="employee-contact-wrapper" hidden>
            <form id="employee-contact-form">
                <input type="text" id="user_id_ec" value="0" hidden>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="firstname_ec">Firstname</label>
                                <input type="text" class="form-control" id="firstname_ec" name="firstname_ec" placeholder="Enter firstname" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="lastname_ec">Lastname</label>
                                <input type="text" class="form-control" id="lastname_ec" name="lastname_ec" placeholder="Enter lastname" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="middlename_ec">Middlename</label>
                                <input type="text" class="form-control" id="middlename_ec" name="middlename_ec" placeholder="Enter middlename" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="nickname_ec">Nickname</label>
                                <input type="text" class="form-control" id="nickname_ec" name="nickname_ec" placeholder="Enter nickname" />
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group hideable">
                            <label class="control-label" for="salutation_ec">Salutation</label>
                                <input type="text" class="form-control" id="salutation_ec" name="salutation_ec" placeholder="Enter salutation" />
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group hideable">
                            <label class="control-label" for="gender_ec">Gender</label>
                                <input type="text" class="form-control" id="gender_ec" name="gender_ec" placeholder="Enter gender" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="birthdate_ec">Birthdate</label>
                            <div class="input-group date datetime">
                                <input type="text" class="form-control birthdate" id="birthdate_ec" name="birthdate_ec" placeholder="Enter birthdate" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div> 
                </div>  

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group hideable">
                        <label class="control-label" for="email_ec">Email</label>
                            <input type="text" class="form-control" data-role="tagsinput" id="email_ec" name="email_ec" placeholder="Enter email" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group hideable">
                        <label class="control-label" for="active_status_ec">Contact Active Status</label>
                        <select class="form-control" id="active_status_ec" name="active_status_ec">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group hideable">
                        <label class="control-label" for="team_ec">Team(s):</label>
                        <input type="text" class="form-control" data-role="tagsinput" id="team_ec" name="team_ec" placeholder="Enter team" required />
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <button type="button" class="btn btn-primary btn-xs" id="employee-add-number"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Mobile Number</button>
                    <button type="button" class="btn btn-primary btn-xs" id="employee-add-landline"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Landline Number</button>
                </div>
            </div>

                <div id="mobile-div">
                </div>

                <hr>

                <div id="landline-div">
                </div>

                <div id="emp-settings-cmd" class="right-content">
                    <button class="btn btn-danger" id="btn-clear-ec" >Reset</button>
                    <button type="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
              

                <div id="update-contact-container" class="right-content" hidden>
                   <button type="submit" value="submit" class="btn btn-primary" id="sbt-update-contact-info">Save</button>
                   <button type="button" class="btn btn-danger" id="btn-cancel-update" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>

        <div id="community-contact-wrapper" hidden>
            <form id="community-contact-form">
                <input type="text" id="user_id_cc" hidden>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="firstname_cc">Firstname</label>
                                <input type="text" class="form-control" id="firstname_cc" name="firstname_cc" placeholder="Enter firstname" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="lastname_cc">Lastname</label>
                                <input type="text" class="form-control" id="lastname_cc" name="lastname_cc" placeholder="Enter lastname" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="middlename_cc">Middlename</label>
                                <input type="text" class="form-control" id="middlename_cc" name="middlename_cc" placeholder="Enter middlename" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="nickname_cc">Nickname</label>
                                <input type="text" class="form-control" id="nickname_cc" name="nickname_cc" placeholder="Enter nickname" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="salutation_cc">Salutation</label>
                                <input type="text" class="form-control" id="salutation_cc" name="salutation_cc" placeholder="Enter salutation" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="gender_cc">Gender</label>
                                <input type="text" class="form-control" id="gender_cc" name="gender_cc" placeholder="Enter gender" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="birthdate_cc">Birthdate</label>
                            <div class="input-group date datetime">
                                <input type="text" class="form-control birthdate" id="birthdate_cc" name="birthdate_cc" placeholder="Enter birthdate" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="active_status_cc">Contact Active Status</label>
                            <select class="form-control" id="active_status_cc" name="active_status_cc">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group hideable">
                            <label class="control-label" for="ewirecipient_cc">Early Warning Information Recipient:</label>
                            <select class="form-control" id="ewirecipient_cc" name="ewirecipient_cc">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>

          <div class="row" id="org-and-site-alert" hidden>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="alert alert-info" role="alert">
                    Please select at least one in <b id="selection-feedback"></b>
                </div>
            </div>
          </div>
          <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title" style="text-align: center;">
                    <a data-toggle="collapse" data-parent="#accordion" data-target="#site-accord">Site Selection</a>
                  </h4>
                </div>
                <div id="site-accord" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div id="site-selection-div">
                        <div id="sitenames-cc-0" class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div id="sitenames-cc-1" class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div id="sitenames-cc-2" class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div id="sitenames-cc-3" class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div id="sitenames-cc-4" class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div id="sitenames-cc-5" class="col-md-2 col-sm-2 col-xs-2"></div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title" style="text-align: center;">
                    <a data-toggle="collapse" data-parent="#accordion" data-target="#org-accord">Organization Selection</a>
                  </h4>
                </div>
                <div id="org-accord" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div id="organization-selection-div">
                        <div id="orgs-cc-0" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-1" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-2" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-3" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-4" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-5" class="col-md-3 col-sm-3 col-xs-3"></div>
                        <div id="orgs-cc-6" class="col-md-3 col-sm-3 col-xs-3"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-xs" id="community-add-number"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Mobile Number</button>
                <button type="button" class="btn btn-primary btn-xs" id="community-add-landline"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Landline Number</button>
            </div>
            <div id="mobile-div-cc">
            </div>
            <hr>
            <div id="landline-div-cc">
            </div>
          <hr>
          <div id="comm-settings-cmd" class="right-content">
            <button class="btn btn-danger" id="btn-clear-cc" >Reset</button>
            <button type="submit" value="submit" class="btn btn-primary">Save</button>
          </div>
          <div id="update-comm-contact-container" class="right-content" hidden>
               <button type="submit" value="submit" class="btn btn-primary" id="sbt-update-comm-contact-info">Save</button>
               <button type="button" class="btn btn-danger" id="btn-cancel-update" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="gintag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">General Information Tag</h4>
      </div>
      <div class="modal-body">
        <div class="scrollable-div">
            
            <div class="alert alert-info" role="alert">
                <div class="row">
                    <div class="col-sm-12">• <strong>Important Tags: </strong>
                    <p id="important_tags"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group hideable">
                    <label class="control-label" for="gintag_selected">Sites to be tagged</label>
                    <div id="tag_sites" class="row"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group hideable">
                    <label class="control-label" for="gintag_selected">Tags</label>
                    <input type="text" class="form-control" data-provide="typeahead" id="gintag_selected" name="gintag_selected" placeholder="E.g #EwiMessage" required />
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-4" id="gintag_warning_message" hidden>
                <div class="alert alert-info" role="alert">
                    <b>This field is required</b>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirm-tagging">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="narrative-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Narrative</h4>
      </div>
      <div class="modal-body">
        <div class="scrollable-div">
            <div class="alert alert-info" role="alert">
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Notice!</strong>
                        <p> Saving a tagged message will be saved to narratives</p>
                    </div>
                </div>
            </div>

            <textarea id="narrative_message" name="narrative_message" class="form-control" rows="10"  disabled></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-narrative">Confirm</button>
      </div>
    </div>
  </div>
</div>

<script src="/js/dewslandslide/communications_beta/initializer.js"></script>
<script src="/js/dewslandslide/communications_beta/cbx_main.js"></script>
<script src="/js/dewslandslide/communications_beta/event_handler.js"></script>
<script src="/js/dewslandslide/communications_beta/responsive.js"></script>