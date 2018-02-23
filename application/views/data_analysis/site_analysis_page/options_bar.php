
    <div class="panel panel-default">
        <div class="panel-heading" onclick="">
            <strong>Filter options: <span class="fa fa-angle-left pull-right"></span></strong>
        </div>
        <div class="panel-body">

            <form id="site-analysis-form">
                <div class="form-group">
                    <label class="control-label" for="data_timestamp">Data Timestamp</label>
                    <div class="input-group date datetime">
                        <input type="text" class="form-control" id="data_timestamp" name="data_timestamp" placeholder="Enter timestamp" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="site_code">Site Name</label>
                    <select class="form-control" id="site_code" name="site_code">
                        <option value="">---</option>
                        <?php foreach(json_decode($sites) as $site): ?>
                            <?php if($site->name != 'mes'): ?>
                                <option value="<?php echo $site->name; ?>">
                                <?php echo strtoupper($site->name) . " (" . $site->address . ")"; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm" id="explore">
                            Explore <span class="fa fa-search"></span>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row"><hr class="options-divider"/></div>

            <div class="row options-section-title">
                <div class="col-sm-12 text-center">
                    COLUMN LEVEL PLOTS
                </div>
                <hr/>
            </div>

            <div class="form-group">
                <label class="control-label" for="subsurface_column">Column Name</label>
                <select class="form-control" id="subsurface_column" name="subsurface_column">
                    <option value="">---</option>
                </select>
            </div>

            <div class="row"><hr class="options-divider"/></div>

            <div class="row options-section-title">
                <div class="col-sm-12 text-center">
                    NODE LEVEL PLOTS
                </div>
                <hr/>
            </div>

            <div class="form-group">
                <label class="control-label" for="site">Site Name</label>
                <select class="form-control" id="site" name="site">
                    <option value="">---</option>
                </select>
            </div>

        </div>
    </div>