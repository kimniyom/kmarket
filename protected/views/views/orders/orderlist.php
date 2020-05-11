<?php
//session_start();

$product_model = new Product();
?>
<br/><br/><br/>
<div class="container" style=" padding-bottom: 20px;  font-family: th;">
    <div class="jumbotron">
        <?php if ($meCount > 0) { ?>
            <form action="<?php echo Yii::app()->createUrl('frontend/orders/updatecart') ?>" method="post" name="fromupdate">
                <table class="table"  style=" background: #ffffff;">

                    <?php
                    $total_price = 0;
                    $num = 0;
                    $a = 0;
                    foreach ($orders as $meResult):
                        $a++;
                        $key = array_search($meResult['product_id'], $_SESSION['cart']);
                        if ($meResult['product_price_pro'] > 0) {
                            $product_price = $meResult['product_price_pro'];
                        } else {
                            $product_price = $meResult['product_price'];
                        }
                        $total_price = $total_price + ($product_price * $_SESSION['qty'][$key]);



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
                                <font class="font-supermarket" style=" font-size: 18px; color: #cc3300; font-weight: bold;"><?php echo number_format($product_price, 2); ?> บาท</font><br/>
                                <input type="text" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control input-sm"
                                       style="width: 60px;text-align: center;"
                                       onKeyUp="if (this.value * 1 != this.value)
                                                           this.value = '';">
                                <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">

                                <?php //echo number_format(($product_price * $_SESSION['qty'][$key]), 2); ?>
                                <div class=" pull-right">
                                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/removecart', array("itemId" => $meResult['product_id'])) ?>" role="button">
                                        <span class="glyphicon glyphicon-trash"></span> ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $num++;
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                            <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">รวม <font style=" color: #cc3300;"><?php echo number_format($total_price, 2); ?></font> บาท</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;" class=" font-supermarket">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <button type="submit" class="btn btn-default btn-block">คำนวณ</button>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/order') ?>" type="button" class="btn btn-warning btn-block">สั่งซื้อสินค้า</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </table>
            </form>
        <?php } else { ?>
            <center>
                <img src="<?php echo Yii::app()->baseUrl ?>/images/Ecommerce-Shopping-Cart-Empty-icon.png"/>
            </center>
            <br/>
            <div class="font-THK" style=" font-size: 24px; text-align: center;">ไม่มีสินค้าในตระกร้า</div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#b-cart").addClass("text-danger");
    });
</script>

