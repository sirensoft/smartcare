<?php

namespace common\components;

use yii\bootstrap\Modal;

class MyWidget extends \yii\base\Component {

    public static function Modal($header,$id,$div_id) {

        Modal::begin([
            'header' => $header,
            'size' => 'modal-lg',
            'id' => $id,
        ]);
        echo "<div id='$div_id'></div>";

        Modal::end();
    }

}
