<?php
/* @var $this MasuserController */
/* @var $model Masuser */
/* @var $form CActiveForm */
?>
<style>
    input[type=text], select {
        box-shadow: none;
    }
</style>
<br/><br/><br/>
<div class=" container">
    <div class="form font-supermarket">
        <h3 class="font-supermarket">ลงทะเบียน</h3>
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

        <p class="note">Fields with <span class="required">*</span> are required.</p>
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
                <?php echo CHtml::submitButton($model->isNewRecord ? 'ลงทะเบียน' : 'Save', array('class' => 'btn btn-warning btn-block')); ?>
            </div>
        </div>
                <div class="row" id="btn-save-hide">
            <div class="col-md-4 col-lg-4">
                <button type="button" class="btn btn-default disabled">ลงทะเบียน</button>
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

        $("#accept").click(function () {
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
<?php
//$this->renderPartial('_form', array('model' => $model)); ?>