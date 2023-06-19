<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.prod-img{
		width: 5em;
    	max-height: 8em;
		object-fit:scale-down;
		object-position:center center;
	}

	.bg_image{
    background: url(../uploads/cover_inventory.jpg);
	background-size: cover;
	}
</style>
<div class="card rounded-0 card-navy">
	<div class="bg_image card-header">
		<h3 class="display-4 text-light">Készlet</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-lightblue">
						<th>#</th>
						<th>Bevételezés dátuma</th>
						<th>Kép</th>
						<th>Termékmegnevezés</th>
						<th>Elérhető</th>
						<th>Eladott</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, (coalesce((SELECT SUM(quantity) FROM `inventory_list` where product_id = product_list.id),0) - coalesce((SELECT SUM(tp.qty) FROM `worksheet_products` tp inner join `worksheet_list` tl on tp.worksheet_id = tl.id where tp.product_id = product_list.id and tl.status != 4),0)) as `available`,coalesce((SELECT SUM(tp.qty) FROM `worksheet_products` tp inner join `worksheet_list` tl on tp.worksheet_id = tl.id where tp.product_id = product_list.id and tl.status != 4),0) as `sold` from `product_list` where delete_flag = 0 order by `name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td class="text-center">
								<img class="img-thumbnai prod-img" src="<?= validate_image($row['image_path']) ?>" alt="">
							</td>
							<td><?php echo $row['name'] ?></td>
							<td class="text-right"><?php echo $row['available'] ?></td>
							<td class="text-right"><?php echo $row['sold'] ?></td>
							<td align="center">
								 <a href="./?page=inventory/view_details&id=<?= $row['id'] ?>" class="btn btn-flat p-1 btn-default btn-sm ">
				                  		<i class="far fa-eye"></i> Nyilvántartás
				                  </a>
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
</script>