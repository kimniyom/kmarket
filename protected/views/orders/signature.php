<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ConfirmOrders</title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/bootstrap/css/bootstrap.css" type="text/css" media="all" />
        <style>
            * {
                font-size: 16px;
                font-family: Arial;
            }
            .site-title {
                margin: 1em 0;
            }
            .center {
                text-align: center;
            }
            td {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }
            li {
                margin: 8px 0;
            }

        </style>
    </head>
    <body>
        <!-- Body Content -->
        <div class="container"><br/>
            <div class="row">
                <div class="col-xs-12">
                    <p>ลายมือชื่อผู้รับ:</p>
                    <div class="js-signature" data-width="auto" data-height="200" data-border="1px solid black" data-line-color="#bc0000" data-auto-fit="true"></div>
                    <hr>
                    <p><button id="clearBtn" class="btn btn-default" onclick="clearCanvas();">Clear</button>&nbsp;
                        <button id="saveBtn" class="btn btn-warning" onclick="saveSignature();" disabled>Save Signature</button></p>
                    <div id="signature">
                        <p><em>Your signature will appear here when you click "Save Signature"</em></p>
                    </div>
                </div>
            </div>
            <br><br>
        </div>

        <!-- Scripts -->
        <script src="<?= Yii::app()->baseUrl; ?>/js/jquery.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/lib/jq-signature/jq-signature.js"></script>

        <script>
                            $(document).on('ready', function() {
                                if ($('.js-signature').length) {
                                    $('.js-signature').jqSignature();
                                }
                            });
                            /*
                             * Demo
                             */

                            function clearCanvas() {
                                $('#signature').html('<p><em>Your signature will appear here when you click "Save Signature"</em></p>');
                                $('.js-signature').eq(0).jqSignature('clearCanvas');
                                $('#saveBtn').attr('disabled', true);
                            }

                            function saveSignature() {
                                $('#signature').empty();
                                var dataUrl = $('.js-signature').eq(0).jqSignature('getDataURL');
                                //var img = $('<img>').attr('src', dataUrl);
                                //alert(dataUrl);
                                //$('#signature').append($('<p>').text("Here's your signature:"));
                                //$('#signature').append(img);
                                var url = "<?php echo Yii::app()->createUrl('frontend/orders/userconfirm') ?>";
                                var orderId = "<?php echo $orderId ?>";
                                var data = {orderId: orderId, signature: dataUrl};
                                $.post(url, data, function(res) {
                                    if (res == "0") {
                                        window.closed;
                                    } else {
                                        alert("กรุณาทำรายการใหม่");
                                        return false;
                                    }
                                });
                            }

                            $('.js-signature').eq(0).on('jq.signature.changed', function() {
                                $('#saveBtn').attr('disabled', false);
                            });
        </script>
    </body>
</html>
