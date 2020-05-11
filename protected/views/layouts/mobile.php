<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>
            <?php $web = new Configweb_model(); ?>
            <?php echo CHtml::encode($this->pageTitle); ?>
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/images/48395865_2012629585487025_3364863562223714304_n.png">
        <!--
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="266256337158296" />
        <meta property="og:title" content="<?php //echo Yii::app()->session['fbtitle'];                ?>" />
        <meta property="og:image" content="<?php //echo Yii::app()->session['fbimages'];                ?>" />
        <meta property="og:image:url" content="<?php //echo Yii::app()->session['fbimages'];                ?>" />
        <meta property="og:image:secure_url" content="<?php //echo Yii::app()->session['fbimages'];                ?>" />
        <meta property="og:url" content="<?php //echo Yii::app()->session['fburl'];                ?>" />
        <meta property="og:hashtag" content="<?php //echo $web->get_webname()                ?>" />

        <meta property="og:caption" content="<?php //echo Yii::app()->session['description'];                ?>" />
        <meta property="og:description" content="<?php //echo Yii::app()->session['description'];                ?>" />
        -->
        <meta name="description" content="<?php echo Yii::app()->session['description']; ?>" />
        <meta name="keywords" content="ชื้อของออนไลน์,kmarket,k-market,เค,เคมาร์เก็ต,ช็อป" />

        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/css/main.css") ?>

        <style>
            body {
                -webkit-text-size-adjust: none;
                touch-action: manipulation;
            }
            .menuheadphoneguru ul li a:hover{
                color: #d00517;
            }

            .menuheadphoneguru ul li a:focus{
                color: #d00517;
            }
            #lisubmenu{
                /*border-bottom:solid 1px #eeeeee;*/
            }
            #lisubmenu a{
                padding: 10px;
                color: #000000;
            }

            #lisubmenu a:hover{
                padding: 10px;
                color: #d00517;

            }
            #ulmenu{
                padding-top: 5px;
                z-index: 1000;
            }


            @media (min-width: 768px) {

            }

            @media (min-width: 992px) {

            }

            @media (min-width: 1200px) {

            }


            .breadcrumbs a{
                color: #FFFFFF;
            }
            .breadcrumbs a:hover{
                color: #00ccff;
            }
            .breadcrumbs span{
                color: #999999;
            }

            .task-bar-bottom button{
                border-radius: 0px;
                border: 1px solid #ffffff;
                border-top: 0px;
                height:  50px;
                padding-top: 12px;
                background: #ffffff;
            }

        </style>
        <?php
        $userModel = new User();
        $productModel = new Product();
        $lastProduct = $productModel->_get_last_product();
        //$bestProduct = $productModel->_get_best_product();
        //$saleProduct = $productModel->_get_sale_products();

        $articleModel = new Article();
        //$NewsBlog = $articleModel->Get_article_limit(3);
        $articleCategory = Articlecategory::model()->findAll("active=:active", array(":active" => "1"));


        $ContactModel = new Contact();
        $Contact = $ContactModel->gat_contact();
        $logoMini = "<img src='" . Yii::app()->baseUrl . "/images/logo.png' class='img-responsive' alt='Image'>";
        $iconsloader = "<img src='" . Yii::app()->baseUrl . "/images/icons/spin.svg' />";


        //Cart
        $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
        if (isset($_SESSION['qty'])) {
            $meQty = 0;
            foreach ($_SESSION['qty'] as $meItem) {
                $meQty = (int) $meQty + (int) $meItem;
            }
        } else {
            $meQty = 0;
        }
        ?>
    </head>
    <body class="animsition animsition" style="background: #f2f2f2;">
        <input value="<?php echo $logoMini ?>" id="logomini" type="hidden" />
        <?php
        $Categorys = Category::model()->findAll();
        ?>
        <div class="home-1" id="page" style=" padding-bottom: 50px;">
            <!-- Menu Nav -->
            <div id="kkmenusidebar"></div>
            <nav id="menu" class=" font-supermarket" style="background:#ffffff; color: #ff6600; font-size: 16px;">
                <ul>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('site/index') ?>" style=" font-size: 16px;">หน้าแรก</a>
                    </li>
                    <li>
                        <a class="active" href="<?php echo Yii::app()->createUrl('frontend/product') ?>" style=" font-size: 16px;">หมวดสินค้า</a>
                        <ul style=" font-size: 16px;">
                            <?php
                            foreach ($Categorys as $rsCategory):
                                $Types = ProductType::model()->findAll("category=:id", array(":id" => $rsCategory['id']));
                                if (count($Types) <= 0) {
                                    ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/category', array('id' => $rsCategory['id'])) ?>"><?php echo $rsCategory['categoryname'] ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li style=" font-size: 16px;">
                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/category', array('id' => $rsCategory['id'])) ?>"><?php echo $rsCategory['categoryname'] ?></a>
                                        <ul>
                                            <?php
                                            foreach ($Types as $rsTypes):
                                                ?>
                                                <li style=" font-size: 16px;">
                                                    <a href="<?php echo Yii::app()->createUrl('frontend/product/view', array('type' => $rsTypes['type_id'])) ?>"><?php echo $rsTypes['type_name'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li style=" font-size: 16px;">
                        <a href="<?php echo Yii::app()->createUrl('frontend/article') ?>" style=" font-size: 16px;">ข่าว</a>
                        <ul>
                            <?php foreach ($articleCategory as $articleCategorys): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('frontend/article/index', array('category' => $articleCategorys['id'])) ?>"><?php echo $articleCategorys['category'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li style=" font-size: 16px;">
                        <a href="<?= Yii::app()->createUrl('site/payment') ?>">แจ้งชำระเงิน / วิธีชำระเงิน</a>
                    </li>
                    <li style=" font-size: 16px;">
                        <a href="<?= Yii::app()->createUrl('site/privacypolicy') ?>">นโยบายความเป็นส่วนตัว</a>
                    </li>
                    <li style=" font-size: 16px;">
                        <a href="<?= Yii::app()->createUrl('frontend/contact') ?>">ติดต่อเรา</a>
                    </li>
                </ul>
            </nav>

            <header class="header-style-2 nav navbar-fixed-top" id="header-nav" style=" background: #fc4a1a;
                    background: -webkit-linear-gradient(to top, #f7b733, #ffffff);
                    background: linear-gradient(to right, #f7b733, #ffffff);
                    border-bottom: #cccccc solid 0px; padding: 10px; box-shadow: #acacac 0px 0px 10px 0px;"><!-- /images/bgheader.png-->
                <div class="container" id="menuBar">
                    <div class="row">
                        <div class="header-1-inner">
                            <!--
               hidden-lg hidden-md hidden-sm
                            -->
                            <div class="widget widget-control-header">
                                <a class="navbar-toggle js-offcanvas-has-events" type="button" href="#menu">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                            </div>

                            <a class="brand-logo animsition-link" href="<?php echo Yii::app()->createUrl('site/index') ?>">
                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" alt="" style="max-height: 52px;"/>
                            </a>
                            <nav class="menuheadphoneguru">
                                <ul class="menu hidden-xs">

                                </ul>
                            </nav>
                            <aside class="right">
                                <!--
                                <div class="widget widget-control-header widget-search-header">
                                    <a class="control btn-open-search-form js-open-search-form-header" href="javascript:searchproduct()">
                                        <span class="lnr lnr-magnifier"></span>
                                    </a>
                                    <div class="form-outer" style=" background: url('<?php //echo Yii::app()->baseUrl         ?>/images/black-glass.png'); ">
                                        <button class="btn-close-form-search-header js-close-search-form-header">
                                            <span class="lnr lnr-cross"></span>
                                        </button>
                                        <form onsubmit="return false;">
                                            <input placeholder="Search" id="searchproduct"/>
                                            <button class="search">
                                                <span class="lnr lnr-magnifier" onclick="searchproduct()"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                                    <a class="control" href="<?php //echo Yii::app()->createUrl('frontend/orders/cart')                                                                                                                                      ?>">
                                        <span class="lnr lnr-cart"></span>
                                        <span class="badge" style=" background: #cc0033;"><?php //echo $meQty;                                                                                                                                      ?></span>
                                    </a>
                                </div>
                                -->
                                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                                    <a class="control" href="<?php echo Yii::app()->createUrl('frontend/notify/index') ?>">
                                        <span class="lnr lnr-alarm"></span>
                                        <span class="badge" style=" background: #cc0033;"><?php echo $userModel->countNotify(Yii::app()->user->id); ?></span>
                                    </a>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </header>

            <?php if ($this->breadcrumbs): ?>
                <div class="font-THK" style="padding: 10px; color: #ffffff; background: #171721;border-bottom: #cccccc solid 0px; text-align: center; font-size: 20px; z-index:1;">
                    <div class="container">
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'homeLink' => '<i class="fa fa-home"></i> ' . CHtml::link('หน้าแรก', Yii::app()->createUrl('site/index')),
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    </div>
                </div>
            <?php endif ?>
            <div class="body-content">
                <?php echo $content; ?>
            </div>
        </div>
        <!--
        <div class="task-bar-bottom" style=" display: none; position: fixed; bottom: 0px; width: 100%; padding: 0px; margin-bottom: 0px; border-top: #eeeeee solid 1px;">
            <div class="btn-group btn-group-justified" role="group" aria-label="..." style=" padding: 0px; margin: 0px; height: 50px;">
                <div class="btn-group" role="group">
                    <a href="<?php //echo Yii::app()->createUrl('site/index')                                                                                                            ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-home fa-2x" id="b-home"></span>
                        </button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php //echo Yii::app()->createUrl('frontend/product/formsearch')                                                                                                            ?>">
                        <button type="button" class="btn btn-default" >
                            <span class="lnr lnr-magnifier fa-2x" id="b-search"></span>
                        </button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php //echo Yii::app()->createUrl('frontend/orders/cart')                                                                                                            ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-cart fa-2x" id="b-cart"></span>
                            <span class="badge" style=" background: #cc0033; position: absolute; top: 10px; right: 10px;"><?php //echo $meQty;                                                                                                            ?></span>
                        </button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php //echo Yii::app()->createUrl('frontend/orders/menuuser')                                                                                                            ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-user fa-2x" id="b-menu"></span>
                        </button></a>
                </div>
            </div>
        </div>
        -->
        <div class="task-bar-bottom" style=" background: #FFFFFF; position: fixed; bottom: 0px; width: 100%; padding: 0px; padding-top: 10px; margin-bottom: 0px; border-top: #eeeeee solid 1px;">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style=" text-align: center;">
                    <a href="<?php echo Yii::app()->createUrl('site/index') ?>" id="b-home" >
                        <span class="lnr lnr-home fa-2x"></span>
                        <p style='font-size: 10px'>หน้าแรก</p>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style=" text-align: center;" >
                    <a href="<?php echo Yii::app()->createUrl('frontend/product/formsearch') ?>" id="b-search">
                        <span class="lnr lnr-magnifier fa-2x"></span>
                        <p style='font-size: 10px'>ค้นหา</p>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style=" text-align: center">
                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/cart') ?>" id="b-cart">
                        <span class="lnr lnr-cart fa-2x"></span>
                        <p style='font-size: 10px'>ตระกร้า</p>
                        <span class="badge" style=" background: #cc0033; position: absolute; top: 0px; right: 10px;"><?php echo $meQty; ?></span>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style=" text-align: center">
                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/menuuser') ?>" id="b-menu">
                        <span class="lnr lnr-user fa-2x"></span>
                        <p style='font-size: 10px'>บัญชี</p>
                    </a>
                </div>
            </div>
        </div>

        <?php Yii::app()->clientScript->scriptMap=array(
            'notify.min.js' => false,
            'bootstrap-noconflict.js' => false,
            'bootbox.min.js' => false,
            'jquery-ui-bootstrap.css' => false,
            'bootstrap-yii.css' => false,
            'bootstrap.min.css' => false,
            'jquery.bxslider.css' => false,
            'jquery.fancybox.css' => false,
            //'magnific-popup.css' => false
        );?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/jquery.min.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/bootstrap.min.js") ?>
        <!--
        <script src="<?php //Yii::app()->baseUrl;                                                                        ?>/themes/kstudio/js/function-check-viewport.js"></script>
        -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/slick.min.js") ?>

        <!--
        <script src="<?php // Yii::app()->baseUrl;                                                                         ?>/themes/kstudio/js/library/select2.full.min.js"></script>
        -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/imagesloaded.pkgd.min.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/jquery.mmenu.all.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/rellax.min.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/isotope.pkgd.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/bootstrap-notify.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/bootstrap-slider.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/in-view.min.js") ?>

        <!--
        <script src="<?php //echo  Yii::app()->baseUrl;                                                                    ?>/themes/kstudio/js/library/countUp.js"></script>
        -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/library/animsition.min.js") ?>

        <?php //Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/css/settings.css") ?>
        <?php //Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/css/layers.css") ?>
        <!--
        <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->baseUrl;                                                                  ?>/themes/kstudio/revolution/css/navigation.css" />
        -->

        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/jquery.themepunch.tools.min.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/jquery.themepunch.revolution.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.actions.min.js") ?>

        <!--
        <script src="<?php //echo Yii::app()->baseUrl;                                                                   ?>/themes/kstudio/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        -->

        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.kenburn.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.layeranimation.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.migration.min.js") ?>

        <!--
        <script src="<?php //Yii::app()->baseUrl;                                                                  ?>/themes/kstudio/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        -->
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.parallax.min.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/revolution/js/extensions/revolution.extension.slideanims.min.js") ?>

        <!--
        <script src="<?php //Yii::app()->baseUrl;                                                             ?>/themes/kstudio/revolution/js/extensions/revolution.extension.video.min.js"></script>
        -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/global.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-mm-menu.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-set-bg-blog-thumb.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-isotope-product-home-1.js") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-isotope-product-home-2.js") ?>

        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-carousel.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-carousel-thumbnail.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/config-carousel-product-quickview.js") ?>
        <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/js/demo-add-to-cart.js") ?>

        <!-- Jquery.Bxslide-->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/jquery.bxslider/jquery.bxslider.css") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/jquery.bxslider/jquery.bxslider.js") ?>

        <!-- fancybox -->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/fancyBox2.1.5/source/jquery.fancybox.css") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/themes/kstudio/fancyBox2.1.5/source/jquery.fancybox.js") ?>

        <!-- images hover effect -->
        <?php //Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/css/images-hover-effect.css") ?>

        <!-- Gallery -->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/assets/gallery_img/dist/magnific-popup.css") ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/assets/gallery_img/dist/jquery.magnific-popup.js") ?>

        <script tyle="text/javascript">
            setScreen();
            /*
             $(window).scroll(function() {
             if ($(this).scrollTop()) {
             $("#header-nav").addClass("nav navbar-fixed-top");
             } else {
             $("#header-nav").removeClass("nav navbar-fixed-top");
             }
             });
             */
            //getMenu();
            function setScreen() {
                var w = window.innerWidth;
                if (w >= 768) {
                    $(".brand-logo").css({"margin-left": "38%"});
                    $(".body-content").css({"margin-top": "20px"});
                    $("#menuBar").css({"padding-bottom": "0px"});
                } else {
                    $(".brand-logo").css({"margin-left": "20%"});
                    $("#slider_1").hide();
                    $("#slider_1").css({"height": "20px"});
                }
            }

            function getMenu() {
                var url = "<?php echo Yii::app()->createUrl('site/getmenu') ?>";
                $.get(url, function(data) {
                    $("#kkmenusidebar").html(data);
                });
            }

            $(document).ready(function() {
                $(document).keydown(function(event) {
                    if (event.ctrlKey == true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109' || event.which == '187' || event.which == '189')) {
                        alert('disabling zooming');
                        event.preventDefault();
                        // 107 Num Key  +
                        //109 Num Key  -
                        //173 Min Key  hyphen/underscor Hey
                        // 61 Plus key  +/=
                    }
                });

                $(window).bind('mousewheel DOMMouseScroll', function(event) {
                    if (event.ctrlKey == true) {
                        alert('disabling zooming');
                        event.preventDefault();
                    }
                });
            });
        </script>
    </body>
</html>
