<?php

use yii\helpers\Html;


?>
<table width="100%"   cellpadding="3" cellspacing="0">
    <tr>
        <td><?=Html::img('./web_img/tai.png');?></td>
        <td style="text-align:left;vertical-align:top;padding:0">
            <form method="POST">
                <p>ADL = <input type="text" name="adl_score" id='adl_score'/></p>
                <p>TAI = <input type="text" name="tai_class" id='tai_class'/></p>
                <button type="submit"> บันทึก </button>
                
            </form>
        </td>
    </tr>
</table>

