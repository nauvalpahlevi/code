	<?php echo $this->session->flashdata('lonceng') ?>
	<div class="setting-frm" style="width:100%;min-height: 400px;margin-bottom: 40px">
		<?php echo form_open_multipart('dashboard/home/add_user',array('method'=>'POST')) ?>
			<div class="label-setting">
				<h5>Username</h5>
			</div>
			<div class="form-setting">
				<input type="text" name="username" id="username" class="form-control"><span><?php echo form_error('username')?></span>
			</div>
			<div class="label-setting">
				<h5>Password</h5>
			</div>
			<div class="form-setting">
				<input type="password" name="password" id="password" class="form-control"><span><i><?php echo form_error('password')  ?></i></span>
			</div>
			<div class="label-setting">
				<h5>Name</h5>
			</div>
			<div class="form-setting">
				<input type="text" name="nama" id="nama" class="form-control" ><span><i><?php echo form_error('nama')?></i></span>
			</div>
			<div class="label-setting">
				<h5>Photos</h5>
			</div>
			<div class="form-setting">
				<input type="file" name="photo" id="photo">
			</div>
			<div class="label-setting">
				<h5>Department</h5>
			</div>
			<div class="form-setting">
				<select id="depart" name="depart" class="form-control">
					<option value=""> >>Silahkan Pilih Department<< </option>
					<option value="Human_Capital">Human Capital</option>
					<option value="Warehouse">Warehouse</option>
					<option value="QHSE">Quality Health Safety Environment</option>
					<option value="Transport">Transport</option>
					<option value="Warehouse">Warehouse</option>
					<option value="GA">General Affair</option>
				</select><span><i><?php echo form_error('depart') ?></i></span>
			</div>
			<div class="label-setting">
				<h5>Level</h5>
			</div>
			<div class="form-setting">
				<select id="lvl" name="lvl" class="form-control">
					<option value="1">Super Administrator</option>
					<option value="2">Administrator</option>
					<option value="3">Guest</option>
				</select>
			</div>
			<div class="label-setting">
			</div>
			<div class="form-setting">
				<input type="submit" value="Submit" name="submit" class="btn btn-success">
			</div>
		<?php echo form_close() ?>
	</div>