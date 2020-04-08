<?php

class PageController extends Controller {

    public $layout = "template_backend";

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCreate($type, $seq) {
        $data['type'] = $type;
        $data['seq'] = $seq;
        $data['articlelist'] = Yii::app()->db->createCommand("select * from article order by id desc")->queryAll();
        $this->render("create", $data);
    }

    public function actionSave() {
        $article = Yii::app()->request->getPost('article');
        $type = Yii::app()->request->getPost('type');
        $seq = Yii::app()->request->getPost('seq');
        $columns = array(
            "code" => $article,
            "type" => $type,
            "seq" => $seq
        );

        $sql = "select * from page where type = '$type' and seq = '$seq'";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        if ($result['id'] != "") {
            $id = $result['id'];
            Yii::app()->db->createCommand()
                    ->update("page", $columns, "id='$id'");
        } else {
            Yii::app()->db->createCommand()
                    ->insert("page", $columns);
        }
    }

}
