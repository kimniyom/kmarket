<?php
//session_start();
$this->breadcrumbs = array(
	"รายการที่ต้องจัดส่ง",
);

$OrderModel = new Orders();
$Config = new Configweb_model();
?>
<h3 style=" margin-top: 0px;">รายการที่ต้องจัดส่ง</h3>
<?php if($order) { ?>
<a href="<?php echo Yii::app()->createUrl('backend/orders/printaddress') ?>"  target="_blank">
<button type="button" class="btn btn-default"><i class="fa fa-print"></i> พิพม์รายการทั้งหมด</button></a>
<br/><br/>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
$i = 0;
foreach ($order as $rs): $i++;
	if ($i == 1) {
		$class = "";
		$expanded = "true";
		$panelCol = "in";
	} else {
		$class = "class='panel-title'";
		$expanded = "false";
		$panelCol = "";
	}
	$orderList = $OrderModel->GetListOrder($rs['id']);
	?>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="heading<?php echo $rs['id'] ?>">
			<h4 class="panel-title">
				<a <?php echo $class ?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $rs['id'] ?>" aria-expanded="<?php echo $expanded ?>" aria-controls="collapse<?php echo $rs['id'] ?>">
					คุณ <?php echo $rs['order_fullname'] ?>(<?php echo $Config->thaidate($rs['order_date']) ?>)
				</a>
				<a href="<?php echo Yii::app()->createUrl('backend/orders/printaddress',array("id" => $rs['id'])) ?>"  target="_blank" class="pull-right"><i class="fa fa-print"></i> พิมพ์ใบส่งของ</a>
			</h4>
		</div>
		<div id="collapse<?php echo $rs['id'] ?>" class="panel-collapse collapse <?php echo $panelCol ?>" role="tabpanel" aria-labelledby="heading<?php echo $rs['id'] ?>">
			<div class="panel-body">
				<div class="well">
					<div class="row">
						<div class="col-md-9 col-lg-9">
							<h4>#<?php echo $rs['id'] ?></h4>
							<b>ที่อยู่.</b> <?php echo $rs['order_address'] ?><br/>
							<b>โทร.</b> <?php echo $rs['order_phone'] ?><br/>
							<b>อีเมล์.</b> <?php echo $rs['order_email'] ?><br/>
						</div>
						<div class="col-md-3 col-lg-3" style=" text-align: center;">
							<label>สลิปโอนเงิน</label>
							<center>
								<?php if($rs['slip']) { ?>
									<div class="img_zoom">
										<a class="image-link" href="<?php echo Yii::app()->baseUrl; ?>/uploads/slip/<?php echo $rs['slip']?>">
											<img src="<?php echo Yii::app()->baseUrl ?>/uploads/slip/<?php echo $rs['slip']?>" class="img-responsive" style="max-height: 100px;">
										</a>
									</div>
							<?php } else { ?>
								<p style="color:red;">No Slip</p>
							<?php } ?>
							</center>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style=" text-align: center;">#</th>
							<th>สินค้า</th>
							<th style=" text-align: center;">จำนวน</th>
							<th style=" text-align: center;">ราคาต่อหน่วย</th>
							<th style=" text-align: center;">จำนวนเงิน</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$total_price = 0;
						$num = 0;
						$a = 0;
						$sumRow = 0;
						foreach ($orderList as $meResult):
							$a++;
							$sumRow = ($meResult['order_detail_price'] * $meResult['order_detail_quantity']);
							$total_price = $total_price + $sumRow;
					?>
						<tr>
							<td style=" text-align: center;"><?php echo $a ?></td>
							<td>(<?php echo $meResult['product_id']; ?>) <?php echo $meResult['product_name']; ?><br/>
								- <?php echo $meResult['description'] ?>
							</td>
							<td style="text-align: center;">
								<center><?php echo $meResult['order_detail_quantity'] ?></center>
							</td>
							<td style=" text-align: right;"><?php echo number_format($meResult['order_detail_price'], 2); ?></td>
							<td style=" text-align: right;"><?php echo number_format($sumRow, 2) ?></td>
							</tr>
							<?php
								$num++;
							endforeach;
							?>
							<tr>
								<td colspan="5" style="text-align: right;">
									<h4>
										จำนวนเงินรวมทั้งหมด 
										<font style="color:red;"><?php echo number_format($total_price, 2); ?></font> บาท
									</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class=" panel-footer">
					<div class="row">
						<div class="col-md-5 col-lg-5 col-sm-5">
							<input type="text" name="tracking<?php echo $rs['id'] ?>" id="tracking<?php echo $rs['id'] ?>" class="form-control" placeholder="เลขพัสดุ...">
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<select id="transport<?php echo $rs['id'] ?>" class="form-control">
								<option value="">== บริษัทขนส่ง ==</option>
								<?php foreach($transport as $transports):  ?>
								<option value="<?php echo $transports['id'] ?>"><?php echo $transports['transportname'] ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3">
							<button type="button" class="btn btn-success btn-block" onclick="Savecode('<?php echo $rs['id'] ?>')"><i class="fa fa-save"></i> บันทึก</button>
						</div>
					</div>
				</div>
			</div>
			</div>
		<?php endforeach;?>
	</div>
<?php } else { ?>
	<center class="text-info">
		<i class="fa fa-info fa-5x" style="color:#333333"></i>
		<br/>ไม่มีรายการ
	</center>
<?php } ?>
<script type="text/javascript">
    function Savecode(order_id) {
        var tracking = $("#tracking" + order_id).val();
        var transport = $("#transport" + order_id).val();
        if(tracking == ""){
        	$("#tracking"+ order_id).focus();
        	return false;
        }

        if(transport == ""){
        	$("#transport"+ order_id).focus();
        	return false;
        }
        var r = confirm("ตรวจสอบความถูกต้องก่อนยืนยันรายการ...?");
        if (r == true) {
            var url = "<?php echo Yii::app()->createUrl('backend/orders/savecode') ?>";
            var data = {order_id: order_id,tracking: tracking,transportcompany: transport};
            $.post(url, data, function (datas) {
            	window.location.reload();
                //window.location="<?php //echo Yii::app()->createUrl('backend/orders/view') ?>" + "/id/" + order_id;
            });
        }
    }

    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();

        $('.img_zoom').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true
            }
            // other options
        });

    });

</script>

