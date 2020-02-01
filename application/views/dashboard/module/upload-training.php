<?php echo $this->session->flashdata('notification') ?>
<div class="setting-frm" >
	<?php echo form_open_multipart('dashboard/upload') ?>
		<div class="label-setting">
			<h6>Title</h6>
		</div>
		<div class="form-setting">
			<input type="text" name="title" id="title" class="form-control"><span><?php echo form_error('title')?></span>
		</div>
		<div class="label-setting">
			<h6>Content</h6>
		</div>
		<div class="form-setting">
			<textarea id="content" name="content" class="form-control" cols="50" rows="10"></textarea>
		</div>
		<div class="label-setting">
			<h6>Lampiran</h6>
		</div>
		<div class="form-setting">
			<input type="file" name="lampiran" id="lampiran"><span>*Maks. File Size 2Mb</span>
		</div>
		<div class="label-setting">
			<h6>To Department</h6>
		</div>
		<div class="form-setting">
			<select id="depart" name="depart" class="form-control">
				<option value=""> >> Please Choice Department << </option>
				<option value="1">Operational Warehouse</option>
				<option value="2">Supply Chain Management</option>
				<option value="3">Quality Health Safety Environment</option>
				<option value="4">Operational Transport</option>
				<option value="5">General Affair</option>
				<option value="6">Human Capital</option>
			</select>
		</div>
		<div class="label-setting">
			<h6>Jenis Upload</h6>
		</div>
		<div class="form-setting">
			<select id="typeupload" name="typeupload" class="form-control">
				<option value=""> >> Please Choice Type Document << </option>
				<option value="Sop">SOP</option>
				<option value="Conduct">Code of Conduct</option>
				<option value="trainee">Materi Training</option>
				<option value="form-ceklist">Form Ceklist</option>
			</select>
		</div>	
		<div class="form-setting">
			<input type="submit" value="Submit" name="SubmitUpload" class="btn btn-success">
		</div>
	<?php echo form_close()?>
</div>