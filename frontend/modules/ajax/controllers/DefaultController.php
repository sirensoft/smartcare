<?php

namespace frontend\modules\ajax\controllers;

use yii\web\Controller;
use yii\helpers\Json;

/**
 * Default controller for the `ajax` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionAmp() {

        $parents = \Yii::$app->request->post('depdrop_parents');

        if ($parents != null) {
            $sel = $parents[0];
            $sql = "SELECT t.ampurname id , t.ampurname name FROM c_ampur t WHERE t.prov_name ='$sel' ORDER BY t.ampurcode";
            $items = \Yii::$app->db->createCommand($sql)->queryAll();
            $out = $items;

            echo Json::encode(['output' => $out, 'selected' => 'บางระกำ']);
            return;
        }
         echo Json::encode(['output'=>'', 'selected'=>'']);
    }

}
