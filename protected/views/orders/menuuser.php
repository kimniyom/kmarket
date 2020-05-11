<style type="text/css">
    #menu-user .well{
        border: none;
        box-shadow: none;
        background: #FFFFFF;
        font-size: 14px;
        text-align: center;
        height: 100px;
        font-weight: bold;
        color: #cc3300;
    }

    #menu-user .well:hover{
        border: none;
        box-shadow: none;
        background: #FFFFFF;
        font-size: 14px;
        text-align: center;
        height: 100px;
        font-weight: bold;
        color: #000000;
    }
</style>
<br/><br/>
<div class="well account" id="account" style=" background-color: #FBAB7E; border-radius:0px;border: none;
     background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%); color: #FFFFFF;">
    <a  href="<?php echo Yii::app()->createUrl('site/setting') ?>" style=" position: absolute; right: 20px; top:70px; color: #FFFFFF;">
        <span class="lnr lnr-cog fa-2x"></span>
    </a>
    <table>
        <tr>
            <td><span class="lnr lnr-user fa-2x"></span></td>
            <td class=" font-supermarket" style=" font-size: 18px;">
                <?php echo $profile['name'] . " " . $profile['lname'] ?><br/>
                <?php echo $profile['tel'] ?>
            </td>
        </tr>
    </table>
</div>
<div class="container" style=" padding: 5px;" id="menu-user">

    <div class="row" style="margin: 0px;">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style=" padding: 5px;">
            <font class="font-supermarket" style=" font-size: 18px; font-weight: bold;">รายการสั่งซื้อของคุณ</font>
        </div>
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4" style=" padding: 5px;">
            <a href="<?php echo Yii::app()->createUrl('frontend/orders/cart') ?>">
                <div class="well font-supermarket">
                    <i class="fa fa-credit-card-alt fa-2x"></i><br/>
                    ที่ต้องชำระเงิน
                </div></a>
        </div>
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4" style=" padding: 5px;">
            <a href="<?php echo Yii::app()->createUrl('frontend/orders/verify') ?>">
                <div class="well  font-supermarket">
                    <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i><br/>
                    รอยืนยัน
                </div></a>
        </div>
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4" style=" padding: 5px;">
            <a href="<?php echo Yii::app()->createUrl('frontend/orders/shipping') ?>">
                <div class="well  font-supermarket">
                    <i class="fa fa-archive fa-2x" aria-hidden="true"></i><br/>
                    ที่ต้องจัดส่ง
                </div></a>
        </div>

        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style=" padding: 5px;">
            <a href="<?php echo Yii::app()->createUrl('frontend/orders/ordercomplete') ?>">
                <div class="well  font-supermarket">
                    <i class="fa fa-truck fa-2x" aria-hidden="true"></i><br/>
                    จัดส่งแล้ว
                </div>
            </a>
        </div>
        <!--
        <div class="col-sm-8 col-xs-8 col-md-8 col-lg-8" style=" padding: 5px; margin-top: 0px;">
            <a href="<?php //echo Yii::app()->createUrl('frontend/orders/orderall')                             ?>">
                <div class="well  font-supermarket">
                    <i class="fa fa-gift fa-2x" aria-hidden="true"></i><br/>
                    รายการสั่งซื้อทั้งหมด
                </div>
            </a>
        </div>
        -->
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#b-menu").css({'color': 'red'});
    });

</script>


