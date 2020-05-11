<div class="row" style=" margin: 0px;">
    <?php
    $productModel = new Product();

    foreach ($product as $rsProduct):
        $img_title = $productModel->firstpictures($rsProduct['product_id']);
        if (!empty($img_title)) {
            $img = "uploads/product/thumbnail/480-" . $img_title;
        } else {
            $img = "images/No_image_available.jpg";
        }
        ?>
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6" style=" padding: 5px;">
            <figure class="item">
                <div class="product product-style-3" style=" background: #ffffff;  border-radius: 5px 5px 5px 5px;">
                    <div class="img-wrapper" style="border:none;">
                        <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>">
                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" style="border-radius: 5px 5px 0px 0px;"/>
                        </a>
                    </div>
                    <figcaption class="desc">
                        <h4 class="font-supermarket" style=" height: 50px; overflow: hidden;">
                            <a class="product-name" style="color:#9d1419;" href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>"><?php echo $rsProduct['product_name'] ?></a>
                        </h4>
                        <span class="price font-supermarket" style="color:#000000; font-weight: bold; font-size: 18px;">
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
        </div>
    <?php endforeach; ?>
</div>



