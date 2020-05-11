<?php

class OrdersController extends Controller {

    public $layout = "mobile";

    public function actionAdd_cart() {
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $product_num = $_POST['num'];
        $product_price = $_POST['price'];
        $product_price_sum = $_POST['price_total'];
        $order = new Orders();
        $duplicate = $order->duplicate_product($order_id, $product_id); //เช็คว่ามีสินค้าตัวเดิมไหม
        if ($duplicate === 1) {
            //ถ้ามีตัวเดิมให้เพิ่ม เข้าไป
            $rs = $order->get_duplicate_product($order_id, $product_id);
            $id = $rs['id'];
            $product_num_new = ($rs['product_num'] + $product_num);
            $product_price_sum_new = ($rs['product_price_sum'] + $product_price_sum);
            $data = array(
                'product_num' => $product_num_new,
                'product_price' => $product_price,
                'product_price_sum' => $product_price_sum_new,
                'd_update' => date("Y-m-d H:i:s"),
            );
            Yii::app()->db->createCommand()
                    ->update("basket", $data, "id = '$id' ");
        } else {
            $data = array(
                'order_id' => $order_id,
                'product_num' => $product_num,
                'product_price' => $product_price,
                'product_price_sum' => $product_price_sum,
                'product_id' => $product_id,
                'd_update' => date("Y-m-d H:i:s"),
            );
            Yii::app()->db->createCommand()
                    ->insert("basket", $data);
        }
    }

    public function actionOrder_list() {
        $product = new Product();
        $order_id = $_GET['order_id'];
        $data['order_id'] = $order_id;
        $data['count'] = $product->_get_cart_count($order_id);
        $this->render("//orders/orders_list", $data);
    }

    public function actionOrder_list_load() {
        $order = new Orders();
        $transport = new Transport();
        $order_id = $_POST['order_id'];
        $data['transport'] = $transport->get_transport();
        $data['product'] = $order->_get_list_order($order_id);
        $data['model'] = $order;
        $data['order_id'] = $order_id;
        $this->renderPartial("//orders/orders_list_load", $data);
    }

    public function actionShow_order_short_list() {
        $order = new Orders();
        $product = new Product();
        $order_id = $_POST['order_id'];
        $data['count'] = $product->_get_cart_count($order_id);
        $data['product'] = $order->_get_list_order($order_id);

        $this->renderPartial("//orders/orders_shout_list", $data);
    }

    public function actionEdit_num_order() {
        $id = $_POST['id'];
        $num = $_POST['new_num'];
        $product_price_total = $_POST['price_total'];
        $data = array(
            "product_num" => $num,
            "product_price_sum" => $product_price_total
        );
        Yii::app()->db->createCommand()
                ->update("basket", $data, "id = '$id' ");
    }

    public function actionDel_list_order() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("basket", "id = '$id' ");
    }

    public function actionLoad_box_cart() {
        $order_id = $_POST['order_id'];
        $product_model = new Product();
        $data['result'] = $product_model->_get_cart_sum($order_id);
        $data['count'] = $product_model->_get_cart_count($order_id);

        $this->renderPartial('//orders/box_cart', $data);
    }

    public function actionLoad_inbox_cart() {
        $order_id = $_POST['order_id'];
        $product = new Product();
        $count = $product->_get_cart_count($order_id);
        if (isset($count)) {
            echo $count;
        } else {
            echo "0";
        }
    }

    public function actionPayments() {
        $order_id = $_GET['order_id'];
        $product = new Product();
        $count = $product->_get_cart_count($order_id);

        if ($count > 0) {
            $pid = Yii::app()->session['pid'];
            $order = new Orders();
            $user = new User();

            //CheckOut Order
            $columns = array("active" => '1');
            Yii::app()->db->createCommand()
                    ->update("orders", $columns, "order_id = '$order_id' ");

            //News Order
            $max_order_id = $order->Get_status_last_order($pid);
            Yii::app()->session['order_id'] = $max_order_id;

            $payment = new Payment();
            $data['product'] = $order->_get_list_order($order_id);
            $data['address'] = $user->Get_address($pid);
            $data['payment'] = $payment->Get_patment();
            $data['transport'] = $order->get_price_transport($order_id);
            $this->render("//orders/payments", $data);
        } else {
            $this->render("//orders/basket_null");
        }
    }

    //รายการสั่งซื้อรอการชำระเงิน
    public function actionInformpayment() {
        $pid = Yii::app()->session['pid'];
        $order = new Orders();
        $data['order'] = $order->get_order_payable($pid);

        $this->render("//orders/informpayment", $data);
    }

    public function actionConfieminformpayment() {
        $data['order_id'] = $_GET['order_id'];
        $payment = new Payment();
        $data['bank'] = $payment->Get_patment();

        $this->render("//orders/confieminformpayment", $data);
    }

    //ยืนยันการชำระเงิน
    public function actionSave_payment() {
        $order_id = $_POST['order_id'];
        $columns = array(
            "payment_id" => $_POST['payment_id'],
            "money" => $_POST['money'],
            "date_payment" => $_POST['date_payment'],
            "time_payment" => $_POST['time_payment'],
            "message" => $_POST['message_order'],
            "active" => '2'//อัพเดทสถานะเป็นรอตรวจสอบ
        );

        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }

    public function actionUploadslip() {
        $order_id = $_GET['order_id'];
        $targetFolder = Yii::app()->baseUrl . '/uploads/slip'; // Relative to the root

        $sqlCkeck = "SELECT slip FROM orders WHERE order_id = '$order_id' ";
        $rs = Yii::app()->db->createCommand($sqlCkeck)->queryRow();
        $filename = $targetFolder . '/' . $rs['slip'];

        if (file_exists($filename)) {
            unlink($filename);
        }

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            $fileTypes = array('jpg', 'jpeg', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //สั่งอัพเดท
                $columns = array(
                    "slip" => $FileName
                );

                Yii::app()->db->createCommand()
                        ->update("orders", $columns, "order_id = '$order_id' ");
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    //รายการรอการตรวจสอบ
    public function actionVerify() {
        $id = Yii::app()->user->id;
        $order = new Orders();
        $data['order'] = $order->get_order_verify($id);
        $this->render('//orders/verify', $data);
    }

    //ดึงสินค้าในการสั่งซื้อในรายการนั้น ๆ
    public function actionGet_list_basket() {
        $order_id = $_POST['order_id'];
        $order = new Orders();
        $data['transport'] = $order->get_transport_in_order($order_id);
        $data['basket'] = $order->_get_list_order($order_id);

        $this->renderPartial('//orders/basket', $data);
    }

    //รายการสั่งซื้อที่รอการจัดส่ง
    public function actionWaitsend() {
        $pid = Yii::app()->session['pid'];
        $order = new Orders();
        $data['order'] = $order->get_order_wait_send($pid);
        $data['model'] = $order;
        $this->render('//orders/wait_send', $data);
    }

    //รายการสั่งซื้อที่จัดส่งแล้ว
    public function actionSend() {
        $pid = Yii::app()->session['pid'];
        $order = new Orders();
        $data['order'] = $order->get_send($pid);

        $this->render('//orders/send', $data);
    }

    public function actionSet_active_transport() {
        $order_id = $_POST['order_id'];
        $transport = $_POST['id'];
        $columns = array("transport" => $transport);
        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }

    public function actionAdd() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();
        $itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
        //echo $itemId;
        //exit();
        if ($_POST) {
            for ($i = 0; $i < count($_POST['qty']); $i++) {
                $key = $_POST['arr_key_' . $i];
                $_SESSION['qty'][$key] = $_POST['qty'][$i];

                $this->redirect(array('frontend/orders/cart'));
            }
        } else {

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
                $_SESSION['qty'][] = array();
            }


            if (in_array($itemId, $_SESSION['cart'])) {
                $key = array_search($itemId, $_SESSION['cart']);
                $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
                //$this->redirect(array('site/index'));
                $this->redirect(array('frontend/orders/cart'));
            } else {
                array_push($_SESSION['cart'], $itemId);
                $key = array_search($itemId, $_SESSION['cart']);
                $_SESSION['qty'][$key] = 1;
                //$this->redirect(array('site/index'));
                $this->redirect(array('frontend/orders/cart'));
            }
        }
    }

    public function actionCart() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();

        $Model = new Configweb_model();
        $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

        if (isset($_SESSION['cart']) && $itemCount > 0) {
            $itemIds = array();
            foreach ($_SESSION['cart'] as $itemId) {
                $itemIds[] = "'" . $itemId . "'";
            }
            $inputItems = implode(",", $itemIds);
            $meSql = "SELECT * FROM product WHERE product_id in ($inputItems)";
            $meQuery = Yii::app()->db->createCommand($meSql)->queryAll();
            $data['meCount'] = count($meQuery);
            $data['orders'] = $meQuery;
        } else {
            $data['meCount'] = 0;
        }
        $data['limit'] = $Model->Limitdistance();
        $data['overtranport'] = $Model->Overtransport();
        $this->render("//orders/orderlist", $data);
    }

    public function actionUpdatecart() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();
        $itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
        if ($_POST) {
            for ($i = 0; $i < count($_POST['qty']); $i++) {
                $key = $_POST['arr_key_' . $i];
                $_SESSION['qty'][$key] = $_POST['qty'][$i];
                //$this->redirect(array("frontend/orders/cart"));
            }

            $this->redirect(array("frontend/orders/cart"));
        } else {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
                $_SESSION['qty'][] = array();
            }

            if (in_array($itemId, $_SESSION['cart'])) {
                $key = array_search($itemId, $_SESSION['cart']);
                $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
                header('location:index.php?a=exists');
            } else {
                array_push($_SESSION['cart'], $itemId);
                $key = array_search($itemId, $_SESSION['cart']);
                $_SESSION['qty'][$key] = 1;
                header('location:index.php?a=add');
            }
        }
    }

    public function actionRemovecart() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();

        $itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['qty'][] = array();
        }

        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = "";

        $_SESSION['cart'] = array_diff($_SESSION['cart'], array($itemId));
        $this->redirect(array("frontend/orders/cart"));
    }

    public function actionOrder($transportprice = 0) {
        $userModel = new User();
        $id = Yii::app()->user->id;

        if ($id) {
            error_reporting(E_ALL ^ E_NOTICE);
            session_start();

            $action = isset($_GET['a']) ? $_GET['a'] : "";
            $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
            $_SESSION['formid'] = sha1('kimniyom' . microtime());
            if (isset($_SESSION['qty'])) {
                $meQty = 0;
                foreach ($_SESSION['qty'] as $meItem) {
                    $meQty = (int) $meQty + (int) $meItem;
                }
            } else {
                $meQty = 0;
            }
            if (isset($_SESSION['cart']) && $itemCount > 0) {
                $itemIds = array();
                foreach ($_SESSION['cart'] as $itemId) {
                    $itemIds[] = "'" . $itemId . "'";
                }
                $inputItems = implode(",", $itemIds);
                $meSql = "SELECT * FROM product WHERE product_id in ($inputItems)";
                $meQuery = Yii::app()->db->createCommand($meSql)->queryAll();
                $data['meCount'] = count($meQuery);
                $data['orders'] = $meQuery;
            } else {
                $data['meCount'] = 0;
            }

            $howtoorder = new Howtoorder();
            $payment = new Payment();
            //$data['bank'] = $payment->Get_bank();
            $data['payment'] = $payment->Get_patment();
            //$data['howtoorder'] = $howtoorder->Get_howto();
            $data['address'] = $userModel->Get_address($id);
            $data['checkaddress'] = $userModel->Check_address($id);
            $data['profile'] = $this->getProfile($id);
            $data['transportprice'] = $transportprice;
            $this->render("//orders/order", $data);
        } else {
            $this->redirect(array("site/login"));
        }
    }

    function LinrNotifyOrder($message) {
        //$message = "test";
        //$token = "tTB2872QNBu50i3FXUWsN1IKEZgqVHU9QdV0zLNTbst";
        $token = "HzFHfXOBdjUcmPwepKTGYImc7kATO8HbpuL7BYQJxMu";
        //echo send_line_notify($message, $token);
        //function send_line_notify($message, $token) {
        if ($message == "")
            return; //ถ้าข้อความแจ้งเตือนเป็นค่าว่าง ไม่มีการแจ้งเตือนในไลน์
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array("Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token",);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
        //}
    }

    public function actionUpdateorder() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();
        $formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
        //echo $formid." = ".$_POST['formid'];
        //exit();
        if ($formid != $_POST['formid']) {
            $this->redirect(array("frontend/orders/orderfail/status/1"));
        } else {
            unset($_SESSION['formid']);
            if ($_POST) {
                //require 'connect.php';
                $order_fullname = Yii::app()->request->getPost('order_fullname');
                $order_address = Yii::app()->request->getPost('order_address');
                $order_phone = Yii::app()->request->getPost('order_phone');
                $order_email = Yii::app()->request->getPost('order_email');
                $typepayment = Yii::app()->request->getPost('typepayment');
                $transportprice = Yii::app()->request->getPost('transportprice');
                $user = Yii::app()->user->id;
                $columns = array(
                    "order_date" => date("Y-m-d H:i:s"),
                    "order_fullname" => $order_fullname,
                    "order_address" => $order_address,
                    "order_phone" => $order_phone,
                    "order_email" => $order_email,
                    "user" => $user,
                    "slip" => $typepayment,
                    "transportprice" => $transportprice,
                    "order_confirm" => 1
                );

                $meQeury = Yii::app()->db->createCommand()
                        ->insert("orders", $columns);
                if ($meQeury) {
                    $order_id = Yii::app()->db->getLastInsertID();
                    for ($i = 0; $i < count($_POST['qty']); $i++) {
                        $order_detail_quantity = Yii::app()->request->getPost('qty')[$i];
                        $order_detail_price = Yii::app()->request->getPost('product_price')[$i];
                        $product_id = Yii::app()->request->getPost('product_id')[$i];
                        $lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) ";
                        $lineSql .= "VALUES (";
                        $lineSql .= "'{$order_detail_quantity}',";
                        $lineSql .= "'{$order_detail_price}',";
                        $lineSql .= "'{$product_id}',";
                        $lineSql .= "'{$order_id}'";
                        $lineSql .= ") ";
                        Yii::app()->db->createCommand($lineSql)->query();
                    }
                    //mysql_close();
                    unset($_SESSION['cart']);
                    unset($_SESSION['qty']);

                    //UploadSlip
                    if ($typepayment == 1) {
                        if (!empty($_FILES)) {
                            $targetFolder = Yii::app()->baseUrl . '/uploads/slip'; // Relative to the root
                            $tempFile = $_FILES['slip']['tmp_name'];
                            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
                            $FileName = time() . $_FILES['slip']['name'];
                            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

                            $fileTypes = array('jpg', 'jpeg', 'png'); // File extensions
                            $fileParts = pathinfo($_FILES['slip']['name']);

                            if (in_array($fileParts['extension'], $fileTypes)) {
                                move_uploaded_file($tempFile, $targetFile);

                                //สั่งอัพเดท

                                $columns = array(
                                    "slip" => $FileName
                                );

                                Yii::app()->db->createCommand()
                                        ->update("orders", $columns, "id = '$order_id' ");
                                echo '1';
                            } else {
                                echo 'Invalid file type.';
                            }

                            //SetLog
                            $columnsLog = array(
                                "log" => "user ID " . Yii::app()->user->id . " CheckOut " . $order_id,
                                "order_id" => $order_id,
                                "status" => "1",
                                "user" => Yii::app()->user->id,
                                "date" => date("Y-m-d H:i:s")
                            );

                            Yii::app()->db->createCommand()
                                    ->insert("logorders", $columnsLog);

                            $message = "";
                            $message .= date("Y-m-d H:i:s");
                            $message .= " คุณ " . $order_fullname . " สั่งซื้อสินค้าผ่าน App";
                            $this->LinrNotifyOrder($message);
                        }
                    } else {
                        //SetLog
                        $columnsLog = array(
                            "log" => "user ID " . Yii::app()->user->id . " CheckOut " . $order_id,
                            "order_id" => $order_id,
                            "status" => "1",
                            "user" => Yii::app()->user->id,
                            "date" => date("Y-m-d H:i:s")
                        );

                        Yii::app()->db->createCommand()
                                ->insert("logorders", $columnsLog);

                        $message = "";
                        $message .= date("Y-m-d H:i:s");
                        $message .= " คุณ " . $order_fullname . " สั่งซื้อสินค้าผ่าน App";
                        $this->LinrNotifyOrder($message);
                    }

                    $this->redirect(array("frontend/orders/verify"));
                } else {
                    $this->redirect(array("frontend/orders/orderfail/status/2"));
                }
            }
        }
    }

    public function actionOrdersuccess() {
        $howtoorder = new Howtoorder();
        $payment = new Payment();
        //$data['bank'] = $payment->Get_bank();
        $data['payment'] = $payment->Get_patment();
        $data['popup'] = Yii::app()->db->createCommand("select * from popupalert limit 1")->queryRow();
        //$data['howtoorder'] = $howtoorder->Get_howto();
        $this->render('//orders/success', $data);
    }

    public function actionOrderfail($status) {
        if ($status == "1") {
            $errors = "SESSION หมดอายุ ... กรุณาทำรายการสั่งซื้อใหม่";
        } else {
            $errors = "เกิดข้อผิดพลาดในการสั่งซื้อ กรุณาทำรายการสั่งซื้อใหม่";
        }

        $data['error'] = $errors;
        $this->render('//orders/fail', $data);
    }

    public function actionMenuuser() {
        $id = Yii::app()->user->id;
        if ($id) {
            $data['profile'] = $this->getProfile($id);
            $this->render('//orders/menuuser', $data);
        } else {
            $this->redirect(array("site/login"));
        }
    }

    function getProfile($id) {
        $rs = Yii::app()->db->createCommand()
                ->select('*')
                ->from('masuser')
                ->where("id=:id", array(":id" => $id))
                ->queryRow();

        return $rs;
    }

    public function actionVieworder($id, $return) {
        $Model = new Orders();
        $data['detail'] = $Model->GetDetailOrder($id);
        $query = "select o.*,p.product_name
                        from order_details o INNER JOIN product p ON o.product_id = p.product_id
                        where order_id = '$id'";
        $data['order'] = Yii::app()->db->createCommand($query)->queryAll();
        $data['return'] = $return;
        $this->render('//orders/vieworder', $data);
    }

    public function actionShipping() {
        $id = Yii::app()->user->id;
        $order = new Orders();
        $data['order'] = $order->get_order_wait_send($id);
        $this->render('//orders/shipping', $data);
    }

    public function actionOrdercomplete() {
        $id = Yii::app()->user->id;
        $order = new Orders();
        $data['order'] = $order->get_order_complate($id);
        $this->render('//orders/complete', $data);
    }

    public function actionOrderall() {
        $id = Yii::app()->user->id;
        $order = new Orders();
        $data['order'] = $order->get_order_all($id);
        $this->render('//orders/complete', $data);
    }

    public function actionGetlocation() {
        $latitudeTo = Yii::app()->request->getPost('lat');
        $longitudeTo = Yii::app()->request->getPost('lng');
        $val = $this->getDistance($latitudeTo, $longitudeTo, "K");
        echo $val;
    }

    function getDistance($lat, $lng, $unit = "") {
        // Change address format
        //$formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        //$formattedAddrTo     = str_replace(' ', '+', $addressTo);
        // Geocoding API request with start address
        //$geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=true&key='.$apiKey);
        //$outputFrom = json_decode($geocodeFrom);
        //if(!empty($outputFrom->error_message)){
        //return $outputFrom->error_message;
        //}
        // Geocoding API request with end address
        //$geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=true&key='.$apiKey);
        //$outputTo = json_decode($geocodeTo);
        //if(!empty($outputTo->error_message)){
        //return $outputTo->error_message;
        //}
        // Get latitude and longitude from the geodata
        /*
          $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
          $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
          $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
          $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
         */
        //พิกัดตั้งต้น
        $latitudeFrom = "14.004015";
        $longitudeFrom = "100.548994";

        //ตำแหน่งปัจจุบัน
        $latitudeTo = $lat;
        $longitudeTo = $lng;

        // Calculate distance between latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        // Convert unit and return distance
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return round($miles * 1.609344, 2);
        } elseif ($unit == "M") {
            return round($miles * 1609.344, 2);
        } else {
            return round($miles, 2) . ' miles';
        }
    }

    public function actionCheckorder() {
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();

        $itemIds = array();
        foreach ($_SESSION['cart'] as $itemId) {
            $itemIds[] = "'" . $itemId . "'";
        }
        $inputItems = implode(",", $itemIds);
        $meSql = "SELECT * FROM product WHERE product_id in ($inputItems)";
        $meQuery = Yii::app()->db->createCommand($meSql)->queryAll();

        $orders = $meQuery;

        $logStock = 0;
        $num = 0;
        $a = 0;
        $stock_model = new Stock();
        foreach ($orders as $meResult):
            $a++;
            $stock = $stock_model->countStock($meResult['product_id']);
            $key = array_search($meResult['product_id'], $_SESSION['cart']);

            if ($stock < $_SESSION['qty'][$key]) {
                $logStock++;
            }
            $num++;
        endforeach;

        if ($logStock > 0) {
            $this->redirect(array("frontend/orders/cart"));
        } else {
            $this->redirect(array("frontend/orders/cart"));
        }
    }

    public function actionSignature() {
        $this->renderPartial("//orders/signature");
    }

}
