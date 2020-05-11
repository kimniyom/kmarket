<?php

class StockController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = "template_backend";

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'detailproduct', 'addstock', 'history', 'deletestock', 'updatestock'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type) {
        $model = new Stock;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Stock'])) {
            $model->attributes = $_POST['Stock'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'type' => $type
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Stock'])) {
            $model->attributes = $_POST['Stock'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Stock();
        $data['stock'] = $model->checkStock();
        $this->render('index', $data);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Stock('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Stock'])) {
            $model->attributes = $_GET['Stock'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Stock the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Stock::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Stock $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'stock-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDetailproduct() {
        $model = new Product();
        $product_id = Yii::app()->request->getPost('product_id');
        $detail = $model->_get_detail_product($product_id);
        $total = $this->countStock($product_id);
        $json = array("detail" => $detail, "total" => $total);
        echo json_encode($json);
    }

    function countStock($product_id) {
        $sql = "select IFNULL(sum(total),0) as total from stock where product_id = '$product_id'";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

    public function actionAddstock() {
        $product_id = Yii::app()->request->getPost('product_id');
        $inputnumber = Yii::app()->request->getPost('inputnumber');
        $date_expire = Yii::app()->request->getPost('dateexpire');
        $day = substr($date_expire, 0, 2);
        $month = substr($date_expire, 2, 2);
        $year = substr($date_expire, 4, 4);
        $dateExpire = ($year - 543) . "-" . $month . "-" . $day;

        $columns = array(
            "product_id" => $product_id,
            "inputnumber" => $inputnumber,
            "total" => $inputnumber,
            "date_expire" => $dateExpire,
            "date_input" => date("Y-m-d"),
            "lotnumber" => date("YmdHis")
        );
        $rs = Yii::app()->db->createCommand()
                ->insert("stock", $columns);
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function actionHistory() {
        $product_id = Yii::app()->request->getPost('product_id');
        $sql = "select * from stock where product_id = '$product_id' and total > 0 order by date_input,lotnumber asc";
        $data['history'] = Yii::app()->db->createCommand($sql)->queryAll();
        $this->renderPartial("history", $data);
    }

    public function actionDeletestock() {
        $id = Yii::app()->request->getPost('id');
        Yii::app()->db->createCommand()
                ->delete("stock", "id = '$id'");
    }

    public function actionUpdatestock() {
        $id = Yii::app()->request->getPost('id');
        $total = Yii::app()->request->getPost('total');
        $cutstock = Yii::app()->request->getPost('cutstock');

        $totalStock = ($total - $cutstock);
        $columns = array("total" => $totalStock);
        Yii::app()->db->createCommand()
                ->update("stock", $columns, "id = '$id'");
    }

}
