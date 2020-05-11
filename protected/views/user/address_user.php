<style>
    #address-user{
        font-size: 14px;
    }
</style>
<script type="text/javascript">


    /*
     function edit_address() {
     $("#show_address").html("<center><i class=\"fa fa-spinner fa-spin\"></i></center>");
     var url = "<?php // echo Yii::app()->createUrl('frontend/user/get_address')      ?>";
     var id = "<?php //echo Yii::app()->user->id      ?>";
     var data = {id: id};
     $.post(url, data, function(result) {
     $("#show_address").html(result);
     $("#edit_address").modal();
     });

     }
     */

</script>
<br/><br/><br/>

<div class="container font-supermarket"  id="address-user">
    <a href="<?php echo Yii::app()->createUrl('site/setting') ?>">
        <button type="button" class="btn btn-default" style="text-align: left;"><span class="lnr lnr-chevron-left"></span> กลับ</button></a><br/><br/>

    <div class="well" style=" background: #FFF;" id="address-view">
        <?php
        if ($checkaddress > 0) {
            $textSave = "แก้ไขที่อยู่";
            ?>
            <label>
                คุณ <?php echo $address['name'] . ' ' . $address['lname'] ?>
            </label>
            <br/>
            <label>ที่อยู่</label> <?php echo $address['address'] ?><br/>
            <label>ตำบล</label>  <?php echo $address['tambon_name'] ?><br/>
            <label>อำเภอ</label>  <?php echo $address['ampur_name'] ?><br/>
            <label>จังหวัด</label>  <?php echo $address['changwat_name'] ?><br/>
            <label>รหัสไปรษณีย์</label>  <?php echo $address['zipcode'] ?>
            <br/>
            <label>Tel </label> <?php echo $address['tel'] ?><br/>
            <label>Email </label> <?php echo $address['email'] ?>
            <?php
        } else {
            $textSave = "เพิ่มที่อยู่";
            ?>
            <center><i class="fa fa-info"></i> ยังไม่กำหนด</center>
        <?php } ?>
    </div>

    <div class="list-group">
        <a  class="list-group-item" href="<?php echo Yii::app()->createUrl('frontend/user/get_address', array("id" => Yii::app()->user->id)) ?>" style=" text-align: center; color: #cc3300; font-weight: bold;"> <i class=" glyphicon glyphicon-edit"></i> <?php echo $textSave ?></a>
    </div>

</div>

<!-- Modal -->
<!--
<div class="modal fade" id="edit_address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document" style=" border-radius: 0px;">
        <div class="modal-content" style=" border-radius: 0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-supermarket" id="myModalLabel" style=" font-weight: bold;"><i class="fa fa-home"></i> ที่อยู่จัดส่ง</h4>
            </div>
            <div class="modal-body">
                <div id="show_address" class=" font-supermarket" style=" font-size: 14px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block font-supermarket" style=" font-size: 16px;" onclick="save_address()"><i class="fa fa-save"></i> บันทึกที่อยู่</button>
            </div>
        </div>
    </div>
</div>
-->
