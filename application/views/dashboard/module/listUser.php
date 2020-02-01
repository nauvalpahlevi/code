<div class="col-md-12">
	<table id="table_id" class="table table-striped display nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th style="width:0px;"></th>
				<th>No</th>
				<th>Username</th>
				<th>Name</th>
				<th>Photos</th>
				<th>Department</th>	
				<th>Aksi</th>				

			</tr>
		</thead>
		<tbody>
			<?php 
				$no=1;
				foreach($list as $user){
                    if($user['photos'] == null){
                        $profile = base_url('assets/photos/default.jpg');
                    }else{
                        $profile = base_url('assets/photos/'.$user['photos']);

                    }
			?>
			<tr>
				<td style="width: 0px;"><input type="hidden" value="<?php echo $user['id'] ?>"></td>
				<td><?php echo $no++ ?></td>
				<td><?php echo $user['username'] ?></td>
				
				<td><?php echo $user['nama'] ?></td>
				<td><img src="<?php echo $profile ?>" style="width:70px;height:70px"></td>
				<td><?php echo $user['department'] ?></td>
				<td><a href='#' data-toggle="modal" data-target="#modal_edit<?php echo $user['id'];?>"><i class="fas fa-edit"></i></a></td>
			</tr>
			<?php } ?> 
		</tbody>
	</table>	
	<?php 

		foreach($list as $i){
			$param = $i['id'];
			$username = $i['username'];
			$pass = $i['password'];
			$name = $i['nama'];
			$foto = $i['photos'];
			$depart = $i['department'];
			$lvl = $i['level'];
			if($lvl == 1){
				$user = "Super Administrator";
			}else if($lvl == 2){
				$user = "Administrator";
			}else{
				$user = "Guest";
			}

            if($foto == null){
                $photo = base_url('assets/photos/default.jpg');
            }else{
                $photo = base_url('assets/photos/'.$foto);
            }
	?>
	   <div class="modal fade" id="modal_edit<?php echo $param; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	   		<div class="modal-dialog">
            	<div class="modal-content">
            		<div class="modal-header">
                		<h4 class="modal-title" id="myModalLabel">Edit User</h4>
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
            		</div>
            		<form action="" class="form-horizontal " method="post">
            			<div class="modal-window">
            				<h6>Username</h6>
            			</div>
            			<div class="modal-window1">
            				<input type="text" name="user" value="<?php echo $username ?>" class="form-control" readonly>
            			</div>
            			<div class="modal-window">
            				<h6>Password</h6>
            			</div>
            			<div class="modal-window1">
            				<input type="password" name="pass" class="form-control" value="<?php echo $pass ?>" readonly>
            			</div>
            			<div class="modal-window">
            				<h6>Name</h6>
            			</div>
            			<div class="modal-window1">
            				<input type="text" name="nama" value="<?php echo $name ?>" class="form-control" readonly>
            			</div>
            			<div class="modal-window">
            				<h6>Photos</h6>
            			</div>
            			<div class="modal-window1">
            				<img src="<?php echo $photo ?>" width="150" height="100"><br />
            				<input type="file" name="mypict" class="">
            			</div>
            			<div class="modal-window">
            				<h6>Department</h6>
            			</div>
            			<div class="modal-window1">
            				<select id="depart" name="depart" class="form-control" disabled>
            					<option value="<?php echo $depart?>" selected><?php echo $depart ?></option>
            				</select>
            			</div>
            			<div class="modal-window">
            				<h6>User</h6>
            			</div>
            			<div class="modal-window1">
            				<input type="text" name="lvl" value="<?php echo $user ?>" class="form-control" readonly>
            			</div>
            			<div class="modal-window1">
            				<input type="button" name="submitEditUser" onclick="submitEdit()" value="Submit" class="btn btn-success ">
            			</div>
            		</form>
            	</div>
            </div>
	   </div>

	   </div>
	<?php 
		} 
	?>
</div>
<script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'rowReorder.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'responsive.dataTables.min.js'?>"></script>

<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#table_id').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });
});
</script>