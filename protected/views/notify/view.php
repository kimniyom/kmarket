<?php
$product_model = new Product();
?>
<br/><br/><br/>
<div class="container" style=" padding-bottom: 20px;  font-family: th;">
    <a href="<?php echo Yii::app()->createUrl('frontend/notify/index') ?>">
        <button type="button" class="btn btn-default" style="text-align: left; border: none;"><span class="lnr lnr-chevron-left"></span> กลับ</button></a><br/><br/>
    <div class="jumbotron">
        <table class="table"  style=" background: #ffffff;">
            <?php
            $totalRow = 0;
            $total_price = 0;
            $num = 0;
            $a = 0;
            foreach ($order as $meResult):
                $a++;
                $totalRow = ($meResult['order_detail_price'] * $meResult['order_detail_quantity']);
                $total_price = $total_price + $totalRow;
                $img_title = $product_model->firstpictures($meResult['product_id']);
                if (!empty($img_title)) {
                    $img = "uploads/product/thumbnail/100-" . $img_title;
                } else {
                    $img = "images/No_image_available.jpg";
                }
                ?>
                <tr>
                    <td style=" text-align: center; width: 100px;">
                        <img src="<?= Yii::app()->baseUrl ?>/<?= $img; ?>" class="img-responsive" alt="Responsive image" id="img-cart"/>
                    </td>
                    <td>
                        <font class="font-supermarket" style=" font-size: 16px;"><?php echo $meResult['product_name']; ?></font><br/>
                        <font class="font-supermarket" style=" font-size: 18px; color: #cc3300; font-weight: bold;"><?php echo number_format($meResult['order_detail_price'], 2); ?> บาท</font><br/>
                        <font class="font-supermarket">จำนวน <?php echo $meResult['order_detail_quantity']; ?></font>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>

            <tr>
                <td colspan="2" style="text-align: right;">
                    <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">รวม <font style=" color: #cc3300;"><?php echo $total_price; ?></font> บาท</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">ค่าจัดส่ง <font style=" color: #cc3300;"><?php echo $detail['transportprice']; ?></font> บาท</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">รวมทั้งหมด <font style=" color: #cc3300;"><?php echo ($total_price + $detail['transportprice']); ?></font> บาท</h4>
                </td>
            </tr>
        </table>

    </div>

    <div class="list-group">
        <div class="list-group-item font-supermarket" style="text-align: center; font-weight: bold;"><?php echo $statusText ?></div>
    </div>
</div>
