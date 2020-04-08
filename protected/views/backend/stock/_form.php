<link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/themes/backend/bootstrap/dist/css/bootstrap-datepicker.css" type="text/css" media="all" />
<script src="<?=Yii::app()->baseUrl;?>/themes/backend/bootstrap/dist/js/bootstrap-datepicker-custom.js" type="text/javascript"></script>
<script src="<?=Yii::app()->baseUrl;?>/themes/backend/bootstrap/dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<style type="text/css">
	.select2-selection__rendered {
	    line-height: 31px !important;
	}
	.select2-container .select2-selection--single {
	    height: 35px !important;
	}
	.select2-selection__arrow {
	    height: 34px !important;
	}
</style>
<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */

$Model = new Product();
$ProductList = $Model->GetProductAll();
?>

<div class="form">
	<div class="row">
		<div class="col-md-9 col-lg-9">
			<label for="sel2">ชื่อสินค้า</label>
			<select id="prodict" class="form-control" style="height:50px;">
				<?php foreach ($ProductList as $rs): ?>
				<option value="<?php echo $rs['product_id'] ?>"><?php echo $rs['product_name'] ?></option>
			<?php endforeach;?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-lg-3">
            <label for="sel2">วันที่นำเข้า</label>
            <input id="datestart" class="datepicker form-control" data-date-format="dd/mm/yyyy">
	    </div>
	    <div class="col-md-3 col-lg-3">
			<label for="sel3">วันหมดอายุ</label>
			<input id="dateend" class="datepicker form-control" data-date-format="dd/mm/yyyy">
	    </div>
	</div>
</div><!-- form -->


<script type="text/javascript">
    $(document).ready(function () {
        $("#prodict").select2({
            //placeholder: "ชื่อสินค้า",
            allowClear: false,
            multiple: false,
            maximumSelectionSize: 1,
        });

		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
			//todayBtn: true,
			todayHighlight:'TRUE',
			autoclose: true,
			language: 'th',            //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
			thaiyear: true              //Set เป็นปี พ.ศ.
        }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
    });
</script>