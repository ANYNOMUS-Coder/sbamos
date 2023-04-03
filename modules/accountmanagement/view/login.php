<?php $RUNNING_SCRIPT= $_POST['RUNNING_SCRIPT']; if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); ?>

    <!--<body>
        <div class="row loginface">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading logo-cntr">
                        Admin Console
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" id="admin_login_form">
                            <fieldset>
                                <span class="show_msg"></span>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Log In">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->


        <body id="login">
            <div class="login-logo">
                <a href="<?php echo $SITE_LOC_PATH;?>"><img src="<?php echo SITE_LOGO_LARGE;?>" alt="" /></a>
            </div>
            <h2 class="form-heading">login</h2>
            <div class="app-cam">
                <form method="post" action="" id="admin_login_form">
                    <span class="show_msg"></span>
                    <input type="text" class="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" name="username" autofocus="">
                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password">
                    <div class="submit">
                        <input type="submit" onclick="myFunction()" value="Login">
                    </div><!--
                    <div class="login-social-link">
                        <a href="index.html" class="facebook">Facebook</a>
                        <a href="index.html" class="twitter">Twitter</a>
                    </div>
                    <ul class="new">
                        <li class="new_left">
                            <p><a href="#">Forgot Password ?</a></p>
                        </li>
                        <li class="new_right">
                            <p class="sign">New here ?<a href="register.html"> Sign Up</a></p>
                        </li>
                        <div class="clearfix"></div>
                    </ul>-->
                </form>
            </div>