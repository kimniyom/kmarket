<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BackendController extends Controller {

    public $layout = "template_backend";

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','login','logout','warninglogin'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'create', 'update','logout','warninglogin'),
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

/*
    protected function beforeAction($action) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array('backend/backend/login'));
        } else {
            $this->actionIndex();
        }

        //return parent::beforeAction($action);
    }
*/

         /**
     * Displays the login page
     */
    public function actionLogin() {
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                //$this->redirect(Yii::app()->user->returnUrl);
                $columns = array(
                    "log" => "user" . Yii::app()->user->id . " | login",
                    "user" => Yii::app()->user->name,
                    "dupdate" => date("Y-m-d H:i:s"),
                    "ip" => Yii::app()->request->userHostAddress,
                    "status" => "TRUE"
                );

                Yii::app()->db->createCommand()
                        ->insert("loguserlogin", $columns);

                $userLogin = Masuser::model()->findByAttributes(array('id' => Yii::app()->user->id));
                if ($userLogin->status == "A") {
                    $this->redirect(array('backend/backend/index'));
                } else {
                    $this->redirect(array('backend/backend/warninglogin'));
                }
            } else {
                $columns = array(
                    "log" => "!LoginFail | login",
                    "user" => "",
                    "dupdate" => date("Y-m-d H:i:s"),
                    "ip" => Yii::app()->request->userHostAddress,
                    "status" => "FALSE"
                );
                Yii::app()->db->createCommand()
                        ->insert("loguserlogin", $columns);

                //$this->renderPartial('login', array('model' => $model));
            }
        }
        // display the login form
        $this->renderPartial('//backend/login', array('model' => $model));
    }


    public function actionIndex() {
        if(!Yii::app()->user->isGuest){
            $userLogin = Masuser::model()->findByAttributes(array('id' => Yii::app()->user->id));
            if($userLogin->status != "A"){
                $this->redirect(array('backend/backend/logout'));
            }  else if($userLogin->status == "U"){
                $this->redirect(array('backend/backend/warninglogin'));
            }
        } else {
            $this->redirect(array('backend/backend/logout'));
        }
   

        $month = Month::model()->findAll();
        $Category = array();
        $Val = array();
        foreach ($month as $rs):
            $total = $this->actionGetviewmonth($rs['monthnumber']);
                $Category[] = $rs['month_th'];
                $Val[] = $total;
        endforeach;

        $data['category'] = "'" . implode("','", $Category) . "'";
        $data['val'] = implode(",", $Val);

        //exit();
        $viewcategory = $this->Getviewcategory();
        $data['viewcategory'] = $viewcategory['value'];
        $data['viewcategoryCount'] = $viewcategory['sum'];

        //$viewbran = $this->GetviewBrand();
        //$data['brandcat'] = $viewbran['brancat'];
        //$data['brandval'] = $viewbran['branval'];

        $data['viewMaxbrand'] = $this->Getmaxviewbrand();
        
        $data['buyMaxcategory'] = $this->CountBuyCategory();
        
        $data['buyMaxproduct'] = $this->countBuyMaxProduct();

        $data['countOederAll'] = $this->countOrder();

        //$data['countOederSuccess'] = $this->countOrderSuccess();

        //$data['countOrderUnconfirm'] = $this->countOrderUnconfirm();

        $this->render("//backend/index", $data);
    }


    private function Getmaxviewbrand() {
        $sql = "SELECT c.brandname,IFNULL(Q.total,0) AS total
                FROM brand c
                LEFT JOIN(
                SELECT p.brand,IFNULL(COUNT(*),0) AS total
                FROM viewproduct v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.brand
                ) Q ON c.id = Q.brand
                ORDER BY total DESC
                LIMIT 1";

        $result = Yii::app()->db->createCommand($sql)->queryRow();
        $Arr = array("brandname" => $result['brandname'], "total" => $result['total']);
        return $Arr;
    }

    private function CountBuyCategory(){
        $sql = "SELECT c.categoryname,IFNULL(Q.total,0) AS total
                FROM category c
                LEFT JOIN(
                    SELECT p.category,IFNULL(COUNT(*),0) AS total
                    FROM order_details v INNER JOIN product p ON v.product_id = p.product_id
                    GROUP BY p.category
                ) Q ON c.id = Q.category
                ORDER BY total DESC
                LIMIT 1";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        $Arr = array("categoryname" => $result['categoryname'], "total" => $result['total']);
        return $Arr;
    }
    
    private function Getmaxviewcategory() {
        $sql = "SELECT c.categoryname,IFNULL(Q.total,0) AS total
                FROM category c
                LEFT JOIN(
                SELECT p.category,IFNULL(COUNT(*),0) AS total
                FROM viewproduct v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.category
                ) Q ON c.id = Q.category
                ORDER BY total DESC
                LIMIT 1";

        $result = Yii::app()->db->createCommand($sql)->queryRow();
        $Arr = array("categoryname" => $result['categoryname'], "total" => $result['total']);
        return $Arr;
    }

    private function countBuyMaxProduct(){
        $sql = "SELECT p.product_name,IFNULL(COUNT(*),0) AS total
                FROM order_details v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.product_id
                ORDER BY total DESC 
                LIMIT 1";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        $Arr = array("productname" => $result['product_name'], "total" => $result['total']);
        return $Arr;        
    }
    
    private function Getmaxviewproduct() {
        $sql = "SELECT p.product_name,IFNULL(COUNT(*),0) AS total
                FROM viewproduct v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.product_id
                ORDER BY total DESC 
                LIMIT 1";

        $result = Yii::app()->db->createCommand($sql)->queryRow();
        $Arr = array("productname" => $result['product_name'], "total" => $result['total']);
        return $Arr;
    }
    
    

    private function Getviewcategory() {
        $sql = "SELECT c.categoryname,IFNULL(Q.total,0) AS total
                FROM category c
                LEFT JOIN(
                SELECT p.category,IFNULL(COUNT(*),0) AS total
                FROM order_details v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.category
                ) Q ON c.id = Q.category";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $Arr = array();
        $sum = 0;
        foreach ($result as $rs):
            $Arr[] = "['" . $rs['categoryname'] . "'," . $rs['total'] . "]";
            $sum = $sum + $rs['total'];
        endforeach;
        $value = implode(",", $Arr);
        $Array = array("value" => $value, "sum" => $sum);
        return $Array;
    }

    private function actionGetviewmonth($month) {
        $sql = "SELECT COUNT(*) as total
                FROM orders o
                WHERE MONTH(o.order_date) = '$month'
                ORDER BY total DESC 
                LIMIT 1";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

    private function GetviewBrand() {
        $sql = "SELECT c.brandname,IFNULL(Q.total,0) AS total
                FROM brand c
                LEFT JOIN(
                SELECT p.brand,IFNULL(COUNT(*),0) AS total
                FROM viewproduct v INNER JOIN product p ON v.product_id = p.product_id
                GROUP BY p.brand
                ) Q ON c.id = Q.brand
                ORDER BY total DESC ";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $CatArr = array();
        $ValArr = array();
        foreach ($result as $rs):
            $CatArr[] = $rs['brandname'];
            $ValArr[] = $rs['total'];
        endforeach;
        $Cat = "'" . implode("','", $CatArr) . "'";
        $Val = implode(",", $ValArr);
        $Res = array("brancat" => $Cat, "branval" => $Val);
        return $Res;
    }

    public function actionSet_navbar() {
        $navmenu = $_POST['id'];
        Yii::app()->session['navmenu'] = $navmenu;
    }


    function countOrder(){
        $sql = "select count(*) as total from orders ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

    function countOrderSuccess(){
        $sql = "select count(*) as total from orders where order_confirm = '1' ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

    function countOrderUnconfirm(){
        $sql = "select count(*) as total from orders where order_confirm = '0' ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['total'];
    }

   
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array('backend/backend/login'));
        //$this->redirect(array('site/index'));
    }

    public function actionWarninglogin(){
        $data['error'] = "เฉพาะผู้มีสิทธิ์เท่านั้น";
        $this->renderPartial('//backend/warning',$data);
    }

}
