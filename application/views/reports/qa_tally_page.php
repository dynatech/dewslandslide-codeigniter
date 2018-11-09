<link rel="stylesheet" type="text/css" href="/css/third-party/awesomplete.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<script src="/js/third-party/awesomplete.js"></script>
<script src="/js/third-party/handlebars.js"></script>
<script src="/js/third-party/moment-locales.js"></script>
<script src="/js/third-party/typeahead.js"></script>
<script src="/js/third-party/bootstrap-tagsinput.js"></script>
<script src="/js/third-party/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script type="text/javascript">
  first_name = "<?php echo $first_name; ?>";
  tagger_user_id = "<?php echo $user_id; ?>";
</script>

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div id="page-header">QUALITY ASSURANCE | <small>TALLY PAGE<small></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                 <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Event Monitoring</div>
                    <span class="circle right"></span>
                </div>            
            </div>
        </div>
        <div id="event-qa-display">

        </div>   
        <div class="row">
            <div class="col-sm-12">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Extended Monitoring</div>
                    <span class="circle right"></span>
                </div>        
            </div>
        </div>
        <div id="extended-qa-display">

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Routine Monitoring</div>
                    <span class="circle right"></span>
                </div>
            </div>
        </div>
        <div id="routine-qa-display">

        </div>
    </div>
</div>
<script src="/js/dewslandslide/reports/qa_tally.js"></script>