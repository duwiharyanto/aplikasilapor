<div id="view">
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<button onclick="add();" id="add" url="<?= base_url($global->url.'add')?>" class="btn btn-flat btn-block btn-primary"><span class="fa fa-plus"></span> Tambah</button>
			</div>
		</div>
		<div class="col-sm-12">
			<div id="tabelss" url="<?= base_url($global->url.'tabel')?>">
				<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Loading data. Please wait...</div>
			</div>
		</div>
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