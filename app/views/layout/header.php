<!DOCTYPE html>
<html>
<head>
	<link href="<?php echo STYLESHEET?>css/admin_bootstrap.css" rel="stylesheet" />
	<link href="<?php echo STYLESHEET?>css/main.css" rel="stylesheet" />
	<link href="<?php echo STYLESHEET?>css/AdminLTE.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Advertisements</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?=PUBLIC_PATH?>ads">Ads</a></li>
				<?php if(\PHPMVC\LIB\Session::isLogged()){?>
                    <li><a href="<?=PUBLIC_PATH?>ads/manage">Manage Ads</a></li>
                <?php }?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                <?php
                if(\PHPMVC\LIB\Session::isLogged()){?>
                    <li><a href="<?=PUBLIC_PATH?>login/logout"><?=\PHPMVC\Models\User::getEmpPK(\PHPMVC\LIB\Session::getId())->user_name?></a></li>
                    <li><a href="<?=PUBLIC_PATH?>login/logout">logout</a></li>
                <?php }else {?>
                    <li><a href="<?=PUBLIC_PATH?>login">Login</a></li>
                <?php }
                ?>
			</ul>
		</div>

	</div><!-- /.container-fluid -->
</nav>
<?php if(isset($_SESSION['msg'])) {echo '<p class="" style="background-color: blue;padding:4px;color: white;font-weight: 900;">'.$_SESSION['msg'].'</p>';unset($_SESSION['msg']);}else echo null;?>

<?php if(isset($_SESSION['msg'])) unset($_SESSION['msg']); ?>