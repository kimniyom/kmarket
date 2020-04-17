<script>
    $(document).ready(function () {
        $(".breadcrumb").hide();
    });
</script>

<?php $config = new Configweb_model(); ?>

<h4 style=" margin-top: 20px;"><i class="fa fa-dashboard"></i> DashBoard</h4>
<hr/>
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="panel panel-default" style=" padding-left: 1px;">
            <div class="panel-body text-success" style=" text-align: center;">
                <h3><?php echo $countOederAll ?></h3>
                <h4>ยอดการสั่งซื้อ / ครั้ง</h4>
            </div>
            <div class="panel-footer" style=" text-align: center;">
                ยอดสั่งซื้อ
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="panel panel-default" style=" padding-left: 1px;">
            <div class="panel-body text-success" style=" text-align: center;">
                <h3><?php echo $buyMaxcategory['total'] ?></h3>
                <h4><?php echo $buyMaxcategory['categoryname'] ?></h4>
            </div>
            <div class="panel-footer" style=" text-align: center;">
                หมวดที่มีการซื้อมากสุด
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="panel panel-default" style=" padding-left: 1px;">
            <div class="panel-body text-warning" style=" text-align: center;">
                <h3><?php echo $buyMaxproduct['total'] ?></h3>
                <h4><?php echo $buyMaxproduct['productname'] ?></h4>
            </div>
            <div class="panel-footer" style=" text-align: center;">
                สินค้าที่มีการซื้อมากสุด
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div id="viewcategory"></div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div id="containers"></div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function () {
        Highcharts.chart('containers', {

            title: {
                text: 'จำนวนสั่งซื้อในแต่ละเดือน'
            },


            subtitle: {
                text: 'จำนวนครั้ง'
            },

            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: 'จำนวนการสั่งซื้อ'
                }
            },
            xAxis: {
                categories: [<?php echo $category ?>]
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
                    color: 'red',
                    name: ['จำนวน'],
                    data: [<?php echo $val ?>]
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

        Highcharts.chart('viewcategory', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'การขาย<br>สินค้า<br/>แต่ละหมวด',
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            tooltip: {
                //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                pointFormat: '{series.name}: <b>{point.y} ครั้ง</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                    type: 'pie',
                    name: 'จำนวนการดู',
                    innerSize: '50%',
                    data: [<?php echo $viewcategory ?>]
                }]
        });
    });

</script>