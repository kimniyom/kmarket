<br/><br/><br/>
<div class="container font-supermarket" style=" font-size: 16px;">
    <ul class="list-group">
        <a class="list-group-item">ชื่อ-สกุล <span class="pull-right" style=" background: none;"><?php echo $profile['name'] . ' ' . $profile['lname'] ?> <i class="fa fa-chevron-right"></i></span></a>
        <a class="list-group-item">เพศ <span class="pull-right" style=" background: none;"><?php echo ($profile['sex'] == "M") ? "ชาย" : "หญิง" ?> <i class="fa fa-chevron-right"></i></span></a>
        <a class="list-group-item">อีเมล์ <span class="pull-right" style=" background: none;"><?php echo $profile['email'] ?> <i class="fa fa-chevron-right"></i></span></a>
        <a class="list-group-item">เบอร์โทรศัพท์ <span class="pull-right" style=" background: none;"><?php echo $profile['tel'] ?> <i class="fa fa-chevron-right"></i></span></a>
    </ul>
    <ul class="list-group">
        <li class="list-group-item"><i class="fa fa-home"></i> ที่อยู่ <?php echo($address <= 0) ? "<font style='color:red;'>(ยังไม่กำหนด)</font>" : ""; ?></li>
        <a href="<?= Yii::app()->createUrl('frontend/user/address', array('id' => $profile['id'])) ?>" class="list-group-item">
            ที่อยู่จัดส่ง <span class="pull-right" style=" background: none;"><i class="fa fa-chevron-right"></i></span>
        </a>
    </ul>
    <ul class="list-group">
        <li class="list-group-item">Username  <span class="pull-right" style=" background: none;"><?php echo $profile['username'] ?></span></li>
        <a href="<?php echo Yii::app()->createUrl('frontend/user/resetpassword') ?>" class="list-group-item">Password  <span class="pull-right" style=" background: none; color: #cc3300;">เปลี่ยน password <i class="fa fa-chevron-right"></i></span></a>
    </ul>

    <ul class="list-group">
        <a href="<?= Yii::app()->createUrl('site/logout/') ?>" class="list-group-item" style=" text-align:  center; color:  #cc3300; font-weight: bold;"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#b-account").addClass("text-danger");
    });
</script>
