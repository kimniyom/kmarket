<?php
/* @var $this StockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'สต๊อกสินค้า',
);
?>

<div class="panel panel-default">
    <div class="panel-heading" style=" padding-bottom: 15px; padding-right: 5px;">
        สต๊อกสินค้า  <a href="<?php echo Yii::app()->createUrl('backend/stock/create', array("type" => 1)) ?>" class="pull-right"><button type=" button" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> เพิ่มสต๊อกสินค้า</button></a>
    </div>
    <div class="panel-body">
        <table class="table table-striped" id="stock-product">
            <thead>
                <tr>
                    <th style=" text-align: center;">#</th>
                    <th>สินค้า</th>
                    <th style=" text-align: center;">หมวด</th>
                    <th style=" text-align: right;">ราคา</th>
                    <th style=" text-align: right; white-space: nowrap;">คงเหลือ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($stock as $rs): $i++
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i ?></td>
                        <td style="color: #006699;">
                            <em><b><?php echo $rs['product_id'] ?></b></em>
                            <?php echo $rs['product_name'] ?> <br/><?php echo $rs['description'] ?>
                        </td>
                        <td>
                            <span class="label label-info" style=" display: block;   padding: 10px 5px;"><?php echo $rs['categoryname'] ?></span>
                        </td>
                        <td style="text-align: right; font-weight: bold;"><?php echo ($rs['product_price_pro'] > 0) ? '<font style="text-decoration: line-through; color:red;">' . $rs['product_price'] . "</font>" . $rs['product_price_pro'] : $rs['product_price']; ?></td>
                        <td style=" text-align: right; font-weight: bold;">
                            <?php echo ($rs['total'] > 0) ? "<font style='color:green'>" . $rs['total'] . "</font>" : "<font style='color:red'>" . $rs['total'] . "</font>"; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#stock-product").dataTable({
            //"sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            bLengthChange: false, // แสดงจำนวน record ที่จะแสดงในตาราง
            iDisplayLength: 100000, // กำหนดค่า default ของจำนวน record
            bFilter: true, // แสดง search box
            dom: 'Bfrtip',
            buttons: [
                //'copyHtml5',
                'excelHtml5'
                        //'csvHtml5',
                        //'pdfHtml5'
            ]
                    //"sScrollY": "400px", // กำหนดความสูงของ ตาราง
        });
    });
</script>