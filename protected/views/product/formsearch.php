<br/><br/><br/>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sx-12 col-md-12 col-lg-12">
			<div class="form-inline">
			  <div class="form-group">
			    <div class="input-group">
			      <input type="text" class="form-control" id="searchproduct" placeholder="ชื่อสินค้าที่ต้องการค้นหา...">
			      <div class="input-group-addon" onclick="searchProduct()"><i class="fa fa-search"></i></div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#b-search").addClass("text-danger");
    });

	function searchProduct() {
		var url = "<?php echo Yii::app()->createUrl('frontend/product/search') ?>";
		var search = $("#searchproduct").val();
		if (search == "") {
			$("#searchproduct").focus();
			return false;
		}

		window.location = url + "/product/" + search;
	}
</script>