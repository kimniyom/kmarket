
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/bootstrap/css/bootstrap.css" type="text/css" media="all" />
        <style type="text/css">
            table thead tr th{
                padding:5px;
            }
            table tbody tr td{
                padding:5px;
            }
            table .text-right{
                padding:5px;
                text-align: right;
            }

            table tfoot tr th{
                padding:5px;
                text-align: right;
            }

            table .text-center{
                text-align: center;
            }
        </style>
        <?php
        $web = new Configweb_model();
        ?>
    </head>
    <body>
        <table class="table table-bordered" style="border: solid 1px #000000;">
            <thead>
                <tr>
                    <th colspan="5" style=" text-align: left;">
                        jehmuaymarket.com : Order_number_<?php echo $order['id'] ?><br/>
                        ผู้สั่งซื้อ <?php echo $order['order_fullname'] ?><br/>
                        ที่อยู่ <?php echo $order['order_address'] ?><br/>
                        โทรศัพท์ <?php echo $order['order_phone'] ?> อีเมล์ <?php echo $order['order_email'] ?>
                    </th>
                </tr>
                <tr style=" font-size: 12px;">
                    <th class="text-center" width="5%">#</th>
                    <th width="65%">รายการ</th>
                    <th class="text-center">จำนวน</th>
                    <th class="text-right">ราคา  /ต่อหน่วย</th>
                    <th class="text-right">รวม</th>
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
                        <td class="text-center"><?php echo $a ?></td>
                        <td>(<?php echo $meResult['product_id'] ?>) <?php echo $meResult['product_name']; ?><br/>
                            - <?php echo $meResult['description']; ?></td>
                        <td class="text-center">
                            <?php echo $meResult['order_detail_quantity'] ?>
                        </td>
                        <td class="text-right"><?php echo number_format($meResult['order_detail_price'], 2); ?></td>
                        <td class="text-right"><?php echo number_format($sumRow, 2) ?></td>
                    </tr>
                    <?php
                endforeach;
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" style="text-align: right;">
                        รวม <?php echo number_format($total_price); ?> บาท
                    </th>
                </tr>
                <tr>
                    <th colspan="5" style=" text-align: right;">
                        ค่าขนส่ง
                        <font style=" color: red;"><?php echo $order['transportprice']; ?></font> บาท
                    </th>
                </tr>
                <tr>
                    <th colspan="5" style=" text-align: right; font-weight: bold;">
                        <h4>จำนวนเงินรวมทั้งหมด
                            <font style=" color: red;"><?php echo ($total_price + $order['transportprice']); ?></font> บาท
                        </h4>
                        <div class="pull-left"><?php echo($order['slip'] == "2") ? "<font style='color:red'>(เก็บเงินปลายทาง)</font>" : "<font style='color:green'>ชำระเงินแล้ว</font>" ?></div>
                    </th>
                </tr>
            </tfoot>
        </table>

    </body>
</html>





