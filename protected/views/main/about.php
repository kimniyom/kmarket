<script type="text/javascript">
    $(document).ready(function () {
        var style = {"height": "auto"};
        $("#box-article img").addClass("img-responsive");
        $("#box-article img").css(style);
    });
</script>
<?php
$title = "นโยบายความเป็นส่วนตัว";

?>
<br/><br/><br/>
<div class="container">
    <br/>
    <h1 class="font-supermarket"><?php echo $title ?></h1>
    
    <div id="box-article">
        <?php echo $about['about'] ?>
    </div>
</div>
