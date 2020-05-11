<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: #cc3300 solid 2px;
        color: #cc3300;
        background-color: white;
        padding: 8px 20px;
        border-radius: 5px;
        font-size: 20px;
        font-weight: bold;
    }

</style>
<?php
$product_model = new Product();
?>
<br/><br/><br/>
<div class="container" style=" padding-bottom: 20px; padding-top: 20px; font-family: th;">
    <form action="<?php echo Yii::app()->createUrl('frontend/orders/updateorder') ?>" method="post" name="formupdate" role="form" id="formupdate" enctype="multipart/form-data" onsubmit="JavaScript:return updateSubmit();">
        <div class="jumbotron">
            <h3 class="font-supermarket">ข้อมูลผู้สั่งซื้อ<span class=" text-danger">*</span></h3>
            <hr style="margin: 10px 0px;"/>
            <div style=" display: none;">
                <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อ-นามสกุล <span class=" text-danger">*</span></label>
                    <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" name="order_fullname" value="<?php echo $profile['name'] . " " . $profile['lname'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress">ที่อยู่ <span class=" text-danger">*</span></label>
                    <textarea class="form-control" rows="6"  name="order_address" id="order_address"><?php echo $address['address'] . " ต." . $address['tambon_name'] . " อ." . $address['ampur_name'] . " จ." . $address['changwat_name'] . " " . $address['zipcode'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">เบอร์โทรศัพท์ <span class=" text-danger">*</span></label>
                    <input type="text" class="form-control" id="order_phone" placeholder="ใส่เบอร์โทรศัพท์ที่สามารถติดต่อได้" name="order_phone" maxlength="10"  onKeyUp="if (this.value * 1 != this.value)
                                this.value = '';" value="<?php echo $profile['tel'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">อีเมล์ <span class=" text-danger">*</span></label>
                    <input type="email" class="form-control" id="order_email" placeholder="ใส่ Email ที่สามารถติดต่อได้"  name="order_email" value="<?php echo $profile['email'] ?>">
                </div>
            </div>
            <div style="font-size: 16px;" class=" font-supermarket">
                ชื่อ-นามสกุล: <?php echo $profile['name'] . " " . $profile['lname'] ?><br/>
                เบอร์โทรศัพท์: <?php echo $profile['tel'] ?><br/>
                อีเมล์: <?php echo($profile['email']) ? $profile['email'] : "ไม่ได้กำหนด"; ?><br/>
                <b>ที่อยู่จัดส่ง</b><br/>
                <?php if ($checkaddress > 0) { ?>
                    <?php echo $address['address'] . " ต." . $address['tambon_name'] . " อ." . $address['ampur_name'] . " จ." . $address['changwat_name'] . " " . $address['zipcode'] ?><br/>
                    <a href="<?php echo Yii::app()->createUrl('frontend/user/address', array('id' => $profile['id'])) ?>" class="pull-right"><i class="fa fa-pencil"></i> แก้ไขที่อยู่ใหม่</a>
                <?php } else { ?>
                    <font style="color: #cc0000;"><i class="fa fa-info-circle"></i> ยังไม่ได้กำหนดที่อยู่จัดส่ง</font><br/>
                    <a href="<?php echo Yii::app()->createUrl('frontend/user/address', array('id' => $profile['id'])) ?>" class="pull-right"><i class="fa fa-plus"></i> เพิ่มที่อยู่</a>
                <?php } ?>
            </div>
        </div>
        <div class="jumbotron">
            <h3 class="font-supermarket">ข้อมูลการสั่งซื้อ</h3>
            <?php if ($orders) { ?>
                <table class="table">
                    <tbody>
                        <?php
                        $total_price = 0;
                        $num = 0;
                        $arrCat = array();
                        foreach ($orders as $meResult) {
                            $key = array_search($meResult['product_id'], $_SESSION['cart']);
                            $arrCat[] = $meResult['category'];
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
                                    <font class="font-supermarket" style=" font-size: 18px; color: #cc3300; font-weight: bold;"><?php echo number_format($product_price); ?> บาท</font><br/>
                                    <font class="font-supermarket" style=" font-weight: bold;">x <?php echo $_SESSION['qty'][$key]; ?></font>
                                    <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                    <input type="hidden" name="product_id[]" value="<?php echo $meResult['product_id']; ?>" />
                                    <input  type="hidden" name="product_price[]" value="<?php echo $product_price; ?>" />
                                </td>
                            </tr>
                            <?php
                            $num++;
                        }
                        ?>
                        <tr>
                            <td colspan="2" style="font-size: 18px;">
                                <div  class="font-supermarket pull-left">รวม</div> <div class="font-supermarket pull-right"><font style="color: #cc3300;"><?php echo number_format($total_price); ?></font> บาท</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 18px;">
                                <div class="font-supermarket pull-left">ค่าจัดส่ง</div> <div class="font-supermarket pull-right"><font style="color: #cc3300;"><?php echo number_format($transportprice); ?></font> บาท</div>
                                <input type="hidden" name="transportprice" id=transportprice" value="<?php echo $transportprice ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style=" font-weight: bold; font-size: 20px;">
                                <div class="font-supermarket pull-left">สุทธิ</div> <div class="font-supermarket pull-right"><font style="color: #cc3300;"><?php echo number_format($total_price + $transportprice); ?></font> บาท</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <a href="<?php echo Yii::app()->createUrl('site/index') ?>" class="font-supermarket text-success" style=" font-size: 18px;"><i class="fa fa-angle-left"></i> เลือกซื้อสินค้าเพิ่ม</a>
                            </td>
                        </tr>
                        <tr class=" font-supermarket">
                            <td colspan="2">
                                <label style=" font-size: 20px;" class=" text-warning">วิธีชำระเงิน</label><br/>
                                <input type="radio" name="typepayment" id="typepayment" value="1" onclick="settype(1)"/> โอนเงินผ่านธนาคาร<br/>
                                <input type="radio" name="typepayment" id="typepayment" value="2" onclick="settype(2)"/> ชำระเงินปลายทาง
                            </td>
                        </tr>
                        <tr id="addslip" style=" display: none;">
                            <td colspan="2">
                                <label class=" font-supermarket">แนบสลิป</label>
                                <input type="file" name="slip" id="slip">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <?php if ($checkaddress > 0) { ?>
                                            <button type="submit" class="btn btn-primary btn-block font-supermarket">ยืนยันการสั่งซื้อ</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-default btn-block disabled"><i class="fa fa-info-circle"></i> ยังไม่กำหนดที่อยู่</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php } else { ?>
                <center><br/>ไม่มีรายการสั่งซื้อ</center>
            <?php } ?>
        </div>
    </form>
    <div class="jumbotron" id="accounttranfer" style=" display: none;">
        <h4 class="font-supermarket">โอนเงินผ่านบัญชีธนาคาร</h4><br/>
        <div class="row">
            <?php
            $i = 1;
            foreach ($payment as $rs): $i++;
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="row font-supermarket">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo Yii::app()->baseUrl . '/images/' . $rs['bank_img']; ?>" class="img-resize img-responsive"/>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <b style="font-size: 18px;"><?php echo $rs['bank_name']; ?></b><br/>
                            ชื่อบัญชี <?php echo $rs['bookbank_name']; ?><br/>
                            <b>เลขที่บัญชี <?php echo $rs['bookbank_number']; ?></b>
                        </div>
                    </div>
                    <hr/>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="jumbotron" id="paymenttransport" style=" display: none;">
        <h4 class="font-supermarket" style=" text-align: center;">ชำระเงินปลายทาง</h4><br/>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style=" text-align: center;">
                <div class="text-info">กรุณาเตรียมเงินสดให้พอดีกับราคาสั่งซื้อ</div>
            </div>
        </div>
    </div>
    <?php if ($orders) { ?>
        <div class="container">
            <div class="relate-product">
                <div class="heading-wrapper text-center">
                    <h4 class="heading font-supermarket" style=" font-size: 20px; font-weight: bold; margin-bottom: 15px;">สินค้าใกล้เคียง</h4>
                </div>

                <div class="row js-product-masonry-filter-layout-2 product-masonry-filter-layout-2">

                    <?php
                    $arrCat = array_unique($arrCat);
                    $near = $product_model->getNear($arrCat);
                    foreach ($near as $nears):
                        $img_title = $product_model->firstpictures($nears['product_id']);
                        if (!empty($img_title)) {
                            $img = "uploads/product/thumbnail/480-" . $img_title;
                        } else {
                            $img = "images/No_image_available.jpg";
                        }
                        ?>
                        <figure class="item Newproduct" style="padding: 5px;">
                            <div class="products product-style-3" style="background: #ffffff;border-radius: 5px;box-shadow: #eeeeee 0px 0px 5px 0px;">
                                <div class="img-wrappers" style="border:none;">
                                    <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $nears['product_id'])) ?>">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" style=" border-radius: 5px 5px 0px 0px;"/>
                                    </a>
                                </div>
                                <figcaption class="desc">
                                    <h4 class="font-supermarket" style=" height: 60px; overflow: hidden;">
                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $nears['product_id'])) ?>" class="product-name" style="color:#5c5c5c; font-weight: bold;"><?php echo $nears['product_name'] ?></a>
                                    </h4>
                                    <span class="price font-supermarket" id="text-price">
                                        <?php if ($nears['product_price_pro'] > 0) { ?>
                                            <font style="color: #ff0000; font-weight: bold;"><?php echo number_format($nears['product_price_pro']) ?>  .-</font>
                                            <del><?php echo number_format($nears['product_price']) ?></del>
                                        <?php } else { ?>
                                            <font style="color: #ff0000; font-weight: bold;"><?php echo number_format($nears['product_price']) ?>  .-</font>
                                        <?php } ?>

                                    </span>
                                </figcaption>
                            </div>
                        </figure>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">

    function updateSubmit() {
        var typepayment = $('input:radio:checked').val();
        if (!typepayment) {
            //alert('กรุณาเลือกวิธีชำระเงิน!');
            Swal.fire(
                    'แจ้งเตือน!',
                    'กรุณาเลือกวิธีชำระเงิน!',
                    'warning'
                    )
            return false;
        } else {
            if (typepayment == 1) {
                if (document.formupdate.slip.value == "") {
                    //alert('กรุณาแนบหลักฐานการโอนเงิน!');
                    Swal.fire(
                            'แจ้งเตือน!',
                            'กรุณาแนบหลักฐานการโอนเงิน!',
                            'warning'
                            )
                    return false;
                }
            }
        }
        if (document.formupdate.order_fullname.value == "") {
            //alert('โปรดใส่ชื่อนามสกุลด้วย!');
            Swal.fire(
                    'แจ้งเตือน!',
                    'โปรดใส่ชื่อนามสกุลด้วย!',
                    'warning'
                    )
            document.formupdate.order_fullname.focus();
            return false;
        }
        if (document.formupdate.order_address.value == "") {
            //alert('โปรดใส่ที่อยู่ด้วย!');
            Swal.fire(
                    'แจ้งเตือน!',
                    'โปรดใส่ที่อยู่ด้วย!',
                    'warning'
                    )
            document.formupdate.order_address.focus();
            return false;
        }
        if (document.formupdate.order_phone.value == "") {
            //alert('โปรดใส่เบอร์โทรด้วย!');
            Swal.fire(
                    'แจ้งเตือน!',
                    'โปรดใส่เบอร์โทรด้วย!',
                    'warning'
                    )
            document.formupdate.order_phone.focus();
            return false;
        }

        /*
         if (document.formupdate.order_email.value == "") {
         alert('โปรดใส่ Email ด้วย!');
         document.formupdate.order_email.focus();
         return false;
         }
         */
        document.formupdate.submit();
        return false;
    }

    function settype(val) {
        if (val == 1) {
            $("#addslip").show();
            $("#accounttranfer").show();
            $("#paymenttransport").hide();
        } else if (val == 2) {
            $("#addslip").hide();
            $("#accounttranfer").hide();
            $("#paymenttransport").show();
        }
    }

</script>