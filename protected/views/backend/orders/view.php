<style type="text/css">
    .panel{
        border-color: #000000;
    }

    .panel .panel-heading{
        background: #000000;
    }
</style>

<?php
//session_start();
$this->breadcrumbs = array(
    "Orders" => array('backend/orders/index'),
    $order['id']
);
?>

<a href="<?php echo Yii::app()->createUrl('backend/orders/printaddress', array("id" => $order['id'])) ?>"  target="_blank">
    <button type="button" class="btn btn-default">พิมพ์ใบสั่งซื้อ</button></a>
<br/><br/>
<div class="panel panel-primary">
    <div class="panel-heading" style=" border-radius: 0px;">ข้อมูลการสั่งซื้อ</div>
    <div class="panel-body">
        <table class="table" id="table-export">
            <thead>
                <tr>
                    <th colspan="6">
                        ผู้สั่งซื้อ <?php echo $order['order_fullname'] ?><br/>
                        ที่อยู่ <?php echo $order['order_address'] ?><br/>
                        โทรศัพท์ <?php echo $order['order_phone'] ?><br/>
                        อีเมล์ <?php echo $order['order_email'] ?><?php echo($order['slip'] == "2") ? "<font style='color:red'>(เก็บเงินปลายทาง)</font>" : "<font style='color:green'>ชำระเงินแล้ว</font>" ?>
                        <?php
                        if ($order['order_confirm'] == "1") {
                            echo "<span class='label label-warning' style=padding:5px;'><i class='fa fa-info'></i> รอยืนยัน</span>";
                        } else if ($order['order_confirm'] == "4") {
                            echo "<span class='label label-info' style='padding:5px;'><i class='fa fa-check'></i> ยืนยัน</span>";
                        } else if ($order['order_confirm'] == "3") {
                            echo "<span class='label label-danger' style='padding:5px;'><i class='fa fa-remove'></i> ยกเลิก</span>";
                        } else if ($order['order_confirm'] == "5") {
                            echo "<span class='label label-success' style='padding:5px;'><i class='fa fa-check'></i> ส่งสินค้าแล้ว</span>";
                        }
                        ?>
                    </th>
                </tr>
                <tr style=" font-size: 12px;">
                    <th style=" text-align: center;">#</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th style=" text-align: center;">จำนวน</th>
                    <th style=" text-align: right;">ราคาต่อหน่วย</th>
                    <th style=" text-align: right;">จำนวนเงิน</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $total_price = 0;
                $a = 0;
                $sumRow = 0;
                foreach ($orderList as $meResult):
                    $a++;
                    $sumRow = ($meResult['order_detail_price'] * $meResult['order_detail_quantity']);
                    $total_price = $total_price + $sumRow;
                    ?>
                    <tr>
                        <td style=" text-align: center;"><?php echo $a ?></td>
                        <td><?php echo $meResult['product_id']; ?></td>
                        <td><?php echo $meResult['product_name']; ?></td>
                        <td style="text-align: center;">
                            <?php echo $meResult['order_detail_quantity'] ?>
                        </td>
                        <td style=" text-align: right;"><?php echo number_format($meResult['order_detail_price'], 2); ?></td>
                        <td style=" text-align: right;"><?php echo number_format($sumRow, 2) ?></td>
                    </tr>
                    <?php
                endforeach;
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right;">
                        <p class=" pull-left">รวม</p>
                        <p class=" pull-right">
                            <font style="color:red;"><?php echo number_format($total_price, 2); ?></font> บาท
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style=" text-align: right;">
                        <p class="pull-left">ค่าขนส่ง</p>
                        <p class="pull-right">
                            <font style=" color: red;"><?php echo $order['transportprice']; ?></font> บาท
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style=" text-align: right; font-weight: bold;">
                        <h4 class="pull-left">จำนวนเงินรวมทั้งหมด</h4>
                        <h4 class="pull-right">
                            <font style=" color: red;"><?php echo ($total_price + $order['transportprice']); ?></font> บาท
                        </h4>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
