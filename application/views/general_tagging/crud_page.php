<link rel="stylesheet" type="text/css" href="/css/dewslandslide/misc/pms.css">
<link rel="stylesheet" type="text/css" href="/css/dewslandslide/misc/site_info/site_info.css">
<link rel="stylesheet" type="text/css" href="../css/third-party/awesomplete.css">
<script src="/js/third-party/notify.min.js"></script>
<script src="/js/dewslandslide/communications/gintags_manager.js"></script>
<script src="/js/dewslandslide/communications/data_tagging.js"></script>
<script src="/js/third-party/awesomplete.min.js"></script>
<input type="hidden" id="first_name" name="first_name" value="<?php echo $first_name; ?>" />
<!-- <script src="/js/third-party/bsconfirmation.js"></script> -->
<!-- <script src="/js/third-party/moment-locales.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/third-party/bootstrap_v4.min.css">
<link href="<?php echo base_url(); ?>css/third-party/bootstrap-fs-modal_v4.css" rel="stylesheet"> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/jquery_latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/bootstrap_v4.min.js"></script> -->

<main class="page site_info">
    <section class="clean-block clean-cart">
        <div class="container">

            <div class="block-heading">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div id="title-page-container" class="container-line-text timeline-head-text"><?php echo $title; ?></div>
                    <span class="circle right"></span>
                </div>
            </div>

            
            <div class="content">
               	<div class="row">
					<ul class="nav nav-tabs nav-justified">
			    		<li class="active"><a data-toggle="tab" href="#sms-tab"><strong>SMS TAGGING</strong></a></li>
			    		<li><a data-toggle="tab" href="#data-tagging-tab"><strong>DATA TAGGING</strong></a></li>
			    	</ul>
		    	</div>

				<div class="tab-content">
					<div id="sms-tab" class="tab-pane fade in active">
						<div class="table-responsive">          
                            <table class="table" id="gintags-datatable" style="width:100%;">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tfoot>
                                    <tr></tr>
                                </tfoot>
                            </table>
                        </div>
					</div>
					<div id="data-tagging-tab" class="tab-pane fade in">
						<div class="table-responsive">          
                            <table class="table" id="data-tags-datatable" style="width:100%;">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tfoot>
                                    <tr></tr>
                                </tfoot>
                            </table>
                        </div>
					</div>
				</div>
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="add-tag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="add-new-tag-form" style="margin: 37px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add-tag-title">Add new tag</h4>
      </div>
      <div class="modal-body row">

            <div class="col-md-12">
                <div class="form-group hideable">
                    <label class="control-label" for="sms_tag">SMS Tag</label><br>
                        <input type="text" class="form-control" id="sms_tag" name="sms_tag" placeholder="E.g #EwiMessage" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group hideable">
                    <label class="control-label" for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter tag description" ></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group hideable">
                    <label class="control-label" for="narrative_input">Narrative Input</label>
                        <textarea type="text" class="form-control" id="narrative_input" name="narrative_input" placeholder="Enter narrative input"></textarea>
                </div>
            </div>
            <input type="hidden" id="tag_id" name="tag_id" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save-tag">Save</button>
      </div>
    </div>
  </div>

    </form>
</div>

<div class="modal fade" id="add-data-tag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="add-data-tag-form" style="margin: 37px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add-data-tag-title">Add new tag</h4>
      </div>
      <div class="modal-body row">

            <div class="col-md-12">
                <div class="form-group hideable">
                    <label class="control-label" for="data_tag">Data Tag</label><br>
                        <input type="text" class="form-control" id="data_tag" name="data_tag" placeholder="E.g #DataTag" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group hideable">
                    <label class="control-label" for="data_description">Description / Script Corrector</label>
                        <textarea type="text" class="form-control" id="data_description" name="data_description" placeholder="Enter tag description" ></textarea>
                </div>
            </div>
            <input type="hidden" id="data_tag_id" name="data_tag_id" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save-data-tag">Save</button>
      </div>
    </div>
  </div>

    </form>
</div>
