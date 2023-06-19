<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php $date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d"); ?>
<style>
    	.bg_image{
    background: url(../uploads/cover_economy.jpg);
	background-size: cover;
	}
</style>
<div class="card rounded-0 card-navy">
	<div class="bg_image card-header">
		<h3 class="display-4 text-light">Napi szolgáltatás jelentés</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid mb-3">
            <fieldset class="px-2 py-1 border">
                <legend class="w-auto px-3">Szűrő</legend>
                <div class="container-fluid">
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="date" class="control-label">Válassz dátumot</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="date" id="date" value="<?= date("Y-m-d", strtotime($date)) ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary col-lg-10 btn-lg  bg-gradient-primary rounded-0"><i class="fa fa-filter"></i> Szűrés</button>
                                    <button class="btn btn-light col-lg-10 btn-lg bg-gradient-light rounded-0 border" type="button" id="print"><i class="fa fa-print"></i> Nyomtatás</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
		</div>
        <div class="container-fluid" id="printout">
			<table class="table table-hover table-bordered">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-lightblue">
						<th>#</th>
						<th>Dátum</th>
						<th>Munkalap azonosító</th>
						<th>Ügyfél</th>
						<th>Szolgáltatás</th>
						<th>Ár</th>
					</tr>
				</thead>
				<tbody>
					<?php 
                    $total = 0;
					$i = 1;
                    $qry = $conn->query("SELECT ts.*,tl.code, tl.client_name,sl.name as `service`,tl.date_created FROM `worksheet_services` ts inner join worksheet_list tl on ts.worksheet_id = tl.id inner join service_list sl on ts.service_id = sl.id where tl.status != 4 and date(tl.date_created) = '{$date}' order by unix_timestamp(tl.date_updated) asc ");
                    while($row = $qry->fetch_assoc()):
                        $total += $row['price'];
					?>
						<tr>
							<td class="text-center"><?php setlocale(LC_ALL, 'hun_HUN'); echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><?= $row['code'] ?></td>
							<td><?= $row['client_name'] ?></td>
							<td><?= $row['service'] ?></td>
							<td class='text-right'><?= format_num($row['price']) ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
                <tfoot>
                    <th class="py-1 text-center" colspan="5">Összesen</th>
                    <th class="py-1 text-right"><?= format_num($total,0); echo " Ft";?></th>
                </tfoot>
			</table>
		</div>
	</div>
</div>
<noscript id="print-header">
    <div>
    <div class="d-flex w-100">
        <div class="col-2 text-center">
            <img style="height:.8in;width:.8in!important;object-fit:cover;object-position:center center" src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="w-100 img-thumbnail rounded-circle">
        </div>
        <div class="col-8 text-center">
            <div style="line-height:1em">
                <h4 class="text-center mb-0"><?= $_settings->info('name') ?></h4>
                <h3 class="text-center mb-0"><b>Napi szolgáltatás jelentés</b></h3>
                <div class="text-center">a következő napról:</div>
                <h4 class="text-center mb-0"><b><?= date("Y-m-d", strtotime($date)) ?></b></h4>
            </div>
        </div>
    </div>
    <hr>
    </div>
</noscript>
<script>
	$(document).ready(function(){
		$('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = "./?page=reports/daily_service_report&"+$(this).serialize()
        })
        $('#print').click(function(){
            var h = $('head').clone()
            var ph = $($('noscript#print-header').html()).clone()
            var p = $('#printout').clone()
            h.find('title').text('Daily Services Report - Print View')

            start_loader()
            var nw = window.open("", "_blank", "width="+($(window).width() * .8)+", height="+($(window).height() * .8)+", left="+($(window).width() * .1)+", top="+($(window).height() * .1))
                     nw.document.querySelector('head').innerHTML = h.html()
                     nw.document.querySelector('body').innerHTML = ph.html()
                     nw.document.querySelector('body').innerHTML += p[0].outerHTML
                     nw.document.close()
                     setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                             nw.close()
                             end_loader()
                         }, 300);
                     }, 300);
        })
	})
	
</script>