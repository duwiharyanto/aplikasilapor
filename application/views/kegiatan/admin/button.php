
<div class="btn-group">
	<?php if($row->kegiatan_aktif==1):?>
		<a href="javascript:void(0)"  url="<?= base_url($global->url.'aktifasi')?>" onclick="aktifasi(<?=$row->kegiatan_id?>)" class="aktifasi btn btn-flat btn-xs btn-success <?= $global->aktifasi!=true ? 'hide':'' ?>"><span class="fa fa-check"></span></a>
	<?php else:?>
		<a href="javascript:void(0)"  onclick="aktifasi(<?=$row->kegiatan_id?>)"  url="<?= base_url($global->url.'aktifasi')?>" class=" aktifasi btn btn-flat btn-xs btn-danger <?= $global->aktifasi!=true ? 'hide':'' ?>"><span class="fa fa-check"></span></a>
	<?php endif;?>
	<a href="javascript:void(0)" id="<?=$row->kegiatan_id?>" url="<?= base_url($global->url.'detail')?>" class="detail btn btn-flat btn-xs btn-warning <?= $global->detail!=true ? 'hide':'' ?>"><span class="fa fa-eye"></span></a>
	<a href="javascript:void(0)" id="<?=$row->kegiatan_id?>" url="<?= base_url($global->url.'edit')?>" class="edit btn btn-flat btn-xs btn-info <?= $global->edit!=true ? 'hide':'' ?>"><span class="fa fa-pencil"></span></a>
	<a href="javascript:void(0)" url="<?=base_url($global->url.'hapus/')?>"  id="<?=$row->kegiatan_id?>"class="hapus btn btn-flat btn-xs btn-danger <?= $global->delete!=true ? 'hide':'' ?>"><span class="fa fa-trash"></span></a>
	<a href="<?=base_url($global->url.'download/'.$row->kegiatan_file)?>" class="btn btn-flat btn-xs btn-default <?= $global->download!=true ? 'hide':'' ?>"><span class="fa fa-download"></span></a>	
</div>