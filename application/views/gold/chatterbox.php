            <div id="page-wrapper">
                <div class="container bootstrap snippet">
                    <div class="row">
                        <div id="search-contacts" class="col-md-6">
                            <label>Search for contact:</label><Br/>
                            <input class="dropdown-input" data-multiple />
                            <!-- <textarea class="dropdown-input" data-multiple></textarea> -->
                            <button type="button" id="go-chat">Go Chat!</button><Br/>
                        </div>
                        <div id="div-advanced-search" class="col-md-6">
                            <button type="button" class="btn btn-link btn-sm" id="btn-advanced-search" 
                                data-toggle="modal" data-target="#advanced-search">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Quick Community Group Selection
                            </button>
                        </div>
                        <div id="current-contacts" class="col-md-8 col-sm-6 col-xs-8">
                            <h4 class="bg-success"></h4>
                        </div>
                <!--         
                        <div class="bg-white">
                            <div class="input-group">
                                <input type="text" id="searchbox" name="searchbox" class="form-control border no-shadow no-rounded dropdown-input" placeholder="Search contacts here" data-multiple />
                                <span class="input-group-btn">
                                    <button class="btn btn-success no-rounded" type="button" id="go-chat">Go Chat!</button>
                                </span>
                            </div>
                        </div>   
                -->        
                    </div>

                    <div class="row">
                        <div id="possible-contacts" class="col-md-4">
                            
                        </div>
                    </div>

                    <div class="row">
                		<div class="col-md-3 bg-white ">
                <!--             
                            <div class=" row border-bottom padding-sm friend-list-header" style="height: 40px;">
                            	Contacts
                            </div> -->

                            <!-- =============================================================== -->
                            <!-- member list -->
                <!--             <ul class="friend-list">
                                <li class="active bounceInDown">
                                	<a href="#" class="clearfix">
                                		<img src="images/phivolcs2.png" alt="" class="img-circle">
                                		<div class="friend-name">	
                                			<strong>John Doe</strong>
                                		</div>
                                		<div class="last-message text-muted">Hello, Are you there?</div>
                                		<small class="time text-muted">Just now</small>
                                		<small class="chat-alert label label-danger">1</small>
                                	</a>
                                </li>
                                <li>
                                	<a href="#" class="clearfix">
                                		<img src="http://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                		<div class="friend-name">	
                                			<strong>Jane Doe</strong>
                                		</div>
                                		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                		<small class="time text-muted">5 mins ago</small>
                                	<small class="chat-alert text-muted"><i class="fa fa-check"></i></small>
                                	</a>
                                </li> 
                                <li>
                                	<a href="#" class="clearfix">
                                		<img src="img/boy_avatar.png" alt="" class="img-circle">
                                		<div class="friend-name">	
                                			<strong>Kate</strong>
                                		</div>
                                		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                		<small class="time text-muted">Yesterday</small>
                                		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                                	</a>
                                </li>      
                                <li>
                                	<a href="#" class="clearfix">
                                		<img src="http://bootdey.com/img/Content/user_6.jpg" alt="" class="img-circle">
                                		<div class="friend-name">	
                                			<strong>Kate</strong>
                                		</div>
                                		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                		<small class="time text-muted">Yesterday</small>
                                		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                                	</a>
                                </li>                          
                            </ul> -->
                		</div>
                        
                        <!--=========================================================-->
                        <!-- selected chat -->
                    	<div id="main-container" class="col-md-8 bg-white hidden">
                            <!-- <button type="button" id="leave-room">Leave</button> -->
                            <div class="chat-message">
                                <ul id="messages" class="chat">

                                </ul>
                            </div>
                            <div class="chat-box bg-white">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <textarea id="msg" name="msg" class="form-control border no-shadow no-rounded" placeholder="Type your message here" rows="4"></textarea>
                                    </div>
                                    <div class="col-xs-2">
                                        <button class="btn btn-success no-rounded" type="button" id="send-msg">Send</button>
                                    </div>
                                </div>
                                <p>Remaining characters: <b id="remaining_chars">800</b></p>
                            </div>            
                		</div>        
                	</div>
                </div>

                <!-- Modal: WSS Connection disconnected -->
                <div class="modal fade" id="connectionStatusModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title text-danger">You have been disconnected!</h4>
                            </div>
                            <div class="modal-body">
                                <p>Chatterbox App will attempt to reconnect in a few seconds</p>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Refresh</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal: Advanced Search Options -->
                <div class="modal fade col-lg-10" id="advanced-search" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-info">Quick Community Group Selection of Recipients</h4>
                            </div>
                            <div class="modal-body row-fluid">
                                <div class="row">
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
                                <Br/>
                                <div class="row">
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
                            <div class="modal-footer">
                                <button id="go-load-groups" type="button" class="btn btn-success" data-dismiss="modal">Okay</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

            <script type="text/javascript">
                first_name = "<?php echo $first_name; ?>";
            </script>