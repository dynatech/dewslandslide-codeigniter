<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/pms.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/site_info/site_info.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/third-party/bootstrap_v4.min.css">
<link href="<?php echo base_url(); ?>css/third-party/bootstrap-fs-modal_v4.css" rel="stylesheet">
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/jquery_latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/bootstrap_v4.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/overhaul/site_info.js"></script>



<main class="page site_info">
    <section class="clean-cart">
        <div class="container">
            <!-- <div class="block-heading">
                <h2 class="text-info" id="page-header" style="font-weight: 600;color: #17526D;border: solid #17526D;border-radius: 6px;margin-bottom: 40px;">SITE INFORMATION <button type="button" class="btn btn-block" data-toggle="modal" data-target="#modalLarge" id="modal_button" >
                                Show Modal
                            </button></h2>

            </div> -->

            <div class="block-heading">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Site Information</div>
                    <span class="circle right"></span>
                </div>
            </div>
            
            <div class="content">
                <div class="row no-gutters">
                   
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="sites-table" class="display table table-striped" cellspacing="0" width="100%">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade modal-fullscreen" id="modalLarge" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLargeLabel">Modal with large content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="general_modal_body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnTestSaveLarge" class="btn btn-default">
                    <span class="d-none d-md-inline">Save changes</span>
                    <span class="d-md-none">Save</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="site-info-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         <form id="site-information-form" style="margin: 37px;">
                            <div class="form-group hideable">
                                <label class="control-label" for="site_name">Site Name</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter Site Name" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="site_code">Site Code</label>
                                    <input type="text" class="form-control" id="site_code" name="site_code" placeholder="Enter Site Name" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="purok">Purok</label>
                                    <input type="text" class="form-control" id="purok" name="purok" placeholder="Enter Purok" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="sitio">Sitio</label>
                                    <input type="text" class="form-control" id="sitio" name="sitio" placeholder="Enter Sitio" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="barangay">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="municipality">Municipality</label>
                                    <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Enter Municipality" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="province">Province</label>
                                    <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="region">Region</label>
                                    <select  class="form-control" id="region" name="region" placeholder="Select Region">
                                        <option value="NCR">NCR</option>
                                        <option value="I">Region I</option>
                                        <option value="CAR">CAR</option>
                                        <option value="II">Region II</option>
                                        <option value="III">Region III</option>
                                        <option value="IV-A">Region IV-A</option>
                                        <option value="MIMAROPA">MIMAROPA Region</option>
                                        <option value="V">Region V</option>
                                        <option value="VI">Region VI</option>
                                        <option value="VII">Region VII</option>
                                        <option value="VIII">Region VIII</option>
                                        <option value="IX">Region IX</option>
                                        <option value="X">Region X</option>
                                        <option value="XI">Region XI</option>
                                        <option value="XII">Region XII</option>
                                        <option value="XIII">Region XIII</option>
                                        <option value="ARMM">ARMM</option>
                                    </select>
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="psgc">PSGC</label>
                                    <input type="text" class="form-control" id="psgc" name="psgc" placeholder="Enter PSGC" value="000000000" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="households">Households</label>
                                    <input type="text" class="form-control" id="households" name="households" placeholder="Enter Households" />
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="season">Season</label>
                                    <select  class="form-control" id="season" name="season" placeholder="Select Season">
                                        <option value="1">Dry (March to May)</option>
                                        <option value="2">Wet (May to October)</option>
                                    </select>
                            </div>
                            <div class="form-group hideable">
                                <label class="control-label" for="is_active">Is Active</label>
                                    <select  class="form-control" id="is_active" name="is_active" placeholder="Select Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                            </div>
                            <input type="hidden" id="site_id" name="site_id"/>

                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-insert-site">Save changes</button>
      </div>
    </div>
  </div>
</div>