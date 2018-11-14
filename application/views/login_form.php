<!-- Aether-Custom Required Scripts -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/third-party/login-form-Aether.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/login_form.js"></script>

<!-- jQuery Validate -->
<script type="text/javascript" src="/js/third-party/jquery.validate.min.js"></script>

<!-- Aether-Custom Required Scripts -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/third-party/login-form-Aether.css">


<?php
    if (($this->session->userdata('first_name') != "" || is_null($this->session->userdata('first_name'))) && ($this->session->userdata('last_name') != "" || is_null($this->session->userdata('last_name')))) {
        header( "Location: /home" );
    } else {
?>

<div class="bg-cover">
</div>

<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span><img src="/images/DEWSL.png" /></span> <strong>PROJECT DYNASLOPE</strong></a>
        </div>
    </nav>    
    <div class="row main-content-div">
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-12">
                    <span class="big-title">PROJECT </span><span class="big-title inverse">DYNASLOPE</span>
                </div>
            </div>
            <div class="row description">
                <div class="col-sm-12">
                    <div class="">
                        <p>The Dynaslope Project is a research program developing an early warning system for deep-seated and catastrophic landslides, through landslide sensor technology and community participation in the Philippines.</p>
                        <br>
                        <p>Formerly called "DEWS-L" and "DRMS", the Dynaslope Project began in the University of the Philippines Diliman and was funded by the Department of Science and Technology. Today, it is implemented by the Philippine Institute of Volcanology and Seismology in 50 sites around the Philippines.</p>
                        <br>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="../../../images/dynaslope-logo.jpg" />
                <p id="profile-name" class="profile-name-card greeting-text">Hi! Log-in when ready.</p><br>
                <!-- <form class="form-signin" action="../account_controller/validateCredentials" method="POST" accept-charset="utf-8"> -->
                <div id="login-form" class="form-signin">
                    <fieldset>
                        <input type="username" id="username" class="form-control" name="username" placeholder="Username" required autofocus>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" id="login-btn" name="Login">Sign in</button>
                    </fieldset>
                </div>
                <span>Don't have an account? </span><a id="no-account" href="#" class="forgot-password">No Account?</a>
                <a id="forgot-link" href="#" class="forgot-password">Forgot the password?</a>
            </div><!-- /card-container -->
        </div>
    </div>
</div><!-- /container-->

<?php
    }
?>

