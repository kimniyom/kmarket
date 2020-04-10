<?php
//session_start();
$this->breadcrumbs = array(
    "รายการสินค้า",
);
?>
<div class="container" style=" margin-top: 30px;">

    <div class="panel panel-info" style=" border: #cccccc solid 1px;">
        <div class="panel-heading" style=" padding: 10px; background: #ffffff; border-bottom: #cccccc solid 1px;">
            <h4><i class="fa fa-cart-plus"></i> รถเข็น</h4>
        </div>
        <div class="panel-body table-responsive" id="order_list_load">
            <?php if ($meCount > 0) { ?>
                <form action="<?php echo Yii::app()->createUrl('frontend/orders/updatecart') ?>" method="post" name="fromupdate">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tbody>
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
                                ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php echo $meResult['product_name']; ?><br/>
                                        <?php echo number_format($product_price, 2); ?> บาท
                                        <input type="text" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control input-sm" style="width: 60px;text-align: center;">
                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">

                                        <?php //echo number_format(($product_price * $_SESSION['qty'][$key]), 2); ?>
                                        <div class=" pull-right">
                                            <a class="btn btn-danger btn-sm" href="<?php echo Yii::app()->createUrl('frontend/orders/removecart', array("itemId" => $meResult['product_id'])) ?>" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                ลบ</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $num++;
                            endforeach;
                            ?>
                            <tr>
                                <td colspan="2" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?> บาท</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">
                                    <button type="submit" class="btn btn-info">คำนวณราคาสินค้าใหม่</button>
                                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/order') ?>" type="button" class="btn btn-primary">สั่งซื้อสินค้า</a>
                                </td>
                            </tr>
                        </tbody>
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
</div>

