<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl; ?>/css/headphoneguru.css" />
<?php
$web = new Configweb_model();
$productModel = new Product();
$lastProduct = $productModel->_get_last_product();
//$bestProduct = $productModel->_get_best_product();
//$saleProduct = $productModel->_get_sale_products();
?>
<br/><br/><br/>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <h2 class=" font-supermarket" style=" margin-bottom: 15px;">
                <b>PRODUCT</b>
            </h2>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <div class="pull-right">
                <a href="<?php echo Yii::app()->createUrl('frontend/product') ?>">VIEW MORE</a>
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
            <figure class="item Newproduct">
                <div class="products product-style-3" style="background: #ffffff;box-shadow: #dbdbdb 3px 3px 3px 0px; border-radius: 5px">
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
                        <h4 class="font-supermarket" style=" height: 50px; overflow: hidden;">
                            <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>" class="product-name" style="color:#5c5c5c;"><?php echo $rsProduct['product_name'] ?></a>
                        </h4>
                        <span class="price font-supermarket" id="text-price">
                            <?php if ($rsProduct['product_price_pro'] > 0) { ?>
                                <del style=" color: #ff0000;"><?php echo number_format($rsProduct['product_price']) ?></del>
                                <?php echo number_format($rsProduct['product_price_pro']) ?>  .-
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
</script>
