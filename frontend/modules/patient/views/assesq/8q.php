<div id="panel_q8" >


    <table class="table table-bordered">
        <tbody>
            <tr>
                <td align="center">
                    <div style="font-weight: bold">คะแนน 8Q = <span id='q8_point_top'></span></div>
                </td>
            </tr>
            <tr>
                <td>
                    แบบประเมินการฆ่าตัวตาย 8 คำถาม (8Q)
                </td>
            </tr>
            <tr>
                <td>


                    <b>1.คิดอยากตาย หรือ คิดว่าตายไปจะดีกว่า</b> 
                    <ul>
                        <li>
                            <input type="radio" name="q8_1" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_1" data-q8 value="1">
                            มี
                        </li>                      
                    </ul>

                    <b>2.อยากทำร้ายตัวเอง หรือ ทำให้ตัวเองบาดเจ็บ </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_2" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_2" data-q8 value="2">
                            มี
                        </li>                      
                    </ul>

                    <b>3.ในช่วง 1 เดือนที่ผ่าานมา คิดเกี่ยวกับการฆ่าตัวตาย (ถ้าตอบว่าคิดเกี่ยวกับฆ่าตัวตายให้ถามต่อ 3.1) </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_3" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_3" data-q8 value="6">
                            มี
                        </li>                      
                    </ul>
                    <div style="margin-left: 20px">
                    3.1  ท่านสามารถควบคุมความอยากฆ่าตัวตายที่ท่านคิดอยู่นั้นได้หรือไม่ หรือบอกได้ไหมว่าคงจะไม่ทำตามความคิดนั้นในขณะนี้ 
                    <ul>
                        <li>
                            <input type="radio" name="q8_31" data-q8  value="0">
                            ได้
                        </li>
                        <li>
                            <input type="radio" name="q8_31" data-q8 value="8">
                            ไม่ได้
                        </li>                      
                    </ul>
                    </div>

                    <b>4.ในช่วง 1 เดือนที่ผ่าานมา มีแผนการที่จะฆ่าตัวตาย </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_4" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_4" data-q8 value="8">
                            มี
                        </li>                      
                    </ul>

                    <b>5.ในช่วง 1 เดือนที่ผ่าานมา ได้เตรียมการที่จะทำร้ายตนเองหรือเตรียมการจะฆ่าตัวตายโดยตั้งใจว่าจะให้ตายจริง ๆ </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_5" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_5" data-q8 value="9">
                            มี
                        </li>                      
                    </ul>


                    <b>6.ได้ทำให้ตนเองบาดเจ็บแต่ไม่ตั้งใจที่จะทำให้เสียชีวิต </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_6" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_6" data-q8 value="4">
                            มี
                        </li>                      
                    </ul>

                    <b>7.ได้พยายามฆ่าตัวตายโดยคาดหวัง/ตั้งใจที่จะให้ตาย </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_7" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_7" data-q8 value="10">
                            มี
                        </li>                      
                    </ul>

                    <b>8.ตลอดชีวิตที่ผ่านมา เคยพยายามฆ่าตัวตาย </b>
                    <ul>
                        <li>
                            <input type="radio" name="q8_8" data-q8  value="0">
                            ไม่มี
                        </li>
                        <li>
                            <input type="radio" name="q8_8" data-q8 value="4">
                            มี
                        </li>                      
                    </ul>

                </td>
            </tr>
            <tr>
                <td align="center">
                    <div style="font-weight: bold">คะแนน 8Q = <span id='q8_point_foot'></span></div>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <?= yii\helpers\Html::img('./images/8q.png') ?>
    </div>
    <?php
    $this->registerJs($this->render('q8.js'));
    ?>
</div>

