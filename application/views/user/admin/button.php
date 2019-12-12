<!--
<a href="javascript:void(0)" id="<?=$val->user_id?>" url="<?= base_url($global->url.'detail')?>" class="detail btn btn-outline-primary <?= $global->detail!=true ? 'hide':'' ?>"><span class="mdi mdi-eye "></span></a>

<a href="javascript:void(0)"   id="<?=$val->user_id?>" url="<?= base_url($global->url.'edit')?>" class="edit btn btn-outline-warning <?= $global->edit!=true ? 'hide':'' ?>"><span class="mdi mdi-pencil"></span></a>
-->
<a href="javascript:void(0)"   url="<?=base_url($global->url.'hapus/')?>"  id="<?=$val->user_id?>"class="hapus btn btn-outline-danger <?= $global->delete!=true ? 'hide':'' ?>"><span class="mdi mdi-delete"></span></a>
