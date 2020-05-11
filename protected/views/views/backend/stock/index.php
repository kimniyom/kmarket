<?php
/* @var $this StockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'สต๊อกสินค้า',
);

?>

<h4>สต๊อกสินค้า | 
	<a href="<?php echo Yii::app()->createUrl('backend/stock/create')?>"><button type=" button" class="btn btn-warning"><i class="fa fa-plus"></i> เพิ่มสต๊อกสินค้า</button></a></h4>

<table class="table" id="stock-product">
	<thead>
		<tr>
			<th>#</th>
			<th>รหัส</th>
			<th>ชื่อสินค้า</th>
			<th>ราคา</th>
			<th>คงเหลือ</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0; foreach($stock as $rs): $i++?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $rs['product_id'] ?></td>
			<td><?php echo $rs['product_name'] ?></td>
			<td style="text-align: right; font-weight: bold;"><?php echo ($rs['product_price_pro'] > 0) ? '<font style="text-decoration: line-through; color:red;">'.$rs['product_price']."</font>".$rs['product_price_pro'] : $rs['product_price'];?></td>
			<td style=" text-align: right; font-weight: bold;">
				<?php echo ($rs['total'] > 0) ? "<font style='color:green'>".$rs['total']."</font>" : "<font style='color:red'>".$rs['total']."</font>"; ?>
				</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#stock-product").dataTable({
            //"sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            bLengthChange: false, // แสดงจำนวน record ที่จะแสดงในตาราง
            iDisplayLength: 100000, // กำหนดค่า default ของจำนวน record
            bFilter: true, // แสดง search box
            dom: 'Bfrtip',
	        buttons: [
	            'copyHtml5',
	            'excelHtml5',
	            //'csvHtml5',
	            //'pdfHtml5'
	        ]
                    //"sScrollY": "400px", // กำหนดความสูงของ ตาราง
        });
    });
</script>