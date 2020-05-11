<?php
$title = "สินค้า";
$this->breadcrumbs = array(
    $title,
);

$ProductModel = new Product();
?>
<a href="<?php echo Yii::app()->createUrl('backend/product/createproduct') ?>">
    <button type="button" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มสินค้า</button>
</a>
<br/><br/>
<?php
foreach ($category as $rs):
    $Types = ProductType::model()->findAll("category=:category", array(":category" => $rs['id']));
    ?>
    <a href="<?php echo Yii::app()->createUrl('backend/product/category', array("categoryID" => $rs['id'])) ?>" class=" list-group-item active" style=" z-index: 0;">
        หมวด <?php echo $rs['categoryname'] ?>
        <span class="badge">จำนวน <?php echo $ProductModel->countProductCategory($rs['id']) ?></span>
    </a>
    <?php
    foreach ($Types as $rsTypes):
        $sql = "select * from product where type_id = '" . $rsTypes['type_id'] . "' ";
        ?>
        <a href="<?php echo Yii::app()->createUrl('backend/product/getproduct', array("category" => $rs['id'], 'type' => $rsTypes['type_id'])) ?>" class="list-group-item">
            <span class="badge">จำนวน <?php echo $ProductModel->countProductType($rsTypes['type_id']) ?></span>
            <?php echo $rsTypes['type_name'] ?>
        </a>
    <?php endforeach; ?>
<?php endforeach; ?>


