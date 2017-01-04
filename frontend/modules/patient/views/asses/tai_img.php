<?php

use yii\helpers\Html;


?>
<table width="100%"   cellpadding="3" cellspacing="0" class="table table-striped">
    <tr>
        <td><?=Html::img('./web_img/tai.png');?></td>
        <td style="text-align:left;vertical-align:top;padding:0">
            <div style="margin: 5px"> 
            <form method="POST">
                <p>คะแนน ADL = <input type="text" name="adl_score" id='adl_score'/></p>
                <p>ประเมิน TAI = <input type="text" name="tai_class" id='tai_class'/></p>
                <button type="submit"> บันทึก </button>
                
            </form>
            </div>
        </td>
    </tr>
</table>

