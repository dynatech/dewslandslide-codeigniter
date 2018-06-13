    <script id="messages-template-both" type="text/x-handlebars-template">
        {{#each messages}}
        {{#if isyou}}
        {{#if hasTag}}
            <li class="right clearfix tagged" title="Tagged Messaged">
        {{else}}
            <li class="right clearfix">
        {{/if}}
        <input type="text" id="msg_details" value="{{type}}<split>{{user}}<split>{{timestamp}}<split>{{user_number}}<split>{{msg}}<split>{{sms_id}}<split>{{table_used}}" hidden>
            <span class="chat-img pull-right" id="badge-id-you">
                <img src="/images/Chatterbox/dewsl_03.png" alt="User Avatar">
                {{else}}
                {{#if hasTag}}
                    <li class="left clearfix tagged" title="Tagged Messaged">
                {{else}}
                    <li class="left clearfix">
                {{/if}}
                <input type="text" id="msg_details" value="{{type}}<split>{{user}}<split>{{timestamp}}<split>{{user_number}}<split>{{msg}}<split>{{sms_id}}<split>{{table_used}}" hidden>
                    <span class="chat-img pull-left" id="badge-id-user">
                        <img src="/images/Chatterbox/boy_avatar.png" alt="User Avatar">
                        {{/if}}
                    </span>
                    <div class="chat-body clearfix tagged" id="id_{{timestamp}}">
                        <div class="header">
                            {{#if isyou}}
                                <small class="pull-left text-muted"><i class="fas fa-clock"></i> <span id="timestamp-written" title="Timestamp: Written">{{timestamp}}</span>, <i class="fas fa-clock"></i>
                                    {{#if status}}<span id="timestamp-sent" class="sent-status-success">{{timestamp_sent}}</span>
                                    {{else}}
                                    <span id="timestamp-sent" class="sent-status-fail">{{timestamp_sent}}</span>
                                    {{/if}}
                                </small>
                                {{#if status}}
                                    <strong class="primary-font right-content sent-status-success" style="display: block;">
                                    <span class="ack_status">Sent by GSM</span>
                                    <i class="fas fa-check-circle sms_status"></i>&nbsp;&nbsp;<span id="chat-user" style="color: black;">{{user}}</span></strong>
                                {{else}}
                                    {{#if noTimestamp}}
                                        {{#if recentlySent}}
                                            <strong class="primary-font right-content" style="display: block;">
                                            <span class="ack_status"></span>
                                            <i class="fas fa-spinner fa-spin sms_status"></i>&nbsp;&nbsp;<span id="chat-user" style="color: black;">{{user}}</span></span></strong>
                                        {{else}}
                                            <strong class="primary-font right-content sent-status-fail" style="display: block;">
                                             <span class="ack_status">Unable to send to server</span>
                                            <i class="fas fa-times-circle sms_status"></i>&nbsp;&nbsp;<span id="chat-user" style="color: black;">{{user}}</span></strong>
                                        {{/if}}
                                    {{else}}
                                        <strong class="primary-font right-content sent-status-fail" style="display: block;">
                                        <span class="ack_status">GSM message sending failed</span>
                                        <i class="fas fa-times-circle sms_status"></i>&nbsp;&nbsp;<span id="chat-user" style="color: black;">{{user}}</span></strong>
                                    {{/if}}
                                {{/if}}
                            {{else}}
                                <strong class="primary-font" id="chat-user" >{{user}}</strong>
                                {{#if isGlobe}}
                                    <small class="pull-right text-muted"><img src="/images/Chatterbox/globe.png" style="max-height: 17px; max-width: 17px;" title="NETWORK: GLOBE">&nbsp;<i class="fas fa-clock"></i><span>{{timestamp}}</span></small>
                                {{else}}
                                    <small class="pull-right text-muted"><img src="/images/Chatterbox/smart.png" style="max-height: 17px; max-width: 17px;" title="NETWORK: SMART">&nbsp;<i class="fas fa-clock"></i><span>{{timestamp}}</span></small>
                                {{/if}}
                            {{/if}}
                        </div>
                        <p>
                            {{msg}}
                        </p>
                    </div>
                </li>
                {{/each}}
            </script>

            <script id="quick-inbox-template" type="text/x-handlebars-template">
                {{#each quick_inbox_messages}}
                <li>
                    <input id="'{{user}}'" type="text" value="{{name}} - {{user}}" hidden>
                    <a href="#" class="clearfix">   
                        <img src="/images/Chatterbox/boy_avatar.png" alt="" class="img-circle">
                        <div class="friend-name">   
                            {{#if isunknown}}
                            <strong class="unknown-number">{{user}} </strong>
                            {{else}}
                            <strong>{{name}} </strong>
                            {{/if}}
                        </div>
                        <div class="last-message text-muted">{{msg}}</div>
                        <small class="time text-muted"> {{timestamp}}</small>
                    </a>
                </li>  
                {{/each}}
            </script>

            <script id="quick-release-template" type="text/x-handlebars-template">
                {{#each quick_release}}
                <li>
                    <input type="text" value="{{name}}" hidden>  
                    <a href="#" class="clearfix">   
                        <img src="/images/Chatterbox/dewsl_03.png" alt="" class="img-circle">
                        <div class="friend-name">   
                            <strong>{{name}} - Region ({{region}}) - {{internal_alert_level}}</strong>
                        </div>
                        <div class="last-message text-muted">{{barangay}}, {{municipality}},{{province}}</div>
                    </a>
                </li>  
                {{/each}}
            </script>

            <script id="group-message-template" type="text/x-handlebars-template">
                {{#each group_message}}
                <li>
                    <input type="text" value="{{name}}" hidden>  
                        <div class="panel-group" style="margin: 0px;">
                          <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 0px;">
                              <h4 class="panel-title">
                                <a href="#{{site}}_grpmsg" class="clearfix" data-toggle="collapse">   
                                    <img src="/images/Chatterbox/dewsl_03.png" alt="" class="img-circle">
                                    <div class="friend-name clearfix" style="text-align: center;">   
                                        <strong>{{barangay}}, {{municipality}},{{province}} ({{site}})</strong>
                                    </div>
                                </a>
                              </h4>
                            </div>
                            <div id="{{site}}_grpmsg" class="panel-collapse collapse">
                              <ul class="list-group qa-contact-list">
                                {{#each data}}
                                    <li class="list-group-item" style="padding: 0px;"><label for="" class="checkbox-inline"><input type="checkbox" class="qaccess-contacts" value="{{contacts}}"  checked="yes">{{contacts}}</label></li>
                                {{/each}}
                              </ul>
                            </div>
                          </div>
                        </div>
                </li>  
                {{/each}}
            </script>

            <script id="selected-contact-template" type="text/x-handlebars-template">
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{fullname}}</strong> {{numbers}}
                </div>
            </script>

            <script id="ewi-template" type="text/x-handlebars-template">
                <!-- TODO -->
            </script>
        </body>

        </html>
