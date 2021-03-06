<br/><br/><br/>
<div class="container">
    <h4 class=" font-supermarket" style=" font-weight: bold; margin-bottom: 10px;">
        เตรียมจัดส่ง
    </h4>
    <?php if (empty($order)) { ?>
        <br/><center>ไม่มีรายการ</center><br/>
    <?php } else { ?>
        <?php
        $i = 0;
        $web = new Configweb_model();
        foreach ($order as $rs):
            ?>
            <ul class="list-group font-supermarket" style=" font-size: 18px; font-weight: bold;">
                <li class="list-group-item">
                    <?php echo $web->thaidate($rs['order_date']); ?>
                    <span class=" pull-right"><?php echo number_format($rs['PRICE_TOTAL'] + $rs['transportprice'], 2); ?> บาท</span>
                </li>
                <li class=" list-group-item">
                    สถานะ<span class="pull-right text-warning"><i class="fa fa-info-circle"></i> อยู่ระหว่างการจัดส่ง</span>
                </li>
                <a href="<?php echo Yii::app()->createUrl('frontend/orders/vieworder', array("id" => $rs['order_id'],"return" => "shipping")) ?>" class=" list-group-item">
                    ดูสินค้า <span class="pull-right"><i class="fa fa-chevron-right"></i></span>
                </a>
            </ul>
        <?php endforeach; ?>
    <?php } ?>
    <p class="font-supermarket" style="color:red;">
        * ทางร้านเรากำลังเร่งจัดส่งสินค้าให้ท่าน<br/>
        * ถ้าหากทางร้านจัดส่งสินค้าให้ท่านแล้วจะรีบแจ้งให้ท่านทราบโดยเร็ว
    </p>
</div>


