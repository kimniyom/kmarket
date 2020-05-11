<?php
/* @var $this BrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'dashboard',
);
?>
<?php
$yearNow = date("Y");
?>

<div class="row">
    <div class="col-md-6 col-lg-4">
        <label>ปี พ.ศ.</label>
        <select id="year" class="form-control" onchange="getPage(this.value)">
            <option value="">ทั้งหมด</option>
            <?php for ($i = $yearNow; $i >= ($yearNow - 3); $i--): ?>
                <option value="<?php echo $i ?>" <?php echo ($i == $year) ? "selected" : ""; ?>><?php echo $i + 543 ?></option>
            <?php endfor; ?>
        </select>
    </div>
</div>
<br/>
<div class="panel panel-default">
    <div class="panel-heading">ภายพรวมการขายหน้าเว็บ</div>
    <div class="panel-body">
        <div class="row text-danger">
            <div class="col-md-3 col-lg-3 col-sm-6" style=" text-align: center;">
                รายรับจากการขายหน้าเว็บ
                <hr/>
                <h4><i class="fa fa-dollar"></i> <?php echo number_format($income, 2); ?></h4>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6" style=" text-align: center;">
                สินค้ามีการสั่งซื้อมากที่สุด
                <hr/>
                <h4>
                    <?php echo $productbaseyear['product_name'] ?>
                    (<?php echo ($productbaseyear['total']) ? $productbaseyear['total'] : "-"; ?> / ชิ้น)
                </h4>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6" style=" text-align: center;">
                หมวดสั่งซื้อมากที่สุด
                <hr/>
                <h4>
                    <?php echo $maxCategory['categoryname'] ?>
                    (<?php echo ($maxCategory['total']) ? $maxCategory['total'] : "-"; ?>) / ชิ้น
                </h4>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6" style=" text-align: center;">
                จำนวน Oeders
                <hr/>
                <h4>
                    <?php echo $countOrders ?> / ครั้ง
                </h4>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="chartcountproductinyear"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getPage(year) {
        window.location = "<?php echo Yii::app()->createUrl('backend/report/dashboard') ?>" + "/year/" + year;
    }

    $(document).ready(function() {
        Highcharts.chart('chartcountproductinyear', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'จำนวนขายสินค้า'
            },

            subtitle: {
                text: 'แต่ละเดือน(ปี <?php echo ($year) ? ($year + 543) : ($yearNow + 543) ?>)'
            },

            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: 'จำนวน(ชิ้น)'
                }
            },
            xAxis: {
                categories: [<?php echo $chartcountproductinyear['cat']; ?>]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    //pointStart: 2010
                }
            },

            series: [{
                    colorByPoint: true,
                    name: ['จำนวน(ชิ้น)'],
                    data: [<?php echo $chartcountproductinyear['val']; ?>]
                }],

            responsive: {
                rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
            }

        });
    });
</script>