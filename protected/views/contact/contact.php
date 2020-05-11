
<br/><br/><br/><br/><br/><br/>
<div class="container font-supermarket" style=" text-align: center;">
    <h2 class=" font-supermarket"><i class="fa fa-phone-square"></i> ติดต่อเรา</h2>
    <div class="row" style=" font-size: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <hr/>
            <?php if($contact['picture'] != ""):?>
                                  <img src="<?php echo Yii::app()->getBaseUrl().'/uploads/contact/'.$contact['picture']?>" height="200">
                                <?php endif;?><br/>
                                <br/>
            <?php if ($social) { ?>
                <label>โซชียล</label><br/>
                <?php foreach ($social as $rs): ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/<?php echo $rs['icon'] ?>" width="36"/>
                    <?php if (substr($rs['account'], 0, 4) != 'http') { ?>
                        <?php echo $rs['social_app'] . ':' . $rs['account'] ?>
                    <?php } else { ?>
                        <a href="<?php echo $rs['account'] ?>" target="_blank">
                            <?php echo $rs['social_app'] ?>
                        </a>
                    <?php } ?>
                    <br/>
                <?php endforeach; ?>
                <br/>
            <?php } ?>
            <label>อีเมล์ :</label> <?php echo $contact['email'] ?><br/>
            <label>โทรศัพท์ :</label> <?php echo $contact['tel'] ?>
        </div>
    </div>
</div>
<div id="map" style=" height: 350px;"></div>
<script>

    function initMap() {
        var myLatLng = {lat: 14.0039660, lng: 100.5487269};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: '//www.ninenik.com/demo/google_map/images/male-2.png'
        });

        var infowindow = new google.maps.InfoWindow({
            content: "kmarket"
        });
        google.maps.event.addListener(marker, "click", function() {
            infowindow.close();
            infowindow.setContent("kmarket");
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=xxxxx&callback&sensor=false&callback=initMap" async defer></script>
<script type="text/javascript">
    function send_massage() {
        var url = "<?php echo Yii::app()->createUrl('frontend/contact/save_message') ?>";
        var pid = "<?php echo Yii::app()->session['pid'] ?>";
        var status = "<?php echo Yii::app()->session['status'] ?>";
        var message = $("#message").val();
        var data = {pid: pid, message: message, status: status};
        if (message == '') {
            $("#message").focus();
            return false;
        }

        $.post(url, data, function(success) {
            $("#message").val("");
            $("#msg_log").fadeIn(300).delay(3000).fadeOut(300);
            return false;
        });
    }
</script>
