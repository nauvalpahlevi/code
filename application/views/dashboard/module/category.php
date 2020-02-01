
<div class="category-trainee">
	<div class="sub-category">
			<?php
				foreach($category as $cat){
					json_encode($cat);
			?>
		<div class="section-category">
			<a href="<?php echo base_url('dashboard/category/'.$cat['link'])?>"><h6><?php echo $cat['category']?></h6><i class="<?php echo $cat['class'] ?>" ></i></a>
			
		</div>
		<?php 
				} 
			?>
	</div>
</div>