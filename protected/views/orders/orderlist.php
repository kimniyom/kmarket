<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php
//session_start();

$product_model = new Product();
$stock_model = new Stock();
?>
<style>
    #map {
        height: 500px;
        width: 600px;
    }
    .headcart{
        font-size: 20px; font-weight: bold; margin-bottom: 10px;
        background-color: #43cea2;
        background-image: linear-gradient(#43cea2, #185a9d);
        background-size: 100%;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-text-fill-color: transparent;
    }
</style>
<br/><br/><br/>
<div class="container" style=" padding-bottom: 20px;  font-family: th;">
    <h4 class=" font-supermarket headcart">ตะกร้าสินค้า</h4>
    <div class="jumbotron">
        <?php if ($meCount > 0) { ?>
            <form action="<?php echo Yii::app()->createUrl('frontend/orders/updatecart') ?>" method="post" name="fromupdate" id="fromupdate">
                <table class="table"  style=" background: #ffffff;">

                    <?php
                    $logStock = 0;
                    $total_price = 0;
                    $num = 0;
                    $a = 0;
                    $arrCat = array();
                    foreach ($orders as $meResult):
                        $a++;
                        $arrCat[] = $meResult['category'];
                        $stock = $stock_model->countStock($meResult['product_id']);
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
                                <font class="font-supermarket" style=" font-size: 18px; color: #cc3300; font-weight: bold;"><?php echo number_format($product_price); ?> บาท</font><br/>
                                <!--
                                <button style="float: left; border-radius: 0px; padding:0px 10px; height: 30px; border: 0px; font-weight: bold;"> <i class="fa fa-minus"></i> </button>
                                -->
                                <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control input-sm qty" id="qty<?php echo $a ?>"
                                       style="width: 60px;text-align: center; float: left;border-radius: 0px;"   pattern="\d*" onclick="setBtnSubmit()">
                                       <?php echo($stock < $_SESSION['qty'][$key]) ? "<div class='row'><div class='col-xs-12 col-sm-12'><font style='color:red;' class='font-supermarket'> <i class='fa fa-info-circle'></i> คงเหลือไม่พอกับจำนวนที่สั่ง</font><em>(สต๊อก " . $stock . " ชิ้น</em>)</div></div>" : ""; ?>
                                       <?php
                                       if ($stock < $_SESSION['qty'][$key]) {
                                           $logStock++;
                                       }
                                       ?>

                                <!--
                                <button style="float: left; border-radius: 0px; padding:0px 10px; height: 30px; border: 0px; font-weight: bold;"><i class="fa fa-plus"></i></button>
                                -->
                                <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">

                                <?php //echo number_format(($product_price * $_SESSION['qty'][$key]), 2);  ?>
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
                            <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">รวม <font style=" color: #cc3300;"><?php echo number_format($total_price); ?></font> บาท</div>
                        </td>
                    </tr>
                    <tr style=" display: none;">
                        <td colspan="2" style="text-align: right;">
                            <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">ค่าขนส่ง <font style=" color: #cc3300;" id="transportprice"></font> บาท</div>
                            <input type="hidden" id="transportover" name="transportover"/><br/>
                            <input type="hidden" id="totalorder" name="totalorder" value="<?php echo number_format($total_price) ?>"/> <br/>
                            <input type="hidden" id="totalall" name="totalall"/>
                        </td>
                    </tr>
                    <tr style=" display: none;">
                        <td colspan="2" style=" text-align: right;">
                            <div style=" font-weight: bold; font-size: 20px;" class="font-supermarket">รวมสุทธิ <font style=" color: #cc3300;" id="totalalltext"></font> บาท</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;" class=" font-supermarket">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <button type="submit" class="btn btn-default btn-block">คำนวณ</button>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <button type="button" id="location-true" class="btn btn-warning btn-block" style=" display: none;" onclick="checkOut()">สั่งซื้อสินค้า</button>
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
    <p style=" text-align:  center; color: #cc3300;  margin-bottom: 10px;" class=" font-supermarket">*เมื่อมีการแก้ไขจำนวนให้กดปุ่มคำนวณใหม่ทุกครั้งเพื่ออัพเดทราคา</p>
    <?php if ($meCount > 0) { ?>
        <div class="container">
            <div class="relate-product">
                <div class="heading-wrapper text-center">
                    <h4 class="heading font-supermarket" style=" font-size: 20px; font-weight: bold; margin-bottom: 15px;">สินค้าอื่น ๆ</h4>
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
    <!--
    <div id="map" style=" width: 100%;"></div>
    -->
</div>
<script>
    initMap();
    function initMap() {
        //var mapOptions = {
        //center: {lat: 14.004015, lng: 100.548994},
        //zoom: 10
        //};
        //var maps = new google.maps.Map(document.getElementById("map"), mapOptions);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                /*
                 var pos = {
                 lat: position.coords.latitude,
                 lng: position.coords.longitude
                 };
                 */
                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found. lat: ' + position.coords.latitude + ', lng: ' + position.coords.longitude + ' ');
                //infoWindow.open(maps);
                //maps.setCenter(pos);
                /*
                 var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
                 var marker = new google.maps.Marker({
                 position: myLatLng,
                 map: maps,
                 icon: '//www.ninenik.com/demo/google_map/images/male-2.png'
                 });
                 */
                //var infowindow = new google.maps.InfoWindow({
                //content: "คุณอยู่ที่นี่ " + "  " //lat" + position.coords.latitude + "lng" + position.coords.longitude
                //});
                //infowindow.open(maps, marker);
                getLocation(position.coords.latitude, position.coords.longitude);
            }, function() {
                //var infowindow = new google.maps.InfoWindow({
                //content: "คุณอยู่ที่นี่ " + "  ";
                //});
                //handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            //var infowindow = new google.maps.InfoWindow({
            //content: "คุณอยู่ที่นี่ " + "  "
            //});
            // handleLocationError(false, infoWindow, map.getCenter());
        }

    }

    /*
     fun    ction handleLocationError(browserHasGeolocation, in    foWindow, pos) {
     infoWindow.setPosition    (pos);
     infoWindow.s    etContent(browserHasGeolocation ?
     'Error: The Geolocation service failed.' :
     'Error: Your browser doesn\'t support geolocation.');
     infoWindow.open(map);
     }
     */
    function getLocation(lat, lng) {
        //if (navigator.geolocation) {
        //navigator.geolocation.getCurrentP    osition(function(position) {
        //alert("ที่    อยู่คุณ" + "lat" + position.coords.latitude + "lng" + position.coords.longitude);
        var url = "<?php echo Yii::app()->createUrl('frontend/orders/getlocation') ?>";
        var data = {lat: lat, lng: lng};
        $.post(url, data, function(res) {
            var road = parseInt(res);
            var limit = parseInt("<?php echo $limit ?>");
            var transsportprice = parseInt("<?php echo $overtranport ?>");
            if (road > limit) {
                $("#transportprice").text(transsportprice);
                $("#transportover").val(transsportprice);
                //$("#location-true").hide();
                //$("#location-false").show();
            } else {
                //$("#location-true").show();
                //$("#location-false").hide();
                $("#transportprice").text(0);
                $("#transportover").val(0);
            }
            calculator();
        });
        //});
        //} else {
        //alert("กรุณาเปิด GPS บนอุปกรณ์ของท่าน...");
        //return false;
        //}
    }

    function calculator() {
        var totalorder = parseInt($("#totalorder").val());
        var transportover = parseInt($("#transportover").val());
        var totalall = (totalorder + transportover);
        var logstock = "<?php echo $logStock ?>";
        $("#totalall").val(totalall);
        $("#totalalltext").text(totalall);
        if (logstock <= 0) {
            $("#location-true").show();
        } else {
            Swal.fire(
                    'แจ้งเตือน!',
                    'มีสินค้าบางรายการจำนวนไม่พอต่อคำสั่งซื้อของท่าน!',
                    'warning'
                    );
            $("#location-true").hide();
        }
    }

    function checkOut() {
        var transportover = parseInt($("#transportover").val());
        window.location = "<?php echo Yii::app()->createUrl('frontend/orders/order') ?>" + "/transportprice/" + transportover;
    }

    function setBtnSubmit() {
        $("#location-true").hide();
    }

</script>
<!--
<script async defer src="http    s://maps.googleapis.com/maps/api/js?key=AIzaSyA4wnLCAq8CiTMU9C3RlhwcXg_yXMzH--Y&callback&sensor=false&callback=initMap" async defer></script>
-->
<script type="text/javascript">
    $(document).ready(function() {
        $("#b-cart").css({'color': 'red'});
    });

</script>


