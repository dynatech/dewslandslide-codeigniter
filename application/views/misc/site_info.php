<script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/jquery_latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/bootstrap_v4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/overhaul/site_info.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dewslandslide/misc/pms.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/third-party/bootstrap_v4.min.css">
<link href="<?php echo base_url(); ?>css/third-party/bootstrap-fs-modal_v4.css" rel="stylesheet">


<main class="page site_info">
    <section class="clean-block clean-cart ">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" id="page-header" style="font-weight: 600;color: #17526D;border: solid #17526D;border-radius: 6px;margin-bottom: 40px;">SITE INFORMATION <button type="button" class="btn btn-block" data-toggle="modal" data-target="#modalLarge" id="modal_button" >
                                Show Modal
                            </button></h2>

            </div>
            
            <div class="content">
                <div class="row no-gutters">
                   
                    <div id="site_form" class="col-md-12 col-lg-3 col-xl-3">
                        <form style="  margin: 37px;">
                            <div class="form-group"><label>Site Name</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Site Code</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Purok</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Sitio</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Barangay</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Municipality</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Province</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Region</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>PSGC</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Households</label><textarea class="form-control"></textarea></div>
                            <div class="form-group"><label>Season</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><label>Active</label><input type="text" class="form-control" /></div>
                            <div class="form-group"><button class="btn btn-danger btn-block" type="button">Update</button><button class="btn btn-primary btn-block" type="button">Cancel</button></div>

                        </form>
                    </div>
                    <div class="col-md-12 col-lg-9 col-xl-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                               
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