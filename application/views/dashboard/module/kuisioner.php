<!-- 

<form action="<?php //echo base_url('dashboard/kuisioner/quiz')?>" method="POST" style="margin:15px;padding: 15px;" id="frmSoal">
	<h5 style="text-align: center;">Get Started Quiz Employee</h5>
	<div class="form-group">
		<label><b>Username</b></label>
	   <div class="form-group">
		<input type="text" name="user"  class="form-control col-md-3" id="user" value="<?php //echo $this->session->userdata('Username')?>" disabled>
	   </div>
	</div>
	<div class="form-group">
	   <label><b>Name Employee</b></label>
	   <div class="form-group">
		<input type="text" name="user"  class="form-control col-md-3" id="user" value="<?php //echo $this->session->userdata('Name')?>" disabled>
	   </div>
	</div>
	<div class="form-group">
	   <label><b>Department</b></label>
	   <div class="form-group">
		<input type="text" name="user"  class="form-control col-md-3" id="user" value="<?php //echo $this->session->userdata('Department')?>" disabled>
	   </div>
	</div>
	<div class="form-group">
		<input type="submit" name="submitTime" id="submitTime" value="Submit" class="btn btn-primary">
	</div>
</form>

<script type="text/javascript">
	
</script> -->



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <!--   <h3 class="page-header"> Peraturan </h3> -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Peraturan
                        </div>
                        <div class="panel-body">
                         <?php foreach($agreement as $agree){ ?>
						       	<h3 align='center'><?= $agree['nama_ujian']?></h3><br/>
								Waktu Pengerjaan : <?=$agree['waktu']?> menit<br/>
								<p/>
								<h2>PERATURAN</h2><br/>
								<?=$agree['peraturan']?><br/>
                         <?php } ?>

<script>
 function cekForm() {
	if (!document.fValidate.agree.checked) {
				alert("Anda belum menyetujui!");
				return false;
			} else {
				location.href="kuisioner/quiz";
			}
		}
</script>
<form name="fValidate">
<input type="checkbox" name="agree" id="agree" value="1"> Saya Mengerti dan Siap Untuk Mengikuti Tes<br/><br/>
          <div style='text-align:center;'><input type="button" name="button-ok" class="btn btn-primary" value="MULAI TES" onclick="cekForm()"></div>
</form>

                        </div>
                        <div class="panel-footer">
                           
                        </div>
                    </div>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
               


