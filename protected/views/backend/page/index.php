<style>
    .well{
        background: #FFFFFF;
    }
</style>
<?php
/* @var $this MasuserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Page',
);
?>
<h4>จัดการข้อมูลหน้าเว็บ</h4>
*ต้องการเปลี่ยน คลิกที่รูปหรือกล่องบทความ
<div class="row">
    <div class="col-md-6 col-lg-6">
        <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 1, "seq" => 1)) ?>">
            <?php
            $sql1 = "select * from page where type = 1 and seq = 1";
            $rs1 = Yii::app()->db->createCommand($sql1)->queryRow();
            if (!$rs1['id']) {
                ?>
                <div class="well" style=" height: 360px; border: #999999 dashed 3px;">
                    <center>
                        <h4 style=" margin-top: 30%;">
                            <i class="fa fa-plus"></i> เพิ่ม
                        </h4>
                    </center>
                </div>
            <?php } else { ?>
                <div class="well" style=" height: 360px;">
                    <?php
                    $sqlA1 = "select * from article where id = '" . $rs1['code'] . "'";
                    $rsA1 = Yii::app()->db->createCommand($sqlA1)->queryRow();
                    ?>
                    <div style=" height: 300px; overflow: hidden">
                        <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/600-<?php echo $rsA1['images'] ?>" alt="Image" class="img img-responsive"/>
                    </div>
                    <?php echo $rsA1['title']; ?>
                </div>
            <?php } ?>
        </a>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 1, "seq" => 2)) ?>">
                    <?php
                    $sql2 = "select * from page where type = 1 and seq = 2";
                    $rs2 = Yii::app()->db->createCommand($sql2)->queryRow();
                    if (!$rs2['id']) {
                        ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px;border: #999999 dashed 3px;">
                            <center>
                                <h4 style=" margin-top: 20px;">
                                    <i class="fa fa-plus"></i> เพิ่ม
                                </h4>
                            </center>
                        </div>
                    <?php } else { ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px; padding: 0px;">
                            <?php
                            $sqlA2 = "select * from article where id = '" . $rs2['code'] . "'";
                            $rsA2 = Yii::app()->db->createCommand($sqlA2)->queryRow();
                            ?>
                            <div style=" height: 98px; overflow: hidden; float: left; width: 100px; position: relative; background: #000000;">
                                <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/200-<?php echo $rsA2['images'] ?>" alt="Image" class="img img-responsive" style=" height: 100px;"/>
                            </div>
                            <div style=" height: 98px; overflow: hidden; float: left; margin-left: 20px; width: 70%; padding: 10px;">
                                <?php echo $rsA2['title']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 1, "seq" => 3)) ?>">
                    <?php
                    $sql3 = "select * from page where type = 1 and seq = 3";
                    $rs3 = Yii::app()->db->createCommand($sql3)->queryRow();
                    if (!$rs3['id']) {
                        ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px;border: #999999 dashed 3px;">
                            <center>
                                <h4 style=" margin-top: 20px;">
                                    <i class="fa fa-plus"></i> เพิ่ม
                                </h4>
                            </center>
                        </div>
                    <?php } else { ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px; padding: 0px;">
                            <?php
                            $sqlA3 = "select * from article where id = '" . $rs3['code'] . "'";
                            $rsA3 = Yii::app()->db->createCommand($sqlA3)->queryRow();
                            ?>
                            <div style=" height: 98px; overflow: hidden; float: right; width: 100px; position: relative;">
                                <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/200-<?php echo $rsA3['images'] ?>" alt="Image" class="img img-responsive" style=" height: 100px;"/>
                            </div>
                            <div style=" height: 98px; overflow: hidden; float: left; margin-right: 20px; width: 70%; padding: 10px;">
                                <?php echo $rsA3['title']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 1, "seq" => 4)) ?>">
                    <?php
                    $sql4 = "select * from page where type = 1 and seq = 4";
                    $rs4 = Yii::app()->db->createCommand($sql4)->queryRow();
                    if (!$rs4['id']) {
                        ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px;border: #999999 dashed 3px;">
                            <center>
                                <h4 style=" margin-top: 20px;">
                                    <i class="fa fa-plus"></i> เพิ่ม
                                </h4>
                            </center>
                        </div>
                    <?php } else { ?>
                        <div class="well" style=" height: 100px; margin-bottom: 30px; padding: 0px;">
                            <?php
                            $sqlA4 = "select * from article where id = '" . $rs4['code'] . "'";
                            $rsA4 = Yii::app()->db->createCommand($sqlA4)->queryRow();
                            ?>
                            <div style=" height: 98px; overflow: hidden; float: left; width: 100px; position: relative; background: #000000;">
                                <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/200-<?php echo $rsA4['images'] ?>" alt="Image" class="img img-responsive" style=" height: 100px;"/>
                            </div>
                            <div style=" height: 98px; overflow: hidden; float: left; margin-left: 20px; width: 70%; padding: 10px;">
                                <?php echo $rsA4['title']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-lg-8">
        <hr style=" border-bottom: slategray solid 3px;"/>
        <h4>LATEST NEWS</h4>
        <div class="row">
            <?php
            for ($i = 1; $i <= 4; $i++) {
                $sqlLastnew = "select * from page where type = '2' and seq = '$i'";
                $rsLastnew = Yii::app()->db->createCommand($sqlLastnew)->queryRow();
                if (!$rsLastnew['id']) {
                    ?>
                    <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 2, "seq" => $i)) ?>">
                        <div class="col-md-6 col-lg-6">
                            <div class="well" style=" height: 250px;border: #999999 dashed 3px;">
                                <center>
                                    <h4 style=" margin-top: 80px;">
                                        <i class="fa fa-plus"></i> เพิ่ม
                                    </h4>
                                </center>
                            </div>
                        </div></a>
                <?php } else { ?>
                    <?php
                    $sqlArticle = "select * from article where id = '" . $rsLastnew['code'] . "'";
                    $rsArticle = Yii::app()->db->createCommand($sqlArticle)->queryRow();
                    ?>
                    <a href="<?php echo Yii::app()->createUrl("backend/page/create", array("type" => 2, "seq" => $i)) ?>">
                        <div class="col-md-6 col-lg-6">
                            <div class="well" style=" height: 250px; padding: 0px;">
                                <div style=" height: 200px; overflow: hidden">
                                    <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/600-<?php echo $rsArticle['images'] ?>" alt="Image" class="img img-responsive"/>
                                </div>
                                <div style=" height: 40px; overflow: hidden; padding: 5px;">
                                    <?php echo $rsArticle['title'] ?>
                                </div>
                            </div>
                        </div></a>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <hr style=" border-bottom: slategray solid 3px;"/>
        <h4>SOCIAL</h4>
        <div class="well disabled" style=" height: 520px; background: #e1e1e1;">

        </div>
    </div>
</div>

