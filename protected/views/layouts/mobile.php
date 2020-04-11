<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>
            <?php $web = new Configweb_model(); ?>
            <?php echo CHtml::encode($this->pageTitle); ?>
        </title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/images/48395865_2012629585487025_3364863562223714304_n.png">
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="266256337158296" />
        <meta property="og:title" content="<?php echo Yii::app()->session['fbtitle']; ?>" />
        <meta property="og:image" content="<?php echo Yii::app()->session['fbimages']; ?>" />
        <meta property="og:image:url" content="<?php echo Yii::app()->session['fbimages']; ?>" />
        <meta property="og:image:secure_url" content="<?php echo Yii::app()->session['fbimages']; ?>" />
        <meta property="og:url" content="<?php echo Yii::app()->session['fburl']; ?>" />
        <meta property="og:hashtag" content="<?php echo $web->get_webname() ?>" />

        <meta property="og:caption" content="<?php echo Yii::app()->session['description']; ?>" />
        <meta property="og:description" content="<?php echo Yii::app()->session['description']; ?>" />


        <meta name="description" content="<?php echo Yii::app()->session['description']; ?>" />
        <meta name="keywords" content="ชื้อของออนไลน์,kmarket,k-market,เค,เคมาร์เก็ต,ช็อป" />

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl; ?>/themes/kstudio/css/main.css" />
        <style>
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

            #ulmenufull a{
                padding: 5px;
            }

            #ulmenufull a:hover{
                padding-left: 10px;
            }


            @media (min-width: 768px) {
                #ulmenufull{
                    top: 30px;
                }
            }

            @media (min-width: 992px) {
                #ulmenufull{
                    top: 35px;
                }
            }

            @media (min-width: 1200px) {
                #ulmenufull{
                    top: 40px;
                }
            }



            #_footer h4{
                font-family: 'supermarket';
                font-weight: bold;
                margin-bottom: 5px;
                color: #000000;
            }

            #_footer ul li{
                margin-bottom: 0px;
            }

            #_footer ul li a{
                font-family: 'supermarket';
                font-size: 16px;

            }

            .widget-link ul li{
                font-family: 'supermarket';

                font-size: 16px;
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
                border-radius: 0px; border: 1px solid #ffffff; border-top: 0px; height:  50px; padding-top: 12px;
            }
        </style>
        <?php
        $productModel = new Product();
        $lastProduct = $productModel->_get_last_product();
        $bestProduct = $productModel->_get_best_product();
        $saleProduct = $productModel->_get_sale_products();

        $articleModel = new Article();
        $NewsBlog = $articleModel->Get_article_limit(3);
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
            <nav id="menu" style="background:#ffffff; color:red;">
                <ul>
                    <li>
                        <a href="">HOME</a>
                    </li>
                    <li>
                        <a class="active" href="<?php echo Yii::app()->createUrl('frontend/product') ?>" >หมวดสินค้า</a>
                        <ul>
                            <?php
                            foreach ($Categorys as $rsCategory):
                                $Types = ProductType::model()->findAll("category=:id", array(":id" => $rsCategory['id']));
                                if (count($Types) <= 0) {
                                    ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/category', array('id' => $rsCategory['id'])) ?>"><?php echo $rsCategory['categoryname'] ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/category', array('id' => $rsCategory['id'])) ?>"><?php echo $rsCategory['categoryname'] ?></a>
                                        <ul>
                                            <?php
                                            foreach ($Types as $rsTypes):
                                                $sqlGetBrand = "select b.id,b.brandname from product p inner join brand b ON p.brand = b.id where p.type_id = '" . $rsTypes['type_id'] . "' group by brand";
                                                $Brands = Yii::app()->db->createCommand($sqlGetBrand)->queryAll();
                                                if (count($Brands) <= 0) {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/view', array('type' => $rsTypes['type_id'])) ?>"><?php echo $rsTypes['type_name'] ?></a>
                                                    </li>
                                                <?php } else { ?>
                                                    <li>
                                                        <a href="<?php echo Yii::app()->createUrl('frontend/product/view', array('type' => $rsTypes['type_id'])) ?>"><?php echo $rsTypes['type_name'] ?></a>
                                                        <ul>
                                                            <?php foreach ($Brands as $rsBrand): ?>
                                                                <li><a href="<?php echo Yii::app()->createUrl('frontend/product/brand', array('id' => $rsBrand['id'])) ?>"><?php echo $rsBrand['brandname'] ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo Yii::app()->createUrl('frontend/article') ?>">BLOG</a>
                        <ul>
                            <?php foreach ($articleCategory as $articleCategorys): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('frontend/article/index', array('category' => $articleCategorys['id'])) ?>"><?php echo $articleCategorys['category'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= Yii::app()->createUrl('site/payment') ?>">แจ้งชำระเงิน / วิธีชำระเงิน</a>
                    </li>
                </ul>
            </nav>

            <header class="header-style-2 nav navbar-fixed-top" id="header-nav" style="background:#FFFFFF;border-bottom: #cccccc solid 0px; padding: 10px; box-shadow: #acacac 0px 0px 10px 0px;"><!-- /images/bgheader.png-->
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
                                    <div class="form-outer" style=" background: url('<?php echo Yii::app()->baseUrl ?>/images/black-glass.png'); ">
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
                                    <a class="control" href="<?php //echo Yii::app()->createUrl('frontend/orders/cart')       ?>">
                                        <span class="lnr lnr-cart"></span>
                                        <span class="badge" style=" background: #cc0033;"><?php //echo $meQty;       ?></span>
                                    </a>
                                </div>
                                -->
                                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                                    <a class="control" href="<?php echo Yii::app()->createUrl('site/setting') ?>">
                                        <span class="lnr lnr-cog"></span>
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

            <?php echo $content; ?>

        </div>
        <div class="task-bar-bottom" style=" position: fixed; bottom: 0px; width: 100%; padding: 0px; margin-bottom: 0px; border-top: #eeeeee solid 1px;">
            <div class="btn-group btn-group-justified" role="group" aria-label="..." style=" padding: 0px; margin: 0px; height: 50px;">
                <div class="btn-group" role="group">
                    <a href="<?php echo Yii::app()->createUrl('site/index') ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-home fa-2x" id="b-home"></span>
                        </button></a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" >
                        <span class="lnr lnr-magnifier fa-2x" id="b-search"></span>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo Yii::app()->createUrl('frontend/orders/cart') ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-cart fa-2x" id="b-cart"></span>
                            <span class="badge" style=" background: #cc0033; position: absolute; top: 10px; right: 10px;"><?php echo $meQty; ?></span>
                        </button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo Yii::app()->createUrl('site/setting') ?>">
                        <button type="button" class="btn btn-default">
                            <span class="lnr lnr-user fa-2x" id="b-account"></span>
                        </button></a>
                </div>
            </div>
        </div>

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/jquery.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/function-check-viewport.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/slick.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/select2.full.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/imagesloaded.pkgd.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/jquery.mmenu.all.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/rellax.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/isotope.pkgd.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap-notify.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap-slider.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/in-view.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/countUp.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/animsition.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/settings.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/layers.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/navigation.css" />
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/global.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-mm-menu.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-set-bg-blog-thumb.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-isotope-product-home-1.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-isotope-product-home-2.js"></script>

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel.js"></script>

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-thumbnail.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-product-quickview.js"></script>
        <!-- Demo Only-->
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/demo-add-to-cart.js"></script>

        <!-- Jquery.Bxslide-->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/kstudio/jquery.bxslider/jquery.bxslider.css" media="screen">
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/jquery.bxslider/jquery.bxslider.js"></script>

        <!-- fancybox -->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/kstudio/fancyBox2.1.5/source/jquery.fancybox.css" media="screen">
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/fancyBox2.1.5/source/jquery.fancybox.js"></script>

        <!-- images hover effect -->
        <link href="<?= Yii::app()->baseUrl; ?>/themes/kstudio/css/images-hover-effect.css" rel="stylesheet" type="text/css" />

        <!-- Gallery -->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/magnific-popup.css" type="text/css" media="all" />
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/jquery.magnific-popup.js"></script>

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
                    $("#menuBar").css({"padding-bottom": "0px"});
                } else {
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

            function searchproduct() {
                var url = "<?php echo Yii::app()->createUrl('frontend/product/search') ?>";
                var search = $("#searchproduct").val();
                if (search == "") {
                    $("#searchproduct").focus();
                    return false;
                }

                window.location = url + "/product/" + search;
            }
        </script>
    </body>
</html>
