<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
    .user-avatar{
        width:3rem;
        height:3rem;
        object-fit:scale-down;
        object-position:center center;
    }

	.bg_image{
    background: url(../uploads/cover_users.jpg); 
	background-size: cover;
	}
</style>
<div class="card rounded-0 card-navy">
	<div class="bg_image card-header">
		<h3 class="display-4">Felhasználók</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body">
	<a href="./?page=user/manage_user" id="create_new" class="btn btn-lg btn-primary font-weight-bold"><span class="fas fa-plus"></span>  Új felhasználó</a>
        <div class="container-fluid">
			<table class="table table-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-lightblue">
						<th>#</th>
						<th>Utoljára frissítve</th>
						<th>Avatar</th>
						<th>Név</th>
						<th>Felhasználónév</th>
						<th>Típus</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, concat(lastname,' ', firstname) as `name` from `users` where id != '{$_settings->userdata('id')}' order by concat(lastname,' ', firstname) asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_updated'])) ?></td>
							<td class="text-center">
                                <img src="<?= validate_image($row['avatar']) ?>" alt="" class="img-thumbnail rounded-circle user-avatar">
                            </td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td class="text-center">
                                <?php if($row['type'] == 1): ?>
                                    Adminisztrátor
                                <?php elseif($row['type'] == 2): ?>
                                    Személyzet
								<?php elseif($row['type'] == 3): ?>
                                    Ügyfél
                                <?php else: ?>
									N/A
                                <?php endif; ?>
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Műveletek
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="./?page=user/manage_user&id=<?= $row['id'] ?>"><span class="fa fa-edit text-dark"></span> Szerkesztés</a>
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
			_conf("Biztos benne, hogy véglegesen törölni szeretné a felhasználót?","delete_user",[$(this).attr('data-id')])
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
					{ orderable: false, targets: [6] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Users.php?f=delete",
			method:"POST",
			data:{id: $id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(resp == 1){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>