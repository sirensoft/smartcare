

<table class="table table-bordered">
    <tbody>
        <tr>
            <td align="center">
                <div style="font-weight: bold">คะแนน 2Q = <span id='q2_point'></span></div>
            </td>
        </tr>
        <tr>
            <td>แบบคัดกรองโรคซึมเศร้า 2 คำถาม (2Q)</td>
        </tr>
        <tr>
            <td>
                <ol>
                    <li style="font-weight: bold">ใน 2 สัปดาห์ที่ผ่านมา รวมวันนี้ ท่านรู้สึก หดหู่ เศร้า หรือท้อแท้สิ้นหวัง หรือไม่</li>
                    <ul>
                        <li>
                            <input type="radio" name="q2_1" data-q2  value="1">
                            มี
                        </li>
                        <li>
                            <input type="radio" name="q2_1" data-q2 value="0">
                            ไม่มี
                        </li>
                    </ul>
                    <li style="font-weight: bold"> ใน 2 สัปดาห์ที่ผ่านมา รวมวันนี้ ท่านรู้สึก เบื่อ ทำอะไรก็ไม่เพลิดเพลิน หรือไม่ </li>
                    <ul>
                        <li>
                            <input type="radio" name="q2_2" data-q2  value="1">
                            มี
                        </li>
                        <li>
                            <input type="radio" name="q2_2" data-q2  value="0">
                            ไม่มี
                        </li>
                    </ul>
                </ol>
            </td>
        </tr>
    </tbody>
</table>
<div>
    <?= yii\helpers\Html::img('./images/2q.png') ?>
</div>
<?php
$this->registerJs($this->render('q2.js'));
?>