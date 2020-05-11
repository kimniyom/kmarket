<?php

class Notify {

    function listNotify($user) {
        $query = "SELECT l.*
                FROM logorders l INNER JOIN orders o ON l.order_id = o.id
                WHERE l.`status` IN('4','5') AND l.read IS NULL
                AND o.`user` = :user ";
        $rawData = Yii::app()->db->createCommand($query);
        $rawData->bindParam(":user", $user, PDO::PARAM_STR);
        return $rawData->queryAll();
    }

}
