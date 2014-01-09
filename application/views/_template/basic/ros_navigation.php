
<nav role="navigation">
                <ul class="nav nav-pills wooden-navigation">
                    <li><a href="<?echo base_url()?>">Home</a></li>
                    <li><a href="<?echo base_url()?>loadLevel">PLAY</a></li>
                    <li><a href="<?echo base_url()?>leaderboard">Leaderboard</a></li>
                    <li><a href="<?echo base_url()?>comments">Forum</a></li>
                    <li><a href="<?echo base_url()?>instruction">FAQ</a></li>
                
                 <ul class="nav pull-right nav-pills wooden-navigation">
                  
                
                 <?
                        if($logged_in)
                        {
                    ?>
                     <li class="pull-right wooden-navigation" name="k-connect-modal"
                     <a data-toggle="modal" href="#login" class="k-login-button" style="display:none;">
                        <span font-samarkan font-samarkan-size>k!</span> Login</a>
                        </li>
                        <li name="k-connect-profile" class="dropdowns">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <span name="fullname"><? if($logged_in) { ?><img src="<?php echo encode_base64_image(gravatar($log->email, array('s' => 20, 'd' => 'wavatar'))); ?>"><? } ?> <? echo $log->fullname; ?> <small>(<? echo $log->kid; ?>)</small></span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<? echo base_url(); ?>profile/<? echo $log->profilename; ?>">Profile</a></li>
                                <!-- <li><a href="#">Change Password</a></li> -->
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)" name="attempt-logout">Logout</a></li>
                            </ul>
                        </li>
                    <?
                        }
                        else
                        {
                    ?>
                       <li name="k-connect-modal"><a data-toggle="modal" data-target="#login"><span font-samarkan font-samarkan-size>k!</span> Login</a></li>
                        <li name="k-connect-profile" class="dropdowns" style="display:none;">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <span name="fullname"><? if($logged_in) { ?><img src="<?php echo encode_base64_image(gravatar($log->email, array('s' => 20, 'd' => 'wavatar'))); ?>"><? } ?> <? echo $log->fullname; ?> <small>(<? echo $log->kid; ?>)</small></span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<? echo base_url(); ?>profile">Profile</a></li>
                                <!-- <li><a href="#">Change Password</a></li> -->
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)" name="attempt-logout">Logout</a></li>
                            </ul>
                        </li>
                    <?
                        }
                    ?>
                </li>
                   </ul>
            </nav>
            
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; CLOSE</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="facebook" name="attempt-facebook">
                                    <i class="fa fa-facebook fa-big"></i>
                                        <div id="connect">Connect with Facebook</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p>Login with email</p>
                                <form name="loginform" role="form" action="javascript:void(0)" method="POST" accept-charset="UTF-8">
                                    <input type="email" name="emailaddress" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit"  name="attempt-login">Sign In <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    