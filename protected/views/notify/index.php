<br/><br/><br/>

<div class="container">
    <h4 class="font-supermarket" style="font-weight: bold; font-size: 20px;">แจ้งเตือน</h4>
    <div class="list-group">
        <?php foreach ($listnotify as $rs): ?>
            <?php if ($rs['status'] == "4") { ?>
                <a href="<?php echo Yii::app()->createUrl('frontend/notify/read', array('id' => $rs['id'], 'status' => '4')) ?>" class="list-group-item"><?php echo $rs['date'] ?> รายการสั่งซื้อของท่านได้รับการยืนยันแล้ว #order <?php echo $rs['order_id'] ?></a>
            <?php } ?>
            <?php if ($rs['status'] == "5") { ?>
                <a href="<?php echo Yii::app()->createUrl('frontend/notify/read', array('id' => $rs['id'], 'status' => '5')) ?>" class="list-group-item"><?php echo $rs['date'] ?> รายการสั่งซื้อของท่านถูกจัดส่งแล้ว #order <?php echo $rs['order_id'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
</div>