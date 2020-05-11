<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/backend/bootstrap/css/bootstrap-paper-3.3.4.css" type="text/css" media="all" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>
        <?php
        $web = new Configweb_model();
        ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/themes/kstudio/css/main.css") ?>

        <style type="text/css">
            form{
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class=" container"><br/>
            <a href="<?php echo Yii::app()->createUrl('site/index') ?>">
                <button type="button" class="btn" style="text-align: left; border: none; background: none;"><span class="fa fa-chevron-left"></span> กลับ</button></a><br/>
            <div class="form font-supermarket">
                <h3 class="font-supermarket" style=" text-align: center; color: orange;">ลงทะเบียน</h3>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'masuser-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>

                <p class="note" style=" text-align: center;">เครื่องหมาย <span class="required">*</span> ห้ามว่าง.</p>
                <?php //echo $form->errorSummary($model); ?>
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <?php echo $form->labelEx($model, 'name'); ?>
                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <?php echo $form->labelEx($model, 'lname'); ?>
                        <?php echo $form->textField($model, 'lname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'lname'); ?>
                    </div>
                </div>
                <!--
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                <?php //echo $form->labelEx($model, 'alias'); ?>
                <?php //echo $form->textField($model, 'alias', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php //echo $form->error($model, 'alias'); ?>
                            </div>
                        </div>
                -->
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <?php echo $form->labelEx($model, 'tel'); ?>
                        <?php echo $form->textField($model, 'tel', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'tel'); ?>
                    </div>
                </div>
                <br/>
                <b>เข้าใช้งานระบบ</b>
                <hr style=" margin-bottom: 5px; margin-top: 5px;"/>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <?php echo $form->labelEx($model, 'username'); ?>
                        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'password'); ?>
                    </div>
                </div>

                <br/>
                <a href="<?php echo Yii::app()->createUrl('site/privacypolicy') ?>">อ่านนโยบายความเป็นส่วนตัว</a><br/>
                <input type="checkbox" id="accept" name="accept"> ข้าพเจ้าตกลงยอมรับนโยบายความเป็นส่วนตัว
                <hr/>
                <div class="row" id="btn-save">
                    <div class="col-md-4 col-lg-4">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'ลงทะเบียน' : 'Save', array('class' => 'btn btn-warning btn-lg btn-block')); ?>
                    </div>
                </div>
                <div class="row" id="btn-save-hide">
                    <div class="col-md-4 col-lg-4">
                        <button type="button" class="btn btn-default btn-lg btn-block disabled">ลงทะเบียน</button>
                    </div>
                </div>
                <br/>
                <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div>
        <script>
            $(document).ready(function() {
                //$(".task-bar-bottom").hide();
                if ($("#accept").is(":checked")) {
                    $("#btn-save").show();
                    $("#btn-save-hide").hide();
                } else {
                    $("#btn-save-hide").show();
                    $("#btn-save").hide();
                }

                $("#accept").click(function() {
                    if ($(this).is(":checked")) {
                        $("#btn-save").show();
                        $("#btn-save-hide").hide();
                    } else {
                        $("#btn-save-hide").show();
                        $("#btn-save").hide();
                    }
                });
            })
        </script>
        <?php //$this->renderPartial('_form', array('model' => $model)); ?>
    </body>
</html>