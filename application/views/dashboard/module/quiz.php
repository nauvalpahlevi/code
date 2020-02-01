<?php 

	
	if(isset($_SESSION['start']))
	{
		$runtime = time() - $_SESSION['start'];	
	}else{
		$_SESSION['start'] = time();
		$runtime = 0;
	}
?>
<style type="text/css">
	.jarakOption{
		margin-left: 35px;
		margin-right: 15px;
	}
	.jarakCheck{
		margin-left: 15px;
	}
</style>
<div id="timer_place" style="text-align: center;">
	<?php foreach($timer as $StartTime){
		
		$temp_waktu = ($StartTime['timer']*60) - $runtime; //dijadikan detik dan dikurangi waktu yang berlalu
   		$temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    	$temp_detik = $temp_waktu%60; 
    	if ($temp_menit < 60) { 
        /* Apabila $temp_menit yang kurang dari 60 meni */
        $jam    = 0; 
        $menit  = $temp_menit; 
        $detik  = $temp_detik; 
    } else { 
        /* Apabila $temp_menit lebih dari 60 menit */           
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
    }            
	?>
		<div id="timer" style="font-size: 15px;"></div>
	<?php } ?>
</div>
<!-- <div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'> -->
<form action="<?php echo base_url('dashboard/kuisioner/submit')?>" id="frmSoal" method="POST" >

	<table width="100%" border="0" id="soal">
		 	<thead>
		 		
		 	<tr>
	   	       <!-- <th width="0"><font color="#000000"></font></th>  -->
		       <th width="17"><font color="#000000">No.</font></th> 
		       <th width="17"><font color="#000000">Pertanyaan</font></th>
		       <th width="17"><font color="#000000">A</font></th>
		       <th width="17"><font color="#000000">B</font></th>
		       <th width="17"><font color="#000000">C</font></th>
		       <th width="17"><font color="#000000">D</font></th>
		     </tr>
		    </thead> 
		    <tbody>
		    		
		    	<?php 
		    		$no = 1;

		    		foreach($soal->result() as $jawab){
		    			// print_r($jawab);exit;
		    			$id    = $jawab->id_soal;
						$tanyaan = $jawab->soal;
		    			$jawabA = $jawab->A;
		    			$jawabB = $jawab->B;
		    			$jawabC = $jawab->C;
		    			$jawabD = $jawab->D;
		    		
		    	?>
		  	<tr>
		  		<input type="hidden" value="<?php echo $jawab->id_soal ?>" name="id" >
		  		<input type="hidden" value="<?php $hitung->num_rows() ?>" name="jumlah">
		  		<td><?=$no?></td>
		  		<td style="width:300px"><?=$tanyaan?></td>
		  		<td style="margin-left: 15px"><input type="radio" name="pilihan[<?php echo $jawab->id_soal; ?>]" id="pilihanxxA" value="A"><?php echo $jawabA?></td>
		  		<td><input type="radio" name="pilihan[<?php echo $jawab->id_soal; ?>]" value="B" id="pilihanxxB"><?php echo $jawabB?></td>
		  		<td><input type="radio" name="pilihan[<?php echo $jawab->id_soal; ?>]" value="C" id="pilihanxxC"><?php echo $jawabC?></td>
		  		<td><input type="radio" name="pilihan[<?php echo $jawab->id_soal; ?>]" value="D" id="pilihanxxD"><?php echo $jawabD?></td>
		  	</tr>
			 <?php $no++; } ?>
			
			
			</tbody>
	</table>
	 <input type="submit" name="finishQuestion" id="finishQuestion" class="btn btn-success" value="Finish">
	</form>
	<div class="row">
        <div class="col">
           
        </div>
    </div>
</div>

<script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>" type="text/javascript"></script>

<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>" type="text/javascript"></script>

<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url().'rowReorder.dataTables.min.js'?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url().'responsive.dataTables.min.js'?>" type="text/javascript"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
            */
            var detik   = <?= $detik; ?>;
            var menit   = <?= $menit; ?>;
            var jam     = <?= $jam; ?>;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style=color:red';
                };
  
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h1 align="center" style="font-size:20px" '+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h1><hr>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
  
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                             
                        if(jam < 0) { 
                            clearInterval(hitung); 
                            /** Variable yang digunakan untuk submit secara otomatis di Form */
                            var frmSoal = document.getElementById("frmSoal"); 
                            alert('Waktu Anda telah habis, Jika ingin mencoba lagi silahkan dihapus dulu SESSION browser anda');
                            frmSoal.submit(); 
                            
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();

            var table = $('#soal').DataTable( {

		        rowReorder: {

		            selector: 'td:nth-child(2)'

		        },

		        responsive: true,
		        "searching" : false,
		        "sorting" : false

		    });

        });

		
</script>