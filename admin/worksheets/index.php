<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
.bg_image {
    background: url("../uploads/cover_worksheet.jpg");
	background-size: cover;
	}	
</style>
<div class="card rounded-0 card-navy">
	<div class="bg_image card-header">
	<?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?> <h3 class="display-4 text-light">Munkalapok</h3> <?php endif; ?>
	<?php if($_settings->userdata('type') == 3): ?> <h3 class="display-4">Javítási állapot lekérdezése</h3><?php endif; ?>
		
	</div>
	<div class="card-body">
	<div class="card-tools">
		<?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?><a href="./?page=worksheets/manage_worksheet" id="create_new" class="btn btn-lg btn-primary font-weight-bold"><span class="fas fa-plus"></span> Új munkalap</a> <?php endif; ?>
		</div>
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-bordered">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr class="bg-lightblue">
						<th>#</th>
						<th>Utoljára frissítve</th>
						<th>Kód</th>
						<th>Ügyfél</th>
						<th>Gépjármű megnevezés</th>
						<th>Rendszám</th>
						<th>Összeg</th>
						<th>Státusz</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						if($_settings->userdata('type') == 3): // ugyfel eseten lekerdezes
						$qry = $conn->query("SELECT * FROM `worksheet_list` where client_name like'%{$_settings->userdata('firstname')}%' and client_name like '%{$_settings->userdata('lastname')}%'  order by unix_timestamp(date_updated) desc ");
						else:
						$qry = $conn->query("SELECT * FROM `worksheet_list` order by unix_timestamp(date_updated) desc ");
						endif;
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><p class="m-0 truncate-1"><?= $row['code'] ?></p></td>
							<td><p class="m-0 truncate-1"><?= $row['client_name'] ?></p></td>
							<td><p class="m-0 truncate-1"><?= $row['vehicle_name'] ?></p></td>
							<td><p class="m-0 truncate-1"><?= $row['plate_number'] ?></p></td>
							<td class='text-right'><?= format_num($row['amount']); echo " Ft"; ?></td>
							<td class="text-center">
								<?php 
								switch($row['status']){
									case 0:
										echo '<span class="badge badge-default border px-3 rounded-pill">Függő</span>';
										break;
									case 1:
										echo '<span class="badge badge-primary px-3 rounded-pill">Folyamatban</span>';
										break;
									case 2:
										echo '<span class="badge badge-success px-3 rounded-pill">Befejezett</span>';
										break;
									case 3:
										echo '<span class="badge badge-success bg-gradient-teal px-3 rounded-pill">Fizetett</span>';
										break;
									case 4:
										echo '<span class="badge badge-danger px-3 rounded-pill">Törölve</span>';
										break;
								}
								?>
                            </td>
							<td align="center">
								<a class="btn btn-default bg-gradient-light btn-flat btn-sm" href="?page=worksheets/view_details&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> Megtekintés</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
  $(document).ready( function() {
			       $('.table').dataTable( {
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
					}
			       } );
			     } );
</script>