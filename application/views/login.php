	<?php
			foreach($config as $a){
				$create = $a->created_date;
			}
	?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $a->title; ?> </title>
	<link href="<?php echo base_url('assets/img/'.$a->img)?>" rel="shortcut icon" type="image/png">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	
</head>

<body >
	<div class="animated-login">
			<div class="wrapper">
				<div class="login">
					<div class="title">
						<span><img src="<?php echo base_url('assets/img/'.$a->img)?>"><h3></span></h3>
					</div>
					<div class="c-login">
						<form class="form-horizontal" action="login/checked_login" method="post" style="margin-top:40px;" autocomplete="off">
							<div class="form-group">
								<input type="text" class="form-control" name="user" id="user" placeholder="Username" >
							</div>
							<div class="form-group">
								<input type="password" name="pass" class="form-control" id="pass"  placeholder="Password" >
							</div>
							<div class="form-group">
								<input type="submit" value="Login" class="btn btn-lg btn-primary">
							</div>
						</form>
						<div class="address"><p></p></div>
				<div class="footer">
				<h3>Copyright &copy IT <?php echo $a->copyright ?></h3>
				<?php echo date('Y',strtotime($create))?>-<?php echo date('Y')?>
				</div>
				</div>
				<?php echo $this->session->flashdata('error'); ?>
				<?php echo $this->session->flashdata('notif')?>
				</div>
			</div>
	</div>	
</body>

</html>
