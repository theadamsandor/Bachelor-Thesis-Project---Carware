<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `worksheet_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k)){
                $$k = $v;
            }
        }
    }else{
        echo '<script> alert("Unknown worksheet\'s ID."); location.replace("./?page=worksheets"); </script>';
    }
}
?>
<div class="content py-3">
    <div class="container-fluid">
        <div class="card card-outline card-outline rounded-0 shadow blur">
            <div class="card-header">
                <h5 class="card-title"><?= isset($id) ? "Update ". $code . " worksheet" : "Új munkalap" ?></h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="worksheet-form">
                        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                        <input type="hidden" name="amount" value="<?= isset($amount) ? $amount : '' ?>">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="client_name" class="control-label">Ügyfél neve</label>
                                    <input type="text" name="client_name" id="client_name" class="form-control form-control-sm rounded-0" value="<?= isset($client_name) ? $client_name : "" ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="contact" class="control-label">Elérhetőség</label>
                                    <input type="text" name="contact" id="contact" class="form-control form-control-sm rounded-0" value="<?= isset($contact) ? $contact : "" ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="email" class="control-label">Email cím</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-sm rounded-0" value="<?= isset($email) ? $email : "" ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="address" class="control-label">Lakcím</label>
                                    <textarea name="address" id="address" class="form-control form-control-sm rounded-0" required="required"><?= isset($address) ? $address : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="contac" class="control-labe">Gépjármű megnevezés</label>
                                    <input type="text" name="vehicle_name" id="vehicle_name" class="form-control form-control-sm rounded-0" value="<?= isset($vehicle_name) ? $vehicle_name : "" ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mb-3">
                                    <label for="email" class="control-label">Rendszám</label>
                                    <input type="text" name="plate_number" id="plate_number" class="form-control form-control-sm rounded-0" value="<?= isset($plate_number) ? $plate_number : "" ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <fieldset>
                                    <legend>Szolgáltatások</legend>
                                    <div class="row align-items-end">
                                        <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group mb-0">
                                                <label for="service_sel" class="control-label">Válaszd ki a szolgáltatást</label>
                                                <select id="service_sel" class="form-control form-control-sm rounded">
                                                    <option value="" disabled selected></option>
                                                    <?php 
                                                    $service_qry = $conn->query("SELECT * FROM `service_list` where delete_flag = 0 and `status` = 1 order by `name`");
                                                    while($row = $service_qry->fetch_assoc()):
                                                    ?>
                                                    <option value="<?= $row['id'] ?>" data-price = "<?= $row['price'] ?>"><?= $row['name'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <button class="btn btn-default bg-gradient-lightblue btn-sm rounded-0" type="button" id="add_service"><i class="fa fa-plus"></i> Hozzáad</button>
                                        </div>
                                    </div>
                                    <div class="clear-fix mb-2"></div>
                                    <table class="table table-striped table-bordered" id="service-list">
                                        <colgroup>
                                            <col width="10%">
                                            <col width="60%">
                                            <col width="30%">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-gradient-lightblue">
                                                <th class="text-center"></th>
                                                <th class="text-center">Szolgáltatás</th>
                                                <th class="text-center">Ár</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $service_amount = 0;
                                            if(isset($id)):
                                            $ts_qry = $conn->query("SELECT ts.*, s.name as `service` FROM `worksheet_services` ts inner join `service_list` s on ts.service_id = s.id where ts.`worksheet_id` = '{$id}' ");
                                            while($row = $ts_qry->fetch_assoc()):
                                                $service_amount += $row['price'];
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <button class="btn btn-outline-danger btn-sm rounded-0 rem-service" type="button"><i class="fa fa-times"></i></button>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="service_id[]" value="<?= $row['service_id'] ?>">
                                                    <input type="hidden" name="service_price[]" value="<?= $row['price'] ?>">
                                                    <span class="service_name"><?= $row['service'] ?></span>
                                                </td>
                                                <td class="text-right service_price"><?= format_num($row['price']); echo " Ft"; ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-gradient-secondary">
                                                <th colspan="2" class="text-center">Összesen</th>
                                                <th class="text-right" id="service_total"><?= isset($service_amount) ? format_num($service_amount): 0?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <fieldset>
                                    <legend>Felhasznált termékek</legend>
                                    <div class="row align-items-end">
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group mb-0">
                                                <label for="product_sel" class="control-label">Válaszd ki a terméket</label>
                                                <select id="product_sel" class="form-control form-control-sm rounded">
                                                    <option value="" disabled selected></option>
                                                    <?php 
                                                    $product_qry = $conn->query("SELECT * FROM `product_list` where delete_flag = 0 and `status` = 1 and (coalesce((SELECT SUM(quantity) FROM `inventory_list` where product_id = product_list.id),0) - coalesce((SELECT SUM(tp.qty) FROM `worksheet_products` tp inner join `worksheet_list` tl on tp.worksheet_id = tl.id where tp.product_id = product_list.id and tl.status != 4),0)) > 0 ".(isset($id) ? " or id = '{$id}' " : "")." order by `name`");
                                                    while($row = $product_qry->fetch_assoc()):
                                                    ?>
                                                    <option value="<?= $row['id'] ?>" data-price = "<?= $row['price'] ?>"><?= $row['name'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <button class="btn btn-default bg-gradient-lightblue btn-sm rounded-0" type="button" id="add_product"><i class="fa fa-plus"></i> Hozzáad</button>
                                        </div>
                                    </div>
                                    <div class="clear-fix mb-2"></div>
                                    <table class="table table-striped table-bordered" id="product-list">
                                        <colgroup>
                                            <col width="5%">
                                            <col width="40%">
                                            <col width="15%">
                                            <col width="20%">
                                            <col width="20%">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-gradient-lightblue">
                                                <th class="text-center"></th>
                                                <th class="text-center">Termék neve</th>
                                                <th class="text-center">Mennyiség</th>
                                                <th class="text-center">Ár</th>
                                                <th class="text-center">Összesen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $product_total = 0;
                                            if(isset($id)):
                                            $tp_qry = $conn->query("SELECT tp.*, p.name as `product` FROM `worksheet_products` tp inner join `product_list` p on tp.product_id = p.id where tp.`worksheet_id` = '{$id}' ");
                                            while($row = $tp_qry->fetch_assoc()):
                                                $product_total += ($row['price'] * $row['qty']);
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <button class="btn btn-outline-danger btn-sm rounded-0 rem-product" type="button"><i class="fa fa-times"></i></button>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="product_id[]" value="<?= $row['product_id'] ?>">
                                                    <input type="hidden" name="product_price[]" value="<?= $row['price'] ?>">
                                                    <span class="product_name"><?= $row['product'] ?></span>
                                                </td>
                                                <td class=""><input type="number" min="1" class="form-control form-control-sm rounded-0 text-right" name="product_qty[]" value="<?= $row['qty'] ?>"></td>
                                                <td class="text-right product_price"><?= $row['price'] ?></td>
                                                <td class="text-right product_total"><?= format_num($row['price'] * $row['qty']) ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-gradient-secondary">
                                                <th colspan="4" class="text-center">Összesen</th>
                                                <th class="text-right" id="product_total"><?= isset($product_total) ? format_num($product_total): 0 ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                        <div class="clear-fix mb-3"></div>
                        <h2 class="text-navy text-right">Összesen fizetendő összeg: <b id="amount"><?= isset($amount) ? format_num($amount) : "0"; echo " Ft"; ?></b></h2>
                        <hr>
                        <?php if($_settings->userdata('type') == 3 && !isset($id)): ?>
                            <input type="hidden" name="mechanic_id" value="<?= $_settings->userdata('id') ?>">
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') != 3): ?>
                        <fieldset>
                            <legend>Szerelő hozzárendelés</legend>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <select name="mechanic_id" id="mechanic_id" class="form-control form-control rounded-0">
                                        <option value="" disabled <?= !isset($mechanic_id) ? "selected" : "" ?>></option>
                                        <option value="" <?= isset($mechanic_id) && in_array($mechanic_id,[null,""]) ? "selected" : "" ?>>Nem definiált</option>
                                        <?php 
                                        $mechanic_qry = $conn->query("SELECT *,concat(lastname,' ', coalesce(concat(firstname,' '),''), middlename) as `name` FROM `mechanic_list` where delete_flag = 0 and `status` = 1 ".(isset($mechanic_id) && !is_null($mechanic_id) ? " or id = '{$mechanic_id}' " : '')." order by `name` asc");
                                        while($row = $mechanic_qry->fetch_array()):
                                        ?>
                                        <option value="<?= $row['id'] ?>" <?= isset($mechanic_id) && $mechanic_id == $row['id'] ? "selected" : "" ?>><?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="card-footer py-2 text-right">
                <button class="btn btn-primary rounded-0" form="worksheet-form">Munkalap elmentése</button>
                <?php if(!isset($id)): ?>
                <a class="btn btn-default border rounded-0" href="./?page=worksheets">Törlés</a>
                <?php else: ?>
                <a class="btn btn-default border rounded-0" href="./?page=worksheets/view_details&id=<?= $id ?>">Törlés</a>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>
<noscript id="service-clone">
    <tr>
        <td class="text-center">
            <button class="btn btn-outline-danger btn-sm rounded-0 rem-service" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td>
            <input type="hidden" name="service_id[]" value="">
            <input type="hidden" name="service_price[]" value="0">
            <span class="service_name"></span>
        </td>
        <td class="text-right service_price"></td>
    </tr>
</noscript>
<noscript id="product-clone">
    <tr>
        <td class="text-center">
            <button class="btn btn-outline-danger btn-sm rounded-0 rem-product" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="">
            <input type="hidden" name="product_price[]" value="0">
            <span class="product_name"></span>
        </td>
        <td class=""><input type="number" min="1" class="form-control form-control-sm rounded-0 text-right" name="product_qty[]" value="1"></td>
        <td class="text-right product_price"></td>
        <td class="text-right product_total"></td>
    </tr>
</noscript>
<script>
    function calc_total_amount(){
        var total = 0;
        $('#service-list tbody tr').each(function(){
            total += parseFloat($(this).find('[name="service_price[]"]').val())
        })
        $('#product-list tbody tr').each(function(){
            var qty = $(this).find('[name="product_qty[]"]').val()
            qty = qty > 0 ? qty : 0
            total += (parseFloat($(this).find('[name="product_price[]"]').val()) * parseFloat(qty))
        })
        $('[name="amount"]').val(parseFloat(total))
        $('#amount').text(parseFloat(total).toLocaleString('en-US'))
    }
    function calc_service(){
        var total = 0;
        $('#service-list tbody tr').each(function(){
            total += parseFloat($(this).find('[name="service_price[]"]').val())
        })
        $('#service_total').text(parseFloat(total).toLocaleString('en-US'))
        calc_total_amount()
    }
    function calc_product(){
        var total = 0;
        
        $('#product-list tbody tr').each(function(){
            var qty = $(this).find('[name="product_qty[]"]').val()
            qty = qty > 0 ? qty : 0
            total += (parseFloat($(this).find('[name="product_price[]"]').val()) * parseFloat(qty))
        })
        $('#product_total').text(parseFloat(total).toLocaleString('en-US'))
        calc_total_amount()
    }
    $(function(){
        $('select#mechanic_id').select2({
            placeholder:"Itt válaszd ki a szerelőt",
            width:'100%',
            containerCssClass:'form-control form-control-sm rounded-0'
        })
        $('#service_sel').select2({
            placeholder:"Itt válaszd ki a szolgáltatást",
            width:'100%',
            containerCssClass:'form-control form-control-sm rounded-0'
        })
        $('#product_sel').select2({
            placeholder:"Itt válaszd ki a terméket",
            width:'100%',
            containerCssClass:'form-control form-control-sm rounded-0'
        })
        $('#service-list tbody tr').find('.rem-service').click(function(){
            var tr = $(this).closest('tr')
            if(confirm("Biztos benne, hogy a(z) "+(tr.find('.service_name').text())+" eltávolítja a szolgáltatások listájából?") === true){
                tr.remove()
                calc_service()
            }
        })
        $('#product-list tbody tr').find('.rem-product').click(function(){
            var tr = $(this).closest('tr')
            if(confirm("Biztos benne, hogy a(z) "+(tr.find('.product_name').text())+" eltávolítja a termékek listájából?") === true){
                tr.remove()
                calc_product()
            }
        })
        $('#product-list tbody tr').find('[name="product_qty[]"]').on('input change', function(){
            var tr = $(this).closest('tr')
            var qty = $(this).val()
            qty = qty > 0 ? qty : 0
            var total = parseFloat(qty) * parseFloat(price)
            tr.find('.product_total').text(parseFloat(total).toLocaleString())
            calc_product()

        })
        $('#add_service').click(function(){
            if($('#service_sel').val() == null)
            return false;
            var id = $('#service_sel').val()
            if($('#service-list tbody tr input[name="service_id[]"][value="'+id+'"]').length > 0){
                alert("Service already on the list.")
                return false;
            }
            var name = $('#service_sel option[value="'+id+'"]').text()
            var price = $('#service_sel option[value="'+id+'"]').attr('data-price')
            var tr = $($('noscript#service-clone').html()).clone()
            tr.find('input[name="service_id[]"]').val(id)
            tr.find('input[name="service_price[]"]').val(price)
            tr.find('.service_name').text(name)
            tr.find('.service_price').text(parseFloat(price).toLocaleString())
            $('#service-list tbody').append(tr)
            calc_service()
            tr.find('.rem-service').click(function(){
                if(confirm("Biztos benne, hogy a(z) "+name+" eltávolítja a szolgáltatások listájából?") === true){
                    tr.remove()
                    calc_service()
                }
            })
            $('#service_sel').val('').trigger("change")
        })
        $('#add_product').click(function(){
            if($('#product_sel').val() == null)
            return false;
            var id = $('#product_sel').val()
            if($('#product-list tbody tr input[name="product_id[]"][value="'+id+'"]').length > 0){
                alert("Product already on the list.")
                return false;
            }
            var name = $('#product_sel option[value="'+id+'"]').text()
            var price = $('#product_sel option[value="'+id+'"]').attr('data-price')
            var tr = $($('noscript#product-clone').html()).clone()
            tr.find('input[name="product_id[]"]').val(id)
            tr.find('input[name="product_price[]"]').val(price)
            tr.find('.product_name').text(name)
            tr.find('.product_price').text(parseFloat(price).toLocaleString())
            tr.find('.product_total').text(parseFloat(price).toLocaleString())
            $('#product-list tbody').append(tr)
            calc_product()
            tr.find('.rem-product').click(function(){
                if(confirm("Biztos benne, hogy a(z) "+name+" eltávolítja a termékek listájából?") === true){
                    tr.remove()
                    calc_product()
                }
            })
            tr.find('[name="product_qty[]"]').on('input change', function(){
                var qty = $(this).val()
                qty = qty > 0 ? qty : 0
                var total = parseFloat(qty) * parseFloat(price)
                tr.find('.product_total').text(parseFloat(total).toLocaleString())
                calc_product()

            })
            $('#product_sel').val('').trigger("change")
        })
        $('#product-list, #service-list').find('td, th').addClass('px-2 py-1 align-middle')
        $('#worksheet-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_worksheet",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=worksheets/view_details&id="+resp.tid
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body,.modal").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
					}
				}
			})
		})
    })
</script>