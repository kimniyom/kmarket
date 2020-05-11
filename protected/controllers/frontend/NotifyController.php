<?php

class NotifyController extends Controller {
    public $layout = "mobile";
    public function actionIndex() {
        $Model = new Notify();
        $userId = Yii::app()->user->id;
        $data['listnotify'] = $Model->listNotify($userId);
        $this->render("//notify/index", $data);
    }

    public function actionRead($id,$status){
        $columns = array("read" => 1);
        Yii::app()->db->createCommand()
            ->update("logorders",$columns,"id='$id'");

         $sql = "select order_id from logorders where id = '$id'";
         $rs = Yii::app()->db->createCommand($sql)->queryRow();
         $orderId = $rs['order_id'];

        $userid = Yii::app()->user->id;

        $order = new Orders();
        if($status == 4){
            $data['statusText'] = "อยู่ระหว่างการจัดส่ง";
        } else {
           $data['statusText'] = "จัดส่งแล้ว";
        }

        $Model = new Orders();
        $data['detail'] = $Model->GetDetailOrder($orderId);
        $query = "select o.*,p.product_name
                        from order_details o INNER JOIN product p ON o.product_id = p.product_id
                        where order_id = '$orderId'";
        $data['order'] = Yii::app()->db->createCommand($query)->queryAll();
        $this->render("//notify/view", $data);
    }

}
