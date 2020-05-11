<?php
//$Categorys = Category::model()->findAll();
$Categorys = Yii::app()->db->createCommand("select * from category order by level asc")->queryAll();
?>
<br/><br/><br/>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="boxsearchproduct" name="boxsearchproduct" placeholder="ชื่อสินค้าที่ต้องการค้นหา...">
                    <div class="input-group-addon" onclick="searchProduct()"><i class="fa fa-search"></i></div>
                </div>
            </div>

        </div>
    </div>
    <h4 class="font-supermarket" style=" font-weight: bold;">หมวดสินค้า</h4>
    <div class="list-group font-supermarket" style=" margin-top: 10px; font-size: 16px; font-weight: bold;">
        <?php foreach ($Categorys as $rs): ?>
            <a href="<?php echo Yii::app()->createUrl('frontend/product/category', array("id" => $rs['id'])) ?>" class="list-group-item"><?php echo $rs['categoryname'] ?> <i class="fa fa-chevron-right pull-right" style=" margin-top: 6px;"></i></a>
            <?php endforeach; ?>
    </div>
</div>

<script type="text/javascript">
    setFocus();
    $(document).ready(function() {
        $("#b-search").css({'color': 'red'});
    });

    function setFocus() {
        $("#boxsearchproduct").focus();
        return false;
    }

    function searchProduct() {
        var url = "<?php echo Yii::app()->createUrl('frontend/product/search') ?>";
        var search = $("#boxsearchproduct").val();
        if (search == "") {
            $("#boxsearchproduct").focus();
            return false;
        }
        window.location = url + "/product/" + search;
    }
</script>