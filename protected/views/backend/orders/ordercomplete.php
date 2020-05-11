<?php
$Config = new Configweb_model();
?>
<style type="text/css">
    #table-listorder table tr th{
        background: #000000;
        color:#FFFFFF;
    }
</style>

<div>
    <h4>รายการที่ถูกจัดส่งแล้ว</h4>
    <br/>
    <table class="table" class="table" id="table-listorder">
        <thead>
            <tr>
                <th>#</th>
                <th>วันที่สั่งซื้อ</th>
                <th>ผู้สั่งซื้อ</th>
                <th style=" text-align: center;">โทรศัพท์</th>
                <th style=" text-align: center;">เลขพัสดุ</th>
                <th style=" text-align: center;">ขนส่ง</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($order as $rs):
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $Config->thaidate($rs['order_date']) ?></td>
                    <td><?php echo $rs['order_fullname'] ?></td>
                    <td style=" text-align: center;"><?php echo $rs['order_phone'] ?></td>
                    <td style=" text-align: center;"><?php echo ($rs['tracking']) ? $rs['tracking'] : "-"; ?></td>
                    <td style=" text-align: center;">
                        <?php if ($rs['tracking']) { ?>
                            <img src="<?php echo Yii::app()->baseUrl ?>/images/<?php echo $rs['logo'] ?>" alt="" style="height:20px;"></td>
                        <?php } else { ?>
                        ส่งโดยร้านค้า
                    <?php } ?>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
        $("#table-listorder").dataTable({
            //"sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            bLengthChange: false, // แสดงจำนวน record ที่จะแสดงในตาราง
            iDisplayLength: 100000, // กำหนดค่า default ของจำนวน record
            bFilter: true, // แสดง search box
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                        //'csvHtml5',
                        //'pdfHtml5'
            ]
                    //"sScrollY": "400px", // กำหนดความสูงของ ตาราง
        });
    })
</script>