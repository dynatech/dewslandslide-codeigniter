<script type="text/javascript" src="/js/dewslandslide/data_analysis/subsurface_level.js"></script>
<script src="/js/third-party/highstock.js"></script>
<script src="/js/third-party/exporting.js"></script>
<link rel="stylesheet" type="text/css" href="/css/third-party/daterangepicker.css">
<script src="/js/third-party/daterangepicker.js"></script>
<script src="/js/third-party/inferno.js"></script>
<style type="text/css">
 #submit{     
  height: 32px;
  margin-top: 5px;
  width: 156px;

}
</style>
<div id="page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" id="header-site">Sub-Surface Analysis Charts
        </h1>
      </div>
    </div>
    <div class="col-lg-12" align="center">
     <div class="panel panel-default">
      <div class="panel-heading pull-left"><b>SEARCH TOOL:</b></div>
      <div class="panel-body">
        <form class="form-inline" id="searchtool">
          <div class="form-group">
            <label for="site">Site:</label>
            <select class="form-control"  name="sitegeneral" id="sitegeneral" style=" width: auto;" ></select>
            &nbsp;&nbsp;&nbsp;
          </div>
          <div class="form-group">
            <label for="pwd">Date Range:</label>
            <div id="reportrange" class=" form-control cols-xs-7" style="background: #fff;cursor: pointer;padding: 5px 10px;border: 1px solid #ccc;width: 226.22222px;" ;margin-bottom: 10px;">
              <i class=""></i>&nbsp;
              <span id="dateAnnotation"></span> <b class="caret"></b></div>
              &nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
              <!-- <button type="button" id="submit" class="btn btn-info" style="margin-top: 0px;">Submit</button> -->
              &nbsp;&nbsp;&nbsp;
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-8">  
    </div>
    <div class="col-lg-12">
      <div class="panel-heading">    
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#graph" role="tab">Column Position Plots</a>
          </li>
          <li class="nav-item analysisgraph" id="liAnalisis">
            <a class="nav-link" data-toggle="tab" href="#graph1" role="tab">Displacement Charts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#graph2" role="tab">Velocity Charts</a>
          </li>
          <li></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="graph" role="tabpanel">
          <div class ="col-md-6"  id="colspangraph" style="padding: 0px"></div>  
          <div class ="col-md-6"  id="colspangraph2" style="padding: 0px"></div> 
        </div>
        <div class="tab-pane " id="graph1" role="tabpanel">
          <div class ="col-md-12"  id="dis1" style="padding: 0px"></div> 
          <br> 
          <div class ="col-md-12"  id="dis2" style="padding: 0px"></div>  
        </div>
        <div class="tab-pane" id="graph2" role="tabpanel">
          <div class ="col-md-12"  id="velocity1" style="padding: 0px"></div>  
          <br>
          <div class ="col-md-12"  id="velocity2" style="padding: 0px"></div>  
        </div>
      </div>
    </div>
    <div class="modal fade" id="errorMsg" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p > <h4 style="text-align: center;"> Please Select Site ....</h4></p>
          </div>
        </div>
      </div>
    </div>
    

