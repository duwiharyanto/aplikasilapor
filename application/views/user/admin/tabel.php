<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			<button onclick="add();" id="add" url="<?= base_url($global->url.'add.html')?>" class="btn btn-outline-primary"><span class="fa fa-plus"></span> Tambah</button>
		</div>			
	</div>	
</div>
<div class="row"> 
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data table</h4>
				<div class="row">
					<div class="col-12">

						<div class="table-responsive"> 
							<table id="datatabel2" class="table" >
				                <thead>
					                <tr>
					                  <th width="5%">No</th>
					                  <th width="15%">Tanggal</th>
					                  <th width="30%">Nama</th>
					                  <th width="20%">Username</th>
					                  <th width="20">Password</th>
					                  <th width="10%" class="text-center">Aksi</th>
					                </tr>
				                </thead>
 								<tbody>
 									<?php $no=1;?>
 									<?php foreach($data AS $val):?>
 										<tr>
	 										<td><?=$no;?></td>
	 										<td><?= date('d-m-Y',strtotime($val->user_terdaftar))?></td>
	 										<td><a href="javascript:void(0)" id="<?=$val->user_id?>" url="<?=base_url($global->url.'edit')?>" class="edit text-primary" data-toggle="tooltip" data-placement="right" title="Edit Data"><?=$val->user_nama?></a></td>
	 										<td><?= $val->user_username?></td>
	 										<td><?= $val->user_password?></td>
	 										<td>
	 											<?php include 'button.php'?>
	 										</td>
 										</tr>
 									<?php $no++; endforeach;?>
 								</tbody>
							</table>                                                 
						</div>
					</div>
				</div>
			</div>
		</div>               
	</div>  
</div>  
<!---->
<?php include 'action.php'; ?>
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	// $(document).ready(function() {
	//     $('#example').DataTable( {
	//         "ajax": '<?php echo site_url($global->url.'getdatasjon/')?>'
	//     } );
	// } );	
</script>