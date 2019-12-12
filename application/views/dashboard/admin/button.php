<div class="btn-group">

	<a href="#" id="<?=$row->id?>" url="<?= base_url($global->url.'detail')?>" class="detail btn btn-flat btn-xs btn-success <?= $global->detail!=true ? 'disabled':'' ?>"><span class="fa fa-eye"></span></a>
	<a href="#"   id="<?=$row->id?>" url="<?= base_url($global->url.'edit')?>" class="edit btn btn-flat btn-xs btn-warning <?= $global->detail!=true ? 'disabled':'' ?>"><span class="fa fa-pencil"></span></a>
	<a href="#" url="<?=base_url($global->url.'hapus/'.$row->id)?>"  class="hapus btn btn-flat btn-xs btn-danger <?= $global->detail!=true ? 'disabled':'' ?>"><span class="fa fa-trash"></span></a>
</div>