<!-- Bulletin Modals for all papges -->
<<<<<<< HEAD
=======
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/public_alert/bulletin.css"/>
>>>>>>> ddd139bece6429fb4d6d4620fdcf021bd8195c39

<div class="modal fade" id="bulletin-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<<<<<<< HEAD
                <h4 class="modal-title bulletin-title">Early Warning Information Bulletin for </h4>
=======
                <h4 class="modal-title bulletin-title">Early Warning Information Bulletin for <span id="site-name">PHI</span></h4>
>>>>>>> ddd139bece6429fb4d6d4620fdcf021bd8195c39
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="info">Mail Body:</label>
                    <textarea class="form-control" rows="3" id="info" name="info"></textarea>
                </div>
                <hr>
                <div class="form-group">
                    <label for="recipients">Recipients:&emsp;</label>
                    <input type="text" class="form-control" id="recipients" name="recipients" data-role="tagsinput" />
                    &emsp;<span id="recipients_span"></span>
                </div>
                <hr>
                <div id="bulletin_div"></div>
            </div>
            <div class="modal-footer">
                <button id="edit-bulletin" class="btn btn-warning" role="button" type="submit">Edit</button>
<<<<<<< HEAD
                <button id="send" class="btn btn-danger" role="button" type="submit">Send to Mail</button>
                <button id="download" class="btn btn-danger" role="button" type="submit">Download</button>
                <button id="cancel" class="btn btn-primary" data-dismiss="modal" role="button">Cancel</button>
=======
                <button id="download" class="btn btn-danger" role="button" type="submit">Download</button>
                <button id="send" class="btn btn-danger" role="button" type="submit">Send to Mail</button>
                <button id="cancel" class="btn btn-default" data-dismiss="modal" role="button">Cancel</button>
>>>>>>> ddd139bece6429fb4d6d4620fdcf021bd8195c39
            </div>
        </div>
    </div>
</div> <!-- End of MODAL AREA -->

<div class="modal fade" id="bulletin-result-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>
                <h4 class="modal-title">Early Warning Information Bulletin for <span id="site-name">PHI</span></h4>
            </div>
            <div class="modal-body">
            	<span class="success" hidden="hidden">
            		<strong>SUCCESS:</strong>&ensp;Early warning information and bulletin successfully sent through mail!
            	</span>
            	<span class="failed" hidden="hidden">
            		<strong>ERROR:</strong>&ensp;Early warning information and bulletin sending failed!<br/><br/>
            		<i class="error"></i>
            	</span>
            </div>
            <div class="modal-footer">
                <button id="okay" class="btn btn-info" data-dismiss="modal" role="button">Okay</button>
            </div>
        </div>
    </div>
</div>