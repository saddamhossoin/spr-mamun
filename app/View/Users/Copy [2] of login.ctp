<?php echo $this->Html->script(array('module/Users/login','common/form','common/jquery.validate')); ?>
<?php echo $this->Html->css(array('module/Users/login')); ?>

<div class="container">
  <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:50px;" id="loginbox">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="panel-title">Sign In</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
      </div>
      <div class="panel-body" style="padding-top:30px">
        <div class="alert alert-danger col-sm-12" id="login-alert" style="display:none"> <?php echo $this->Session->flash(); ?></div>
 	    <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login'));?>
           <div class="input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" placeholder="username or email" value="" name="username" class="form-control" id="login-username">
          </div>
          <div class="input-group" style="margin-bottom: 25px"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" placeholder="password" name="password" class="form-control" id="login-password">
          </div>
          <div class="input-group">
            <div class="checkbox">
              <label>
              <input type="checkbox" value="1" name="remember" id="login-remember">
              Remember me </label>
            </div>
          </div>
          <div class="form-group" style="margin-top:10px">
            <!-- Button -->
            <div class="col-sm-12 controls"> <a class="btn btn-warning" href="#" id="btn-login">Login </a> <a class="btn btn-primary" href="#" id="btn-fblogin">Login with Facebook</a> </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%"> Don't have an account! <a onclick="$('#loginbox').hide(); $('#signupbox').show()" href="#"> Sign Up Here </a> </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 50px; display: none;" id="signupbox">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Sign Up</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a onclick="$('#signupbox').hide(); $('#loginbox').show()" href="#" id="signinlink">Sign In</a></div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" id="signupform">
          <div class="alert alert-danger" style="display:none" id="signupalert">
            <p>Error:</p>
            <span></span> </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Email</label>
            <div class="col-md-9">
              <input type="text" placeholder="Email Address" name="email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="firstname">First Name</label>
            <div class="col-md-9">
              <input type="text" placeholder="First Name" name="firstname" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Last Name</label>
            <div class="col-md-9">
              <input type="text" placeholder="Last Name" name="lastname" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="password">Password</label>
            <div class="col-md-9">
              <input type="password" placeholder="Password" name="passwd" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="icode">Invitation Code</label>
            <div class="col-md-9">
              <input type="text" placeholder="" name="icode" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <!-- Button -->
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-warning" type="button" id="btn-signup"><i class="icon-hand-right"></i> &nbsp; Sign Up</button>
              <span style="margin-left:8px;">or</span> </div>
          </div>
          <div class="form-group" style="border-top: 1px solid #999; padding-top:20px">
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-primary" type="button" id="btn-fbsignup"><i class="icon-facebook"></i> &nbsp; Sign Up with Facebook</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
