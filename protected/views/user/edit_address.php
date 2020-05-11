<script>
    $(document).ready(function() {
        chang_address("ampur", '<?php echo $address['changwat'] ?>', '<?php echo $address['ampur'] ?>');
        chang_address("tambon", '<?php echo $address['ampur'] ?>', '<?php echo $address['tambon'] ?>');
    });
</script>
<br/>
<br/>
<br/>
<div class="container font-supermarket">
    <div class="form-group" style="display: none;">
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                ชื่อ *
            </div>
            <div class="col-lg-9">
                <input type="text" id="name" name="name" class="form-control input-sm" value="<?php echo $address['name'] ?>"/>
            </div>
        </div>
    </div>

    <div class="form-group" style="display: none;">
        <div class="row">
            <div class="col-lg-3">
                นามสกุล *
            </div>
            <div class="col-lg-9">
                <input type="text" id="lname" name="lname" class="form-control input-sm" value="<?php echo $address['lname'] ?>"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3">
                ที่อยู่ *
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="address" name="address" rows="3"><?php echo $address['address'] ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3">
                จังหวัด *
            </div>
            <div class="col-lg-9">
                <select id="changwat" name="changwat" class="form-control" onchange="chang_address('ampur', this.value, '')">
                    <option value="">เลือกจังหวัด</option>
                    <?php foreach ($changwat as $ch): ?>
                        <option value="<?php echo $ch['changwat_id'] ?>"
                        <?php
                        if ($address['changwat'] == $ch['changwat_id']) {
                            echo "selected";
                        }
                        ?>><?php echo $ch['changwat_name'] ?></option>
                            <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3">
                อำเภอ *
            </div>
            <div class="col-lg-9">
                <select id="ampur" name="ampur" class="form-control" onchange="chang_address('tambon', this.value, '')">
                    <option value="">เลือกอำเภอ</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3">
                ตำบล *
            </div>
            <div class="col-lg-9">
                <select id="tambon" name="tambon" class="form-control">
                    <option value="">เลือกตำบล</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3">
                รหัสไปรษณีย์ *
            </div>
            <div class="col-lg-9">
                <input type="text" id="zipcode" name="zipcode" class="form-control" maxlength="5" value="<?php echo $address['zipcode'] ?>"/>
            </div>
        </div>
    </div>

    <hr/>
    <ul class="list-group">
        <li class="list-group-item" style=" text-align: center; color: #ff6600; font-weight: bold;" onclick="save_address()"><i class="fa fa-save"></i> บันทึกที่อยู่</li>
    </ul>
</div>
<script>
    function chang_address(type, value, active) {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/get_combobox') ?>";
        var data = {type: type, value: value, active: active};
        $.post(url, data, function(result) {
            $("#" + type).html(result);
        });
    }

    function save_address() {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/save_address') ?>";
        var address = $("#address").val();
        var changwat = $("#changwat").val();
        var ampur = $("#ampur").val();
        var tambon = $("#tambon").val();
        var zipcode = $("#zipcode").val();
        var user_id = "<?php echo Yii::app()->user->id ?>";
        if (address == '') {
            $("#address").focus();
            return false;
        }

        if (changwat == '') {
            $("#changwat").focus();
            return false;
        }

        if (ampur == '') {
            $("#ampur").focus();
            return false;
        }

        if (tambon == '') {
            $("#tambon").focus();
            return false;
        }

        if (zipcode == '') {
            $("#zipcode").focus();
            return false;
        }

        var data = {
            address: address,
            changwat: changwat,
            ampur: ampur,
            tambon: tambon,
            user_id: user_id,
            zipcode: zipcode
        };

        $.post(url,data,function(result) {
            //$("#edit_address").modal("hide");
            window.location = "<?php echo Yii::app()->createUrl('frontend/user/address') ?>" + "/id/" + user_id;
        });

    }
</script>