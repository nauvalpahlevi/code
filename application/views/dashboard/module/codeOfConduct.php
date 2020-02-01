	
	<div class="" style="width:100%;min-height:auto;margin-bottom: 40px">
		<div class="row">
			<h6>Code of Conduct</h6>
		</div>
		
			<form action="<?php echo base_url('dashboard/human_capital/CoC') ?>" method="GET" id="form_search">
				<input type="text" name="title" id="title" class="form-setting form-control" placeholder="I will search.." autocomplete="off">
				<button class="btn btn-info" type="submit">Search</button>
			</form>
	</div>
	<h6>Search Result</h6>6
				<table class="table table-striped" id="result_search">
			<thead>
				<tr>
					<th>No.</th>
					<th>Title</th>
					<th>Content</th>
					<th>Department</th>
					<th>Created By</th>
					<th>Lampiran</th>
				</tr>
			</thead>

			<tbody>
			<?php
				$no = 1;
				foreach($data as $result){
					if($result['category_id'] == 6){
						$depart = "Human Capital";
					}
			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $result['title'] ?></td>
					<td><?php echo $result['content'] ?></td>
					<td><?php echo $depart ?>
					</td>
					<td><?php echo $result['created_by'] ?></td>
					<td id="attch"><input type="button" class="btn btn-success" value="<?php echo $result['lampiran']?> / Download Here" class="btn" onclick="location.href='<?php echo base_url('assets/doc/'.$result['lampiran'])?>' "></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	
<script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'rowReorder.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'responsive.dataTables.min.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){

       $('#title').autocomplete({
                source: "<?php echo site_url('dashboard/category/get_auto');?>",
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#form_search").submit(); 
                }
            });

	});
	$(document).ready(function() {
	    var table = $('#result_search').DataTable( {
	        rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
	        responsive: true,
	        "searching" : false
	    });
	});

</script>