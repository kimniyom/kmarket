<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/css/bootstrap.css" type="text/css" media="all" />

        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>
        <?php
        $web = new Configweb_model();
        ?>
    </head>
    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-md-6 col-lg-4">
                    <div class="row">
                                    <div class="col-md-12 col-lg-12">
                    <br/><br/>
                     <a href="<?php echo Yii::app()->createUrl('site/index') ?>">
        <button type="button" class="btn" style="text-align: left; border: none; background: none;"><span class="fa fa-chevron-left"></span> กลับ</button></a><br/><br/>
    </div>
</div>
                    <div style=" text-align: center; margin-top: 10%; margin-bottom: 20px;">
                        <img  src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" alt="" style="max-height: 52px;"/>
                    </div>
                    <div class="panel panel-default" style=" border:none;">
                        <?php
                        /* @var $this SiteController */
                        /* @var $model LoginForm */
                        /* @var $form CActiveForm  */

                        $this->pageTitle = Yii::app()->name . ' - Login';
                        $this->breadcrumbs = array(
                            'Login',
                        );
                        ?>


                        <div class="panel-body">
                            <div class="form">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'login-form',
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                        'validateOnSubmit' => true,
                                    ),
                                ));
                                ?>

                                <p class="note" style=" text-align: center;">Fields with <span class="required">*</span> are required.</p>

                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <?php echo $form->labelEx($model, 'username'); ?>
                                        <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'username'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <?php echo $form->labelEx($model, 'password'); ?>
                                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'password'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <hr/>
                                        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-warning btn-block btn-lg')); ?>
                                    </div>
                                </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- form -->
                        </div>
                    </div>
                    <div style=" text-align: center;">
                        <p style="font-size: 12px; color:red;">
                            *ท่านจำเป็นต้องลงทะเบียนเข้าใช้งาน Application ก่อนกดปุ่ม <em>"ลงทะเบียน"</em> ให้ท่านอ่านนโยบายความเป็นวส่วนตัวให้ละเอียด
                            
                        </p>
                        
                    </div>
                    <div style="text-align: center;">
                        <a href="<?php echo Yii::app()->createUrl('site/privacypolicy') ?>" style="text-decoration: none;"><i class="fa fa-eye"></i> อ่านนโยบายความเป็นส่วนตัว</a><br/><br/>
                    <a href="<?php echo Yii::app()->createUrl('site/register') ?>" class="btn btn-info">
                            <i class="fa fa-plus"></i> ลงทะเบียน</a></div>
                </div>
                <div class="col-md-3 col-lg-4"></div>
            </div>
        </div>
    </body>
</html>
