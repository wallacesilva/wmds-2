<?php  
if( !isset($page_title) ) 
    $page_title = PROJECT_NAME; //'Hefesto CRM';
  else
    $page_title .= ' | ' . PROJECT_NAME; //'Hefesto CRM';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" href="media/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="media/js/jquery/jquery.1.7.2.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="media/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="media/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
$('#login-inner label').click(function(){
	$(this).next().focus();
});
$('#input_login').focus();

});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="#"><img src="media/images/hefesto_logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
		<!--  start login-inner -->
		<div id="login-inner">

		<form action="<?php echo base_url(); ?>auth/login" method="post">
			<p>
				<label for="login">E-mail</label>
				<input type="text" class="login-inp" name="login" id="input_login" />
			</p>

			<p>
				<label for="password">Senha</label>
				<input type="password" class="login-inp" name="password" id="input_password" />
			</p>

			<p>
				<!-- <input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Manter logado</label> -->
				<label>&nbsp;</label>
				<input type="submit" class="submit-login" />
			</p>
		</form>

		</div>
	 	<!--  end login-inner -->
		<div class="clear"></div>
		<a href="" class="forgot-pwd">esqueci a senha</a>

 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Esquecer é normal. Por favor, informe seu e-mail abaixo.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">

		<form action="<?php echo base_url(); ?>auth/forgot" method="post">
			<p>
				<label for="login">E-mail</label>
				<input type="text" class="login-inp" name="login" id="input_login" />
			</p>

			<p>
				<label>&nbsp;</label>
				<input type="submit" class="submit-login" />
			</p>
		</form>
		
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="javascript:;" class="back-login">voltar para login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>