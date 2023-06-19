<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.bg_image{
    background: url(../uploads/cover_mechanics.jpg); 
	background-size: cover;
	}
</style>
<div class="card rounded-0 card-navy">
	<div class="bg_image card-header">
		<h3 class="display-4 text-light">Szerelők</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body">
	<a href="javascript:void(0)" id="create_new" class="btn btn-lg btn-primary font-weight-bold"><span class="fas fa-plus"></span>  Új szerelő</a>
        <div class="container-fluid">
			<table class="table table-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="50%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-lightblue">
						<th>#</th>
						<th>Létrehozás dátuma</th>
						<th>Név</th>
						<th>Státusz</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *,concat(lastname, ' ', coalesce(concat(firstname, ' '),''), middlename) as `name` from `mechanic_list` where delete_flag = 0 order by `name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_added'])) ?></td>
							<td><?php echo $row['name'] ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Aktív</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inaktív</span>
                                <?php endif; ?>
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Műveletek
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Szerkesztés</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Törlés</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Biztos benne, hogy végleg törölni akarja a szerelőt?","delete_mechanic",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Új szerelő hozzáadása","mechanics/manage_mechanic.php")
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Szerelő adatainak frissítése","mechanics/manage_mechanic.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			language: {
			           "search": "Keresés",
					   "infoFiltered": "",
					   "infoEmpty": "",
					   "info": "",
					   "lengthMenu": "",
					   "zeroRecords": "Nincs találat.",
					   	paginate: {
      							next: 'Következő', // or '→'
      							previous: 'Előző' // or '←' 
			         }
					},
			columnDefs: [
					{ orderable: false, targets: [4,5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_mechanic($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_mechanic",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>