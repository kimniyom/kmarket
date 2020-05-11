<script>
    // Ignore this in your implementation
    window.isMbscDemo = true;
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/lib/numpad/css/mobiscroll.jquery.min.css" type="text/css" media="all" />
<script src="<?php echo Yii::app()->baseUrl; ?>/lib/numpad/js/mobiscroll.jquery.min.js" type="text/javascript"></script>
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

</style>
<br/><br/><br/>
<div class="container" style=" padding-bottom: 20px;  font-family: th;">
    <div class="jumbotron">
        <?php if ($meCount > 0) { ?>
            <form action="<?php echo Yii::app()->createUrl('frontend/orders/updatecart') ?>" method="post" name="fromupdate" id="fromupdate">
                <table class="table"  style=" background: #ffffff;">

                    <?php
                    $logStock = 0;
                    $total_price = 0;
                    $num = 0;
                    $a = 0;
                    foreach ($orders as $meResult):
                        $a++;
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
                                <input type="text" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control input-sm qty" id="qty<?php echo $a ?>" readonly="readonly"
                                       style="width: 60px;text-align: center; float: left;border-radius: 0px;">
                                       <?php echo($stock < $_SESSION['qty'][$key]) ? "<font style='color:red;'> <i class='fa fa-info-circle'></i> สินค้ามีไม่พอกับจำนวนที่ท่านสั่ง</font><em>(สต๊อก " . $stock . " ชิ้น</em>)" : ""; ?>
                                       <?php
                                       if ($stock < $_SESSION['qty'][$key]) {
                                           $logStock++;
                                       }
                                       ?>
                                <script>

        mobiscroll.settings = {
        theme: 'ios',
        themeVariant: 'light',
        lang: 'th'
        };

        $(function() {

        // Mobiscroll Numpad initialization
        $('#qty' + <?php echo $a ?>).mobiscroll().numpad({
            theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light', // More info about themeVariant: https://docs.mobiscroll.com/4-10-3/numpad#opt-themeVariant
            lang: 'th', // Specify language like: lang: 'pl' or omit setting to use default
            preset: 'decimal', // More info about preset: https://docs.mobiscroll.com/4-10-3/numpad#opt-preset
            scale: 0,
            max: 1000,
            min: 1,
            onSet: function(event, inst) {
                //alert(event.valueText);
                var number = parseInt(event.valueText);
                var stock = parseInt("<?php echo $stock ?>");
                if (number > stock) {
                    Swal.fire(
                            'แจ้งเตือน!',
                            'สินค้าจำนวนไม่พอต่อคำสั่งซื้อของท่าน! คงเหลือ ' + stock + 'ชิ้น',
                            'warning'
                            );
                    $('#qty' + <?php echo $a ?>).val(1);
                    document.getElementById("fromupdate").submit();
                } else {
                    document.getElementById("fromupdate").submit();
                }
            }
        });
        });
                                </script>

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
    <p style=" text-align:  center; color: #cc3300;" class=" font-supermarket">*เมื่อมีการแก้ไขจำนวนให้กดปุ่มคำนวณใหม่ทุกครั้งเพื่ออัพเดทราคา</p>
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
     function handleLocationError(browserHasGeolocation, infoWindow, pos) {
     infoWindow.setPosition(pos);
     infoWindow.setContent(browserHasGeolocation ?
     'Error: The Geolocation service failed.' :
     'Error: Your browser doesn\'t support geolocation.');
     infoWindow.open(map);
     }
     */
    function getLocation(lat, lng) {
        //if (navigator.geolocation) {
        //navigator.geolocation.getCurrentPosition(function(position) {
        //alert("ที่อยู่คุณ" + "lat" + position.coords.latitude + "lng" + position.coords.longitude);
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

</script>
<!--
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4wnLCAq8CiTMU9C3RlhwcXg_yXMzH--Y&callback&sensor=false&callback=initMap" async defer></script>
-->
<script type="text/javascript">
    $(document).ready(function() {
        $("#b-cart").css({'color': 'red'});
    });


</script>


