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
			<div class="row">
				<div class="col-md-9 col-lg-9">
					<label for="sel2">ชื่อสินค้า</label>
					<select id="product" class="form-control" style="height:50px;" onchange="getDetailProduct()">
						<option value="">== เลือกสินค้า ==</option>
						<?php foreach ($ProductList as $rs): ?>
						<option value="<?php echo $rs['product_id'] ?>"><?php echo $rs['product_name'] ?></option>
					<?php endforeach;?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-lg-3">
					<label for="sel2">จำนวนนำเข้า</label>
				<input type="text" class="form-control" name="inputnumber" id="inputnumber" onKeyUp="if(this.value*1!=this.value) this.value='' ;"/>
				</div>
				 <div class="col-md-3 col-lg-3">
					<label for="sel3">วันหมดอายุ</label>
					<input id="dateexpire" class="datepicker form-control" data-date-format="dd/mm/yyyy">
			    </div>
			</div>

			<div class="row" style=" margin-top: 10px;">
				<div class="col-lg-12">
					<button type="button" class="btn btn-success" onclick="AddStocks()">นำเข้าสต๊อก</button>
				</div>
			</div>
			<hr/>
			<h4>ประวัติการนำเข้าสินค้า</h4>
			<div id="history"></div>
		</div>
		<div class="col-md-3 col-lg-3">
			<h4>ข้อมูลสินค้า</h4>
			<hr/>
			<h4 id="detailprice" style="color: red;"></h4>
			<div id="description"></div>
			<h4>ยอดคงเหลือ <span id="total"></span> ชิ้น</h4><br/>
		</div>
	</div>
</div><!-- form -->

<script type="text/javascript">

    $(document).ready(function () {
        $("#product").select2({
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

    function getDetailProduct(){
    	var url = "<?php echo Yii::app()->createUrl('backend/stock/detailproduct') ?>";
    	var product_id = $("#product").val();
    	var data = {product_id: product_id};
    	$.post(url,data,function(res){
    		$("#detailprice").html("ราคา " + res.detail['product_price'] + " บาท");
    		$("#description").html(res.detail['description']);
    		$("#total").html("<font style='color:red; fonr-size:20px;'>" + res.total + "</font>");
    		loadHisyory();
    		//console.log(res.detail['product_name']);
    	},'json');
    }

    function AddStocks(){
    	var url = "<?php echo Yii::app()->createUrl('backend/stock/addstock') ?>";
    	var product_id = $("#product").val(); 
    	var inputnumber = $("#inputnumber").val();
    	var date_expire = $("#dateexpire").val();
    	var dateCon = date_expire.replace("/","");
    	var dateexpire = dateCon.replace("/","");
    	var data = {product_id: product_id,
    		inputnumber: inputnumber,
    		dateexpire: dateexpire};
    	if(product_id == "" || inputnumber == ""){
    		alert("กรอกข้อมูลไม่ครบ..");
    		return false;
    	}

    	$.post(url,data,function(res){
    		if(res == 1){
    			getDetailProduct();
    			loadHisyory();
    			$("#inputnumber").val("");
    		} else {
    			alert("ระบบขัดข้องไม่สามารถเพิ่มข้อมูลได้...");
    			return false;
    		}
    	});
    }

    function loadHisyory(){
    	var url = "<?php echo Yii::app()->createUrl('backend/stock/history') ?>";
    	var product_id = $("#product").val(); 
    	var data = {product_id: product_id};
    	$.post(url,data,function(res){
    		$("#history").html(res);
    	});
    }
</script>