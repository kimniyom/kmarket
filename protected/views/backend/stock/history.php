
<table class="table">
    <thead>
        <tr>
            <th style=" text-align: center;">#</th>
            <th>วันที่</th>
            <th>จำนวนนำเข้า</th>
            <th>คงเหลือ</th>
            <th>หมดอายุ</th>
            <th>ล๊อตที่</th>
            <th>ลบ</th>
            <th>นำออก</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($history as $rs): $i++
            ?>
            <tr>
                <td style=" text-align: center;"><?php echo $i ?></td>
                <td><?php echo $rs['date_input'] ?></td>
                <td style=" text-align: center; color: red; font-weight: bold;"><?php echo $rs['inputnumber'] ?></td>
                <td style="text-align: center; color: green; font-weight: bold;"><?php echo $rs['total'] ?></td>
                <td><?php echo $rs['date_expire'] ?></td>
                <th><?php echo $rs['lotnumber'] ?></th>
                <?php if ($rs['inputnumber'] == $rs['total']) { ?>
                    <td style="text-align: center;">
                        <a href="javascript:deletestock('<?php echo $rs['id'] ?>')" class="btn btn-danger"><i class='fa fa-trash'></i></a></td>
                <?php } else { ?>
                    <td style="text-align: center;">-</td>
                <?php } ?>
                <td>
                    <button type="button" class="btn btn-warning" onclick="popupCotstock(<?php echo $rs['total'] ?>,<?php echo $rs['id'] ?>)"><i class="fa fa-sign-out"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Cut stock -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="popupCotstock">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">นำสินค้าออก</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="stockid" />
                คงเหลือ
                <input type="text" id="totalstore" class="form-control" readonly="readonly"/>
                จำนวนที่นำออก
                <input type="text" id="cutstock" class="form-control" onKeyUp="if (this.value * 1 != this.value)
                            this.value = '';"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateStock()">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deletestock(id) {
        var r = confirm("Are you sure");
        if (r == true) {
            var url = "<?php echo Yii::app()->createUrl('backend/stock/deletestock') ?>";
            var data = {id: id};
            $.post(url, data, function(res) {
                loadHisyory();
                getDetailProduct();
            });
        }
    }
    function popupCotstock(total, id) {
        $("#totalstore").val(total);
        $("#stockid").val(id);
        $("#popupCotstock").modal();
    }

    function updateStock() {
        var total = parseInt($("#totalstore").val());
        var cutstock = parseInt($("#cutstock").val());
        if ($("#cutstock").val() == "") {
            alert("จำนวนที่นำออก ห้ามว่าง");
            return false;
        }

        if (cutstock <= 0) {
            alert("จำนวนที่นำออกต้องไม่เท่ากับ 0");
            return false;
        }

        if (cutstock > total) {
            alert("จำนวนที่นำออกมากกว่าจำนวนคงเหลือ");
            return false;
        }

        var url = "<?php echo Yii::app()->createUrl('backend/stock/updatestock') ?>";
        var id = $("#stockid").val();
        var data = {
            id: id,
            total: total,
            cutstock: cutstock
        };
        $.post(url, data, function(res) {
            $('.modal-backdrop').remove();
            //$("#popupCotstock").modal('hidden');
            //$("#popupCotstock").hide();
            loadHisyory();
            getDetailProduct();
        });
    }
</script>