<div id="header">
<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
	
<script type="text/javascript">
		
$(document).ready(function(){	
			
$("#slider").easySlider({
				
auto: true, 
				
continuous: true
			
});
		
});	
	
</script>
	 
<div id="slider">

		<ul>
		<li><img src="img/<?php echo $img['img1'] ?>.jpg"/></a></li>

		<li><img src="img/<?php echo $img['img2'] ?>.jpg"/></a></li>

		<li><img src="img/<?php echo $img['img3'] ?>.jpg"/></a></li>
		<li><img src="img/<?php echo $img['img4'] ?>.jpg"/></a></li>


		<li><img src="img/<?php echo $img['img5'] ?>.jpg"/></a></li>
				
		</ul>
		
		</div>

</div> 