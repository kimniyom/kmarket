<br/><br/><br/>
<div class="container font-supermarket"  id="address-user">
    <a href="<?php echo Yii::app()->createUrl('site/setting') ?>">
        <button type="button" class="btn btn-default" style="text-align: left;"><span class="lnr lnr-chevron-left"></span> กลับ</button></a><br/><br/>
    <label>New Password</label>
    <input type="password" class="form-control" id="password" name="password"/>
    <hr/>
    <button type="button" class="btn btn-warning" onclick="resetpassword()">Reset Password</button>
</div>

<script type="text/javascript">
    function resetpassword() {
        var password = $("#password").val();
        if (password == "") {
            $("#password").focus();
            return false;
        }

        var url = "<?php echo Yii::app()->createUrl('frontend/user/savepassword') ?>";
        var data = {password: password};
        $.post(url, data, function(res) {
            window.location = "<?php echo Yii::app()->createUrl('frontend/user/logout') ?>";
        });
    }
</script>
