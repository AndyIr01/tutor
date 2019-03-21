<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css' ?>">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url().'assets/css/login.css'; ?>">
</head>
<body>
<div class="form">
<?php
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
}

else if($_GET['pesan'] == "logout"){
echo "<div class='alert alert-danger'>Anda telah logout</div>";
}

  else if($_GET['pesan'] == "belumlogin"){
echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
}

else if($_GET['pesan'] == "berhasilreg"){
  echo "<div class='alert alert-success'>Register Berhasil! Silahkan login dulu.</div>";
  }

  else if($_GET['pesan'] == "gagalreg"){
    echo "<div class='alert alert-danger'>Gagal Register!</div>";
  }

}
?>
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="<?= base_url().'rental/regUser' ?>" method="post">
            <div class="field-wrap">
              <label> 
                Fullname<span class="req">*</span>
              </label>
              <input name="nama" type="text" required autocomplete="off" />
            </div>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input name="username" type="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input name="password" type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="<?= base_url().'rental/login' ?>" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input name="username" type="text" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" type="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<script type="text/javascript">
$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight'); 
            } else {
            label.removeClass('highlight');   
            }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
            label.removeClass('highlight'); 
            } 
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
</script>
</body>
</html>