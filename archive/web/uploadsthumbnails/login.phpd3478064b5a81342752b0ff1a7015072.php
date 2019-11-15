

<?php include 'header.php';?>
<!-- Wrap all page content here -->
<div id="login">
  
 
  <!-- Begin page content -->
  <div class="center-container">
    <div class="center-row">
      <div class="col-xs-6 bg-one text-center"></div>
      <div class="col-xs-6 bg-two text-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="loginbox animated slideInUp">
                <p class="loginhead">SIGN IN HERE</p>
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-gplus"><i class="fa fa-google"></i> Google +</a>
                </div>
                <p class="loginhead">or</p>
                 <form class="form" role="form" method="post" action="home.php" accept-charset="UTF-8" id="login-nav">
                    <div class="col-sm-4">
                      <div class="form-group">
                       <label>Username :</label>
                    </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                       <label>Password :</label>
                    </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="" required>
                         <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <input type="checkbox" value="" checked>
                        <span style="color: #000;">keep me logged-in</span>
                    </div>
                    </div>
                    <div class="col-sm-6"></div>
                    
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">SIGNIN</button>
                    </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                      <p>Don't have an account!<a href="register.php"> Sign Up Here</a></p>
                    </div>
                    </div>
                    
                 </form>
              </div>
        </div>
        <div class="col-md-2"></div>

      </div>
    </div>
  </div>
</div>



<?php include 'footer1.php';?>



