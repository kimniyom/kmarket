<?php

class User extends CActiveRecord {

    public function tableName() {
        return "masuser";
    }

    public function Check_user($email = null, $password = null) {
        $result = Yii::app()->db->createCommand()
                ->select('pid,name,lname,password,status,email,tel')
                ->from('masuser')
                ->where('email = :email AND password = :password', array(':email' => $email, ':password' => $password))
                ->queryRow();

        return $result;
    }

    public function Get_address($id = null) {
        $sql = "SELECT a.address,
                    a.number,
                    a.building,
                    a.class,
                    a.room,
                    a.changwat,
                    a.ampur,
                    a.tambon,
                    changwat_name,
                    ampur_name,
                    tambon_name,
                    m.name,
                    m.lname,
                    m.tel,
                    m.email,
                    a.zipcode
                FROM address a INNER JOIN masuser m ON a.user_id = m.id
                LEFT JOIN changwat c ON a.changwat = c.changwat_id
                LEFT JOIN ampur ap ON a.ampur = ap.ampur_id
                LEFT JOIN tambon t ON a.tambon = t.tambon_id
                WHERE a.user_id = '$id' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

        return $result;
    }

    public function Check_address_true($pid = null) {
        $query = "SELECT *
                        FROM address
                        WHERE pid = '$pid'
                        AND number != ''
                        AND changwat != ''
                        AND ampur != ''
                        AND tambon != ''
                        AND zipcode != '' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }

    public function Get_changwat() {
        $query = "SELECT * FROM changwat";
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    public function Check_address($id = null) {
        $query = "SELECT COUNT(*) AS TOTAL FROM address WHERE user_id = '$id' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result['TOTAL'];
    }

    public function Get_detail($pid = null) {
        $sql = "SELECT
                    m.pid,
                    m.alias,
                    IF(sex = 'M','ชาย','หญิง') AS sex,
                    sex AS set_status,
                    a.number,
                    a.building,
                    a.class,
                    a.room,
                    a.changwat,
                    a.ampur,
                    a.tambon,
                    changwat_name,
                    ampur_name,
                    tambon_name,
                    m.name,
                    m.lname,
                    m.tel,
                    m.email,
                    m.birth,
                    m.images,
                    m.create_date,
                    a.zipcode
                FROM  masuser m
                LEFT JOIN address a ON m.pid = a.pid
                LEFT JOIN changwat c ON a.changwat = c.changwat_id
                LEFT JOIN ampur ap ON a.ampur = ap.ampur_id
                LEFT JOIN tambon t ON a.tambon = t.tambon_id
                WHERE m.pid = '$pid'  ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

        return $result;
    }

    function countNotify($userId) {
        $sql = "SELECT COUNT(*) AS total
                FROM logorders l INNER JOIN orders o ON l.order_id = o.id
                WHERE l.`status` IN('4','5') AND l.read IS NULL
                AND o.`user` = '$userId'";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

}
