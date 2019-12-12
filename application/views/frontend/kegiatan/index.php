<div class="row">
	<div class="col-sm-12">
		<h4 style="border-left: 5px solid #245571; padding-left: 10px">CRUD dengan AJAX</h4>
	</div>
</div>
<div id="view">
	<div id="tabel" url="<?= base_url($global->url.'tabel')?>">
		<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Loading data. Please wait...</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var url=$('#tabel').attr('url');
		    setTimeout(function () {
	        $("#tabel").load(url);
	        //alert(url);
	    }, 200); 		
	})	
</script>
<?php include 'action.php';?>