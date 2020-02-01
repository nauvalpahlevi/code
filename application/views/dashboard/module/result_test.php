<?php

foreach($ref_nilai as $daata){

	$score = $daata['score'];


}
	$user = $this->session->userdata('Username');
	$name = $this->session->userdata('Name');
	$depart = $this->session->userdata('Department');

?>

<div class="row">
	<div class="col-md-7">
		<div class="card card-header" style="background: #4682B4;color:white">
			Hasil Quiz Anda
		</div>
		<div class="card-body">
			<!-- DISINI -->
			<h3><?=$name?>, Sudah Mengerjakan Quiz</h3>
			<table width="100%">
				<thead>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?=$user?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><?=$name?></td>
					</tr>
					<tr>
						<td>Department </td>
						<td>:</td>
						<td><?=$depart?></td>
					</tr>
					<tr>
						<td>Score</td>
						<td>:</td>
						<td><?=$score?></td>
					</tr>
					<tr>
						<td>Benar</td>
						<td>:</td>
						<td><?=$daata['benar']?></td>
					</tr>
					<tr>
						<td>Salah</td>
						<td>:</td>
						<td><?=$daata['salah']?></td>
					</tr>
					<tr>
						<td>Tidak Terjawab</td>
						<td>:</td>
						<td><?=$daata['kosong']?></td>
					</tr>
					<tr>
						
						<td><h3 style="font-style: italic"><center><?=$daata['keterangan']?></center></h3></td>
						
					</tr>
				</thead>
				
			</table>
		</div>
	</div>
</div>
