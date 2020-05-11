<?php
$this->breadcrumbs = array(
    'จัดเรียงประเภทสินค้า'
);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <button type="button" class="btn btn-success" onclick="save_sort_order()"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover" id="product_type">
            <thead>
                <tr>
                    <th>id</th>
                    <th>รหัส</th>
                    <th>ประเภท</th>
                    <th style=" text-align: center; width: 200px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($type as $rs): ?>
                    <tr>
                        <td><?php echo $rs['id'] ?></td>
                        <td><?php echo $rs['type_id'] ?></td>
                        <td><?php echo $rs['type_name'] ?></td>
                        <td style=" text-align: center;">
                            <button type="button" class="btn btn-default btn-sm up"><i class="fa fa-chevron-up text-success"></i> ขึ้น</button>
                            <button type="button" class="btn btn-default btn-sm down"><i class="fa fa-chevron-down text-danger"></i> ลง</button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function deleteType(id) {
        var r = confirm("Are you sure ...? สินค้าที่อยู่ในประเภทนี้จะถูกลบออกจากระบบ");
        if (r === true) {
            var url = "<?php echo Yii::app()->createUrl("backend/typeproduct/delete") ?>";
            var data = {typeId: id};

            $.post(url, data, function(success) {
                window.location.reload();
            });
        }
    }

    $(document).ready(function() {
        $(".up,.down").click(function() {
            var row = $(this).parents("tr:first");
            if ($(this).is(".up")) {
                row.insertBefore(row.prev());
            } else {
                row.insertAfter(row.next());
            }
        });
    });

    function save_sort_order() {
        var table = document.getElementById('product_type');
        var rowLength = table.rows.length;
        var a = 0;
        for (var i = 1; i < rowLength; i += 1) {
            var rows = table.rows[i];
            var level = i;
            var id = parseInt(rows.cells[0].innerText);
            console.log(id + "=>" + level);
            var url = "<?php echo Yii::app()->createUrl("backend/typeproduct/setlevel") ?>";
            var data = {
                id: id,
                level: level
            };

            $.post(url, data, function(success) {
                a = (a += 1);
                //$("#log").append(success + "<br/>");
                if (a >= (rowLength - 1)) {
                    window.location.reload();
                }
            });

        }
    }
</script>