<div id="view">
	<div id="tabel" url="<?= base_url($global->url.'tabel')?>">
		<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Loading data. Please wait...</div>
	</div>
</div>
<?php include 'action.js';?>
<script type="text/javascript">
	    setTimeout(function () {
        var url=$('#tabel').attr('url');
        $("#tabel").load(url);
        //alert(url);
    }, 200); 
</script>
