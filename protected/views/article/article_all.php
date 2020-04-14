<style type="text/css">
    #actives {
        font-weight: bold;
        color: brown;
        font-size: 28px;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        var width = $(window).width();
        if (width >= 768) {
            var styles = {
                "white-space": "nowrap",
                "width": "220px",
                "overflow": "hidden",
                "text - overflow": "ellipsis"
            };
            $(".caption").css(styles);
            //$(".box_product").css("height", "350px");
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var track_click = 0; //track user click on "load more" button, righ now it is 0 click
        //fetch_pages.php
        var total_pages = "<?php echo $count; ?>";
        var category = "<?php echo $category ?>"
        $('#results').load("<?php echo Yii::app()->createUrl('frontend/article/pages') ?>", {page: track_click, 'category': category}, function() {
            track_click++;
        }); //initial data to load

        $(".load_more").click(function(e) { //user clicks on button

            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image

            if (track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo Yii::app()->createUrl('frontend/article/pages') ?>', {page: track_click, category: category}, function(data) {

                    $(".load_more").show(); //bring back load more button

                    $("#results").append(data); //append data received from server

                    //scroll page to button element
                    //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);

                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received

                    track_click++; //user click increment on load button

                }).fail(function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError); //alert any HTTP error
                    $(".load_more").show(); //bring back load more button
                    $('.animation_image').hide(); //hide loading image once data is received
                });

                //total_pages - 1
                if (track_click >= total_pages - 1)
                {
                    //reached end of the page yet? disable load button
                    $(".load_more").attr("disabled", "disabled");
                }
            }

        });
    });
</script>

<?php
$articleModel = new Article();
$config = new Configweb_model();
if ($category != "") {
    $Cat = Articlecategory::model()->find("id=:id", array(":id" => $category));
    $title = $Cat['category'];
} else {
    $title = "บทความ / event";
}
?>
<br/><br/><br/>
<div class="container">
    <div class="row" style=" margin: 0px;">
        <div class="col-lg-12">
            <div style=" float: left; color: #000000;">
                <?php if ($category != "") { ?>
                    <h2 class="font-supermarket"><?php echo $Cat['category'] ?></h2>
                    <hr style=" margin: 10px 0px; border-bottom: #000000 solid 2px;"/>
                    <h4 class="font-supermarket" style=" font-size: 20px;" >ทั้งหมด <?php echo $count ?> รายการ</h4>
                <?php } else { ?>
                    <h4 class="font-supermarket" style=" font-size: 20px;">ทั้งหมด <?php echo $count ?> รายการ</h4>
                <?php } ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-lg-9">
            <div class="row" id="results" style="margin-top:20px;"></div>
        </div>
        <div class="col-md-3">
            <div class="sidebar" style="margin-top:20px;">
                <!--
                       <div class="widget widget-search">
                           <form class="organic-form form-inline btn-add-on border no-radius">
                               <div class="form-group">
                                   <input class="form-control" placeholder="Search..." type="text">
                                   <button class="btn btn-brand" type="submit">
                                       <i class="fa fa-search"></i>
                                   </button>
                               </div>
                           </form>
                       </div>
                -->
                <div class="widget widget-categories" style="background:#FFFFFF;">
                    <h4 class="title-widget text-center font-supermarket">Categories</h4>
                    <ul>
                        <?php foreach ($categoryList as $categorys): ?>
                            <li style=" margin-bottom: 0px; padding: 0px;">
                                <a href="<?php echo Yii::app()->createUrl('frontend/article/index', array('category' => $categorys['id'])) ?>" class=" font-THK" id="<?php echo ($categorys['id'] == $category) ? "actives" : ""; ?>" style=" font-size: 22px;">
                                    <?php echo $categorys['category'] ?>
                                    <span class="badge pull-right" style=" color: #000; font-size: 18px; margin-top: 5px;"><?php echo $articleModel->CountArticleByCategory($categorys['id']) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="widget widget-blog-post" style="background:#FFFFFF;">
                    <h4 class="title text-center font-supermarket" style=" font-size: 24px;">ล่าสุด</h4>
                    <ul class="list-blog">
                        <?php foreach ($lastblog as $lastblogs):
                            ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('frontend/article/views', array('id' => $lastblogs['id'])) ?>">
                                    <div class="img-wrapper">
                                        <img class="img img-responsive" src="<?= Yii::app()->baseUrl; ?>/uploads/article/80-<?php echo $lastblogs['images'] ?>" alt="feature-image">
                                    </div>
                                    <div class="desc" style=" padding-top: 0px;">
                                        <p class="meta-time" style=" font-size: 12px"><?php echo $config->thaidate(substr($lastblogs['create_date'], 0, 10)) ?></p>
                                        <h5 class="title font-THK" style=" font-size: 22px;"><?php echo $lastblogs['title'] ?></h5>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>

    <br/>

    <div align="center">
        <button class="load_more btn btn-default" id="load_more_button">
            เพิ่มเติม <i class="fa fa-angle-down"></i>
        </button>
        <div class="animation_image" style="display:none;">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/ajax-loader.gif"> Loading...
        </div>
    </div>
    <br/>
</div>


<script>
    $(document).ready(function() {
        var screen = $(".widget-blog-post").width();
        var w = (screen - 100);
        $(".list-blog .desc").css({'width': w, 'height': '90px', 'overflow': 'hidden'});

    });

    function delete_article(id) {
        var url = "<?php echo Yii::app()->createUrl('backend/article/delete') ?>";
        var r = confirm("คุณแน่ใจหรือไม่ ...?");
        var data = {id: id};
        if (r == true) {
            $.post(url, data, function(success) {
                window.location = "<?php echo Yii::app()->createUrl('backend/article') ?>";
            });
        }
    }
</script>
