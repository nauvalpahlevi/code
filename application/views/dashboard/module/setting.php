
<?php $this->session->flashdata('notif')?>
<div class="setting-frm">
	<?php echo form_open_multipart('dashboard/home/setting') ?>
		
		<div class="label-setting">
			<h5>Username</h5>
		</div>
		<div class="form-setting">		
			<input type="text" name="Username" id="Username" class="form-control" value="<?php echo $this->session->userdata('Username') ?>" readonly>
		</div>
		<div class="label-setting">
			<h5>Password</h5>
		</div>
		<div class="form-setting">
			<input type="password" name="Password" id="Password" class="form-control" value="<?php echo $this->session->userdata('Password') ?>"><span><?php echo form_error('Password')?></span>
		</div>
		<div class="label-setting">
			<h5>Nama</h5>
		</div>
		<div class="form-setting">
			<input type="text" name="Nama" id="Nama" value="<?php echo $this->session->userdata('Name')?>" class="form-control" readonly>
		</div>
		<div class="label-setting">
			<h5>Photo</h5>
		</div>
		<div class="form-setting">
			<img src="<?php echo base_url('assets/photos/'.$this->session->userdata('Foto'))?>" style="border-radius:10px;width:300px;height:250px;">
		</div>
		<!-- <div class="label-setting">
			<input type="file" name="foto" id="foto">
		</div> -->
		<div class="label-setting">
			<h5>Department</h5>
		</div>
		<div class="form-setting">
			<input type="text" name="Depart" id="Depart" value="<?php echo $this->session->userdata('Department')?>" class="form-control" readonly>
		</div>
		<div class="label-setting">
			<input type="submit" name="SubmitConf" id="SubmitConf" value="Submit" class="btn btn-warning">
		</div>
	<?php echo form_close()?>
</div>