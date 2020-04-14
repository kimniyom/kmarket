<br/><br/><br/>
<div class="container">
    <h4 class=" font-supermarket" style=" font-weight: bold; margin-bottom: 10px;">
        รอตรวจสอบ
    </h4>
    <?php if (empty($order)) { ?>
        <br/><center>ไม่มีรายการ</center><br/>
    <?php } else { ?>
        <?php
        $i = 0;
        $web = new Configweb_model();
        foreach ($order as $rs):
            ?>
            <ul class="list-group font-supermarket">
                <li class="list-group-item">
                    <?php echo $web->thaidate($rs['order_date']); ?>
                    <span class=" pull-right"><?php echo number_format($rs['PRICE_TOTAL'], 2); ?> บาท</span>
                </li>
                <li class=" list-group-item">
                    สถานะ <span class="pull-right text-danger"><i class="fa fa-info-circle"></i> รอตรวจสอบ</span>
                </li>
                <a href="<?php echo Yii::app()->createUrl('frontend/orders/vieworder', array("id" => $rs['order_id'])) ?>" class=" list-group-item">
                    ดูสินค้า <span class="pull-right"><i class="fa fa-chevron-right"></i></span>
                </a>
            </ul>
        <?php endforeach; ?>
    <?php } ?>
</div>
