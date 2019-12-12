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
				<div class="row">
					<div class="col-12">
						<div class="table-responsive"> 
							<table id="datatabel2" class="table" >
				                <thead>
					                <tr>
					                  <th width="5%">No</th>
					                  <th>Status</th>
					                  <th width="15%">Tanggal</th>
					                  <th width="10%">Email</th>
					                  <th width="20%">Nama</th>
					                  <th width="30%">Lapor</th>
					                  <th width="10%" class="text-center">Aksi</th>
					                </tr>
				                </thead>
 								<tbody>
 									<?php $no=1;?>
 									<?php foreach($data AS $val):?>
 										<tr>
	 										<td><?=$no;?></td>
	 										<td>
	 											<?php if($val->lapor_status==0):?>
	 												<label class="badge badge-gradient-danger">Open</label>
	 											<?php elseif($val->lapor_status==1):?>
	 												<label class="badge badge-gradient-success">Close</label>
	 											<?php else:?>
	 												<label class="badge badge-gradient-warning">Pending</label>
	 											<?php endif;?>
	 										</td>
	 										<td><?= date('d-m-Y',strtotime($val->save_at))?></td>
	 										<td><a href="javascript:void(0)" id="<?=$val->lapor_id?>" url="<?=base_url($global->url.'edit')?>" class="edit text-primary" data-toggle="tooltip" data-placement="right" title="Edit Data"><?=$val->lapor_email?></a></td>
	 										<td><?= $val->lapor_nama?></td>
	 										<td><?= $val->lapor_lapor?></td>
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