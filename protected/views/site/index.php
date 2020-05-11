<!--
<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->baseUrl;           ?>/css/headphoneguru.css" />
-->
<style type="text/css">
    #container-sell-slide {
        white-space: nowrap;
        width: auto;
        overflow-y: hidden;
        margin-bottom: 10px;
    }
    #container-sell-slide > .box-p {
        display: inline-block;
        width: 30%;
        /* for IE6/7, remove if you don't need to support those browsers */
        *display: inline;
        zoom: 1;
        text-align: center;
        font-weight: bold;
        background: #ffffff;
    }

    .headpromotion{
        font-size: 20px; font-weight: bold; margin-bottom: 10px;
        background-color: #fe8c00;
        background-image: linear-gradient(#fe8c00, #f83600);
        background-size: 100%;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-text-fill-color: transparent;
    }
</style>
<?php
$web = new Configweb_model();
$productModel = new Product();
$lastProduct = $productModel->_get_last_product();
//$bestProduct = $productModel->_get_best_product();
$saleProduct = $productModel->_get_sale_products();
?>
<br/><br/><br/>


<div class="container">


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="tel:089-5266265" target="_blank" class="btn btn-success btn-block"><i class="fa fa-phone"></i> โทรสั่งสินค้า</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="boxsearchproduct" name="boxsearchproduct" placeholder="ชื่อสินค้าที่ต้องการค้นหา..." style="box-shadow: none;">
                    <div class="input-group-addon" onclick="searchProduct()"><i class="fa fa-search"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($saleProduct) { ?>
    <div class="container">
        <h4 class=" font-supermarket headpromotion" style=" margin-bottom: 15px; ">
            <b>สินค้าโปรโมชั่น</b>
        </h4>
    </div>

    <div id="container-sell-slide">

        <?php
        foreach ($saleProduct as $saleProducts):
            $img_title = $productModel->firstpictures($saleProducts['product_id']);
            if (!empty($img_title)) {
                $img = "uploads/product/thumbnail/480-" . $img_title;
            } else {
                $img = "images/No_image_available.jpg";
            }
            ?>
            <div class="box-p">
                <div class="img-wrappers" style="border:none;">
                    <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $saleProducts['product_id'])) ?>">
                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" style=" border-radius: 5px 5px 0px 0px;"/>
                    </a>
                </div>

                <div class="font-supermarket" style=" height: 86px; overflow: hidden;word-wrap: break-word;white-space: initial; padding:5px; font-size: 15px; color: #666666;">
                    <?php echo $saleProducts['product_name'] ?>
                </div>
                <span class="price font-supermarket" id="text-price" style=" color: #ff3300; font-size: 20px;">
                    <center>
                        <?php if ($saleProducts['product_price_pro'] > 0) { ?>
                            <?php echo number_format($saleProducts['product_price_pro']) ?>  .-
                            <del style=" color: #5c5c5c; font-size: 14px;"><?php echo number_format($saleProducts['product_price']) ?></del>
                        <?php } else { ?>
                            <?php echo number_format($saleProducts['product_price']) ?>  .-
                        <?php } ?>
                    </center>
                </span>

            </div>
        <?php endforeach; ?>
    </div><br/>

<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <h4 class=" font-supermarket headpromotion" style=" margin-bottom: 15px;">
                <b>สินค้า</b>
            </h4>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <div class="pull-right font-supermarket">
                <a href="<?php echo Yii::app()->createUrl('frontend/product') ?>">ดูสินค้าทั้งหมด</a>
            </div>
        </div>
    </div>

    <div class="row js-product-masonry-filter-layout-2 product-masonry-filter-layout-2">

        <?php
        foreach ($lastProduct as $rsProduct):
            $img_title = $productModel->firstpictures($rsProduct['product_id']);
            if (!empty($img_title)) {
                $img = "uploads/product/thumbnail/480-" . $img_title;
            } else {
                $img = "images/No_image_available.jpg";
            }
            ?>
            <figure class="item Newproduct" style=" padding: 3px;">
                <div class="products product-style-3" style="background: #ffffff;border-radius: 5px">
                    <div class="img-wrappers" style="border:none;">
                        <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>">
                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" style=" border-radius: 5px 5px 0px 0px;"/>
                        </a>
                        <!--
                        <div class="product-control-wrapper bottom-right">
                            <div class="wrapper-control-item">
                                <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                                    <span class="lnr lnr-eye"></span>
                                </a>
                            </div>
                            <div class="wrapper-control-item item-wish-list">
                                <a class="js-wish-list js-notify-add-wish-list" href="#">
                                    <span class="lnr lnr-heart"></span>
                                </a>
                            </div>
                            <div class="wrapper-control-item item-add-cart js-action-add-cart">
                                <a class="animate-icon-cart" href="https://www.messenger.com/t/kstudiothai" target="_blank">
                                    <span class="lnr lnr-cart"></span>
                                </a>
                                <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                </svg>
                            </div>
                        </div>
                        -->
                    </div>
                    <figcaption class="desc">
                        <div class="font-supermarket" style=" height: 50px; overflow: hidden; font-size: 16px; font-weight: bold;">
                            <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>" class="product-name" style="color:#5c5c5c;"><?php echo $rsProduct['product_name'] ?></a>
                        </div>
                        <span class="price font-supermarket" id="text-price" style=" color: #ff3300; font-size: 24px;">
                            <?php if ($rsProduct['product_price_pro'] > 0) { ?>
                                <?php echo number_format($rsProduct['product_price_pro']) ?>  .-
                                <del style=" color: #5c5c5c; font-size: 14px;"><?php echo number_format($rsProduct['product_price']) ?></del>
                            <?php } else { ?>
                                <?php echo number_format($rsProduct['product_price']) ?>  .-
                            <?php } ?>
                        </span>
                    </figcaption>
                </div>
            </figure>
        <?php endforeach; ?>



    </div>
</div>

<br/>

<script type="text/javascript">
    $(document).ready(function() {
        $("#b-home").css({'color': 'red'});
        var size = window.innerWidth;
        if (size >= 1024) {
            $("#container-sell-slide > .box-p").css({"width": "20%"});
            $(".box-category-item").css({"margin-top": "30px"});
            $('.slider5').bxSlider({
                slideWidth: 300,
                minSlides: 5,
                maxSlides: 5,
                moveSlides: 5,
                slideMargin: 10,
                captions: true,
                auto: true,
                touchEnabled: true,
                pager: false
            });
            $(".text-band").css({'font-size': '30px'});
        } else if (size >= 768) {
            $("#container-sell-slide > .box-p").css({"width": "20%"});
            $(".box-category-item").css({"margin-top": "30px"});
            $('.slider5').bxSlider({
                slideWidth: 300,
                minSlides: 4,
                maxSlides: 4,
                moveSlides: 4,
                slideMargin: 10,
                captions: true,
                auto: true,
                touchEnabled: true,
                pager: false
            });

            $(".text-band").css({'font-size': '24px'});
        } else if (size >= 600) {
            $(".box-category-item").css({"margin-top": "0px"});
            $('.slider5').bxSlider({
                slideWidth: 300,
                minSlides: 3,
                maxSlides: 3,
                moveSlides: 3,
                slideMargin: 10,
                captions: true,
                auto: true,
                touchEnabled: true,
                pager: false
            });
            $(".text-band").css({'font-size': '22px'});
        } else if (size > 480) {
            $(".box-category-item").css({"margin-top": "0px"});
            $('.slider5').bxSlider({
                slideWidth: 300,
                minSlides: 3,
                maxSlides: 3,
                moveSlides: 3,
                slideMargin: 10,
                captions: true,
                auto: true,
                touchEnabled: true,
                pager: false
            });
            $(".text-band").css({'font-size': '20px'});
        } else {
            $(".box-category-item").css({"margin-top": "0px"});
            $('.slider5').bxSlider({
                slideWidth: 300,
                minSlides: 2,
                maxSlides: 2,
                moveSlides: 2,
                slideMargin: 10,
                captions: true,
                auto: true,
                touchEnabled: true,
                pager: false
            });
            $(".text-band").css({'font-size': '20px'});
        }
    });

    function searchProduct() {
        var url = "<?php echo Yii::app()->createUrl('frontend/product/search') ?>";
        var search = $("#boxsearchproduct").val();
        if (search == "") {
            $("#boxsearchproduct").focus();
            return false;
        }
        window.location = url + "/product/" + search;
    }
</script>
