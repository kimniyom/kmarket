<style type="text/css">
    #setColorNear{
        background: #FFFFFF;
    }
    .product {

        padding:0px;
        transition: all 0.3s ease-in-out;
    }
    .product:hover {
        box-shadow: #eeeeee 0px 0px 5px 0px;
        padding:10px;
        transition: all 0.3s ease-in-out;
    }

    .product img{
        transition: all 0.3s ease-in-out;
    }

    .view-products #text-color-product{
        color: #009966;
    }

    .view-products a{
        color: #9d1419;
    }

</style>

<script type="text/javascript">
    $(document).ready(function() {
        var style = {"height": "auto"};
        $("#box-article img").addClass("img-responsive");
        $("#box-article img").css(style);

        $('.image-link').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function(openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    });
</script>
<?php
$this->pageTitle = $product['product_name'];
/*
  $title = $product['product_name'];
  $this->breadcrumbs = array(
  $product['categoryname'] => array('frontend/product/category/id' . '/' . $product['category']),
  $product['type_name'] => array('frontend/product/view/type' . '/' . $product['type_id']),
  $title,
  );
 *
 */
?>
<?php
$productModel = new Product();
$ConfigWeb = new Configweb_model();

//$UrlShare = $ConfigWeb->GetFullLink(Yii::app()->request->url);
?>

<div class="view-products font-supermarket" style=" padding-top: 10px; background: #FFFFFF;">
    <br/><br/><br/>
    <div class="shop-detail-3 woocommerce" id="page">
        <section class="boxed-sm" style="margin:0px;">
            <div class="container" style=" background: #FFFFFF; padding: 0px;">
                <div class="row product-detail" style=" margin: 0px;padding: 5px;">
                    <div class="row product-detail-wrapper" style="margin:0px;">
                        <div class="col-md-6">
                            <div class="woocommerce-product-gallery vertical" style="margin:0px;">
                                <?php
                                $i = 0;
                                foreach ($images as $al): $i++;
                                    if ($i == 1) {
                                        ?>
                                        <div class="item">
                                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/product/<?= $al['images'] ?>" alt="product thumbnail">
                                        </div>
                                    <?php } ?>
                                <?php endforeach; ?>
                                <div class="main-carousel">
                                    <div class="thumbnail-carousel">
                                        <?php
                                        $a = 0;
                                        foreach ($images as $al): $a++;
                                            if ($a != 1) {
                                                ?>

                                                <div class="col-xs-3 col-sm-3" style=" margin-top: 5px; padding: 5px;">
                                                    <div class="item">
                                                        <a class="image-link" href="<?php echo Yii::app()->baseUrl; ?>/uploads/product/<?= $al['images'] ?>">
                                                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/product/thumbnail/100-<?= $al['images'] ?>" alt="product thumbnail">
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="summary">
                                <div class="desc">
                                    <div class="header-desc">
                                        <h4 class="product-title font-supermarket" id="text-color-product" style=" font-size: 22px;"><?php echo $product['product_name'] ?></h4>
                                        <p class="price" style=" font-size: 30px; color: #ff3300;">ราคา
                                            <?php
                                            if ($product['product_price_pro'] > 0) {
                                                echo number_format($product['product_price_pro']) . " .-";
                                                echo " <del style='color: #5c5c5c; font-size: 14px;'>" . number_format($product['product_price']) . "</del> ";
                                            } else {
                                                echo number_format($product['product_price']) . ' .-';
                                            }
                                            ?>

                                        </p>
                                        <p><em>คงเหลือ <?php echo $stock ?></em></p>
                                    </div>
                                    <div class="body-desc">
                                        <div class="woocommerce-product-details-short-description" style=" font-size: 18px;">
                                            <p><?php echo $product['description'] ?></p>
                                        </div>
                                    </div>
                                    <div class="footer-desc">
                                        <div class="cart">
                                            <!--
                                            <div class="quantity buttons-added">
                                                <input class="minus" value="-" type="button">
                                                <input class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number">
                                                <input class="plus" value="+" type="button">
                                            </div>
                                            -->
                                            <div class="group-btn-control-wrapper">
                                                <!--
                                                <a href="https://www.messenger.com/t/kstudiothai" target="_black">
                                                    <button class="btn btn-default"><i class="fa fa-comment text-success"></i> <font class="text-success">แชทเลย</font></button></a>
                                                -->
                                                <?php if ($stock > 0) { ?>
                                                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/add', array("itemId" => $product['product_id'])) ?>">
                                                        <button class="btn btn-warning btn-lg btn-block" style=" border-radius: 0px; font-size: 20px;"><i class="fa fa-shopping-cart"></i> หยิบใส่ตระกร้า</button></a>
                                                <?php } else { ?>
                                                    <font style=" color: #ff0000; font-size: 22px;">หมดชั่วคราว</font>
                                                <?php } ?>
                                                <!--
                                                     <button class="btn btn-wishlist btn-default">
                                                     <i class="fa fa-heart text-danger"></i>
                                                 </button>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-meta">
                                    <p class="posted-in">Categories:
                                        <a href="#" rel="tag"><?php echo $product['categoryname'] ?></a>
                                    </p>
                                    <p class="tagged-as">Tags:
                                        <a href="#" rel="tag"><?php echo $product['categoryname'] ?></a>,
                                        <a href="#" rel="tag"><?php echo $product['type_name'] ?></a>
                                    </p>
                                    <p class="id">ID:
                                        <a href="#"><?php echo $product['product_id'] ?></a>
                                    </p>
                                </div>

                                <!-- I got these buttons from simplesharebuttons.com -->

                                <div class="widget-social align-center" style=" margin-top: 0px; padding-top: 0px;">
                                    <!--
                                                                        <ul>
                                                                            <li style="text-align:center;">
                                                                                <a href="http://www.facebook.com/sharer.php?u=<?php //echo $UrlShare                                                             ?>" target="_blank">
                                                                                    <img src="<?php //echo Yii::app()->baseUrl                                                             ?>/images/facebook.png" alt="Facebook" style="width:32px;"/>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                                                                                    <img src="<?php //echo Yii::app()->baseUrl                                                             ?>/images/pinterest.png" alt="Pinterest" style="width:32px;"/>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="https://twitter.com/share?url=<?php //echo $UrlShare                                                             ?>&amp;text=<?php //echo Yii::app()->session['fbtitle'];                                                             ?>;hashtags=<?php //echo $ConfigWeb->get_webname()                                                             ?>" target="_blank">
                                                                                    <img src="<?php //echo Yii::app()->baseUrl                                                             ?>/images/twitter.png" alt="Twitter" style="width:32px;"/>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="https://lineit.line.me/share/ui?url=<?php //echo $UrlShare                                                             ?>" target="_blank">
                                                                                    <img src="<?php //echo Yii::app()->baseUrl                                                             ?>/images/line-icon.png" alt="Line" style="width:32px;"/>
                                                                                </a>
                                                                            </li>

                                                                        </ul>
                                    -->
                                    <div style=" clear: both; font-size:18px;">
                                        <br/>
                                        <i class="fa fa-eye"></i> คนเข้าดูสินค้า : <?php echo $product['countread'] ?> ครั้ง
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container" style=" border: #e7f0f2 solid 1px; background: #FFFFFF; padding:0px;">
                    <div class="woocommerce-tabs">
                        <div class="row" style="margin:0px;">
                            <div class="col-md-12 woocommerce-tabs-inner" style="border:none;">
                                <ul class="tabs tab-style-1" role="tablist">
                                    <li class="active" role="presentation">
                                        <a href="#Description" aria-controls="Description" role="tab" data-toggle="tab"><b>รายละเอียด</b></a>
                                    </li>
                                    <!--
                                    <li role="presentation">
                                        <a href="#Review" onclick="loadreview()" aria-controls="Review" role="tab" data-toggle="tab">Review (<?php //echo $countreview                                                          ?>)</a>
                                    </li>
                                    -->
                                </ul>

                            </div>
                            <div class="col-md-8" style="margin-top:0px; padding: 0px;">
                                <div class="tab-content tab-content-style-2" style="margin-top: 10px; padding: 0px; padding-left: 15px;">
                                    <div class="tab-pane fade in active" id="Description" role="tabpanel">
                                        <div id="box-article" style=" font-size: 16px;">
                                            <?php echo $product['product_detail'] ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Review" role="tabpanel">
                                        <div id="box-review"></div>
                                        <br/>
                                        <div class="font-THK">
                                            <h2 class="font-THK">เขียนรีวิว</h2>
                                            <p style=" font-size: 20px;">ที่อยู่อีเมลของคุณจะไม่ถูกเผยแพร่ ช่องที่ต้องการถูกทำเครื่องหมาย *</p>
                                        </div>
                                        <br/>
                                        <form id="form-review">
                                            <div class="row" style="margin:0px;">
                                                <div class="col-md-12 col-lg-12">
                                                    <textarea class="form-control" rows="5" id="reviews" required="required" placeholder="Your Review *"></textarea>
                                                </div>
                                            </div>
                                            <div class="row" style=" margin: 10px 0px 0px 0px;">
                                                <div class="col-md-6 col-lg-6" style=" padding-bottom: 10px;">
                                                    <input type="text" class="form-control" id="name" placeholder="Name *" required="required"/>
                                                </div>
                                                <div class="col-md-6 col-lg-6" style=" padding-bottom: 10px;">
                                                    <input type="email" class="form-control" id="email" placeholder="Email *" required="required"/>
                                                </div>
                                            </div>
                                            <div class="row" style=" margin-top: 10px; margin:0px;">
                                                <div class="col-md-6 col-lg-6" style=" padding-bottom: 10px;">
                                                    <button type="submit" class="btn btn-default">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="relate-product">
                        <div class="heading-wrapper text-center">
                            <h3 class="heading font-THK">สินค้าอื่น ๆ</h3>
                        </div>

                        <div class="row js-product-masonry-filter-layout-2 product-masonry-filter-layout-2">

                            <?php
                            foreach ($near as $nears):
                                $img_title = $productModel->firstpictures($nears['product_id']);
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
        </section>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function($) {
        $(document).on('submit', '#form-review', function(event) {
            event.preventDefault();
            var product_id = "<?php echo $product['product_id'] ?>";
            var reviews = $("#reviews").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var url = "<?php echo Yii::app()->createUrl('frontend/product/savereview') ?>";
            var data = {product_id: product_id, reviews: reviews, name: name, email: email};
            if (name == "") {
                $("#reviews").focus();
                return false;
            }
            if (name == "") {
                $("#name").focus();
                return false;
            }
            if (email == "") {
                $("#email").focus();
                return false;
            }
            $.post(url, data, function(result) {
                loadreview();
                $("#name").val("");
                $("#email").val("");
                $("#reviews").val("");
            });
        });
    });
    //load_comment();
    loadreview();
    function load_comment() {
        $("#comment").html("<center><i class='fa fa-spinner fa-spin fa-2x'></i></center>");
        var product_id = "<?php echo $product['product_id'] ?>";
        var url = "<?php echo Yii::app()->createUrl('frontend/comment') ?>";
        var data = {product_id: product_id};

        $.post(url, data, function(result) {
            $("#comment").html(result);
        });
    }

    function send_comment() {
        var product_id = "<?php echo $product['product_id'] ?>";
        var box_comment = $("#box_comment").val();
        var url = "<?php echo Yii::app()->createUrl('frontend/comment/send_comment') ?>";
        var data = {product_id: product_id, box_comment: box_comment};
        if (box_comment == '') {
            $("#box_comment").focus();
            return false;
        }
        $.post(url, data, function(result) {
            load_comment();
        });
    }

    function submitReview() {
        var product_id = "<?php echo $product['product_id'] ?>";
        var reviews = $("#reviews").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var url = "<?php echo Yii::app()->createUrl('frontend/comment/savereview') ?>";
        var data = {product_id: product_id, reviews: reviews};
        if (name == "") {
            $("#reviews").focus();
            return false;
        }
        if (name == "") {
            $("#name").focus();
            return false;
        }
        if (email == "") {
            $("#email").focus();
            return false;
        }
        $.post(url, data, function(result) {
            loadreview();

        });
    }

    function loadreview() {
        $("#box-review").html("<center><i class='fa fa-spinner fa-spin fa-2x'></i></center>");
        var product_id = "<?php echo $product['product_id'] ?>";
        var url = "<?php echo Yii::app()->createUrl('frontend/product/review') ?>";
        var data = {product_id: product_id};

        $.post(url, data, function(result) {
            $("#box-review").html(result);
        });
    }

</script>

