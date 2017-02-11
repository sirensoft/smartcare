<?php

namespace frontend\modules\ehr\controllers;

use common\components\AppController;
use Yii;
use yii\data\ArrayDataProvider;

use common\components\MyHelper;
use frontend\modules\ehr\models\LogEhr;
use frontend\modules\ehr\models\OnOffEhr;




class DefaultController extends AppController {
     public $enableCsrfValidation = false; //เพิ่ม
  
    public function actionIndex($pids=null) {
        $this->layout = 'main';
        $this->permitRole([2,4,5,6]);// เพิ่ม
        
        $onoff  = OnOffEhr::find()->one();
        if($onoff->status !== 'on'){
            throw  new \yii\web\ConflictHttpException('ระบบ EHR ถูกปิด');
        }
        $this->overclock();
        // connect database
        $connection = Yii::$app->db_hdc;

        $tname = '';
        $taddr = '';
        $sex = '1';
        $chronic = '';
        $cid = '';
        $seq = '';
        $hospcode = '';
        $an = '';
        $date_serv = '';
        $cc = '';
        $sbp = '';
        $dbp = '';
        $pr = '';
        $rr = '';
        $btemp = '';
        $hospname = '';
        $timeserv = '';
        $birth ='';
        
        
        if (!empty($pids)) {
            
            $cid = MyHelper::getPatientCid($pids);         
            Yii::$app->session['cid'] = $cid;
            
            $log = new LogEhr();
            $log->username = MyHelper::getUserName();
            $log->patient_cid = $cid;
            $log->datetime = date('Y-m-d H:i:s');
            $log->ip= \Yii::$app->request->getUserIP();
            
            if($log->save()){
                //MyHelper::setAlert('success','......');
            }
            
        }
        if (isset($_GET['hospcode'])) {
            $cid = Yii::$app->session['cid'];
            $seq = $_GET['seq'];
            $hospcode = $_GET['hospcode'];
            $an = $_GET['an'];
        }
        
        if (isset($_GET['page'])) {
            $cid = Yii::$app->session['cid'];
        }

        // ข้อมูลบุคคล
        $sql = "SELECT p.cid,CONCAT(n.prename,p.name,' ',p.lname) AS tname,sex,
                CONCAT('เลขที่ ',h.HOUSE,' ต.',t.tambonname,' อ.',a.ampurname,' จ.',c.changwatname) AS taddr,
                GROUP_CONCAT(DISTINCT CONCAT(tc.chronic,' ',i.diagename))  as chronic,birth
                FROM person p
                LEFT JOIN cprename n ON n.id_prename = p.prename
                LEFT JOIN home h ON h.HOSPCODE = p.HOSPCODE AND h.HID = p.HID
                LEFT JOIN tmp_chronic tc on tc.cid = p.cid
                LEFT JOIN cicd10tm i ON i.diagcode = tc.chronic
                LEFT JOIN campur a ON a.ampurcode = h.AMPUR AND a.changwatcode =  h.CHANGWAT
                LEFT JOIN cchangwat c  ON c.changwatcode = h.CHANGWAT
                LEFT JOIN ctambon t ON t.tamboncode = h.TAMBON AND t.ampurcode = CONCAT(c.changwatcode,a.ampurcode)
                WHERE  p.cid = '$cid' 
                LIMIT 1";

        $data = $connection->createCommand($sql)
                ->queryAll();

        for ($i = 0; $i < sizeof($data); $i++) {
            $tname = $data[$i]['tname'];
            $taddr = $data[$i]['taddr'];
            $sex = $data[$i]['sex'];
            $chronic = $data[$i]['chronic'];
            $birth = $data[$i]['birth'];
        }


        // ข้อมูลวันที่มารักษา
        $sqld = "SELECT CONCAT(s.date_serv,' ',left(time_serv,2),':',SUBSTR(time_serv,3,2),':',right(time_serv,2)) tdate,
                s.hospcode,s.seq,h.hosname as hospname,p.pid,
                IF(a.an IS NULL,'N','Y') AS tadmit,
                IF(a.an IS NULL,' ',a.AN) AS an
                FROM service s
                LEFT JOIN person p ON p.hospcode = s.hospcode AND p.pid =s.pid
                LEFT JOIN chospital  h ON h.hoscode = s.hospcode
		LEFT JOIN tmp_admission a ON a.HOSPCODE = s.HOSPCODE AND a.SEQ = s.SEQ
                WHERE  p.cid = '$cid'
                ORDER BY date_serv DESC LIMIT 20";
        $rawData = $connection->createCommand($sqld)
                ->queryAll();

        $dataProvider = new ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        //วินิจฉัย
        $sqli = "select * from ( SELECT d.diagcode,diagename,diagtype
                    FROM tmp_diag_opd  d
                    LEFT JOIN cicd10tm i ON i.diagcode = d.diagcode
                    WHERE cid ='$cid'
                    AND seq='$seq' AND hospcode = '$hospcode'    
                    UNION ALL
                    SELECT d.diagcode,diagename,diagtype
                    FROM diagnosis_ipd d
                    LEFT JOIN cicd10tm i ON i.diagcode = d.diagcode
                    WHERE an ='$an'  AND hospcode = '$hospcode' ) t order by diagtype   ";
        $rawi = $connection->createCommand($sqli)
                ->queryAll();

        $dataProvideri = new ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawi,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);
        //อาการ
        $sqlcc = "SELECT date_serv,CHIEFCOMP,sbp,dbp,pr,rr,btemp,h.hosname as hospname,
                    CONCAT(left(time_serv,2),':',SUBSTR(time_serv,3,2),':',right(time_serv,2)) as time_serv
                    FROM service s
                    LEFT JOIN chospital  h ON h.hoscode = s.hospcode
                    WHERE s.hospcode='$hospcode' AND seq ='$seq' 
                    LIMIT 1";
        $datacc = $connection->createCommand($sqlcc)
                ->queryAll();

        for ($i = 0; $i < sizeof($datacc); $i++) {
            $date_serv = $datacc[$i]['date_serv'];
            $cc = $datacc[$i]['CHIEFCOMP'];
            $sbp = $datacc[$i]['sbp'];
            $dbp = $datacc[$i]['dbp'];
            $pr = $datacc[$i]['pr'];
            $rr = $datacc[$i]['rr'];
            $btemp = $datacc[$i]['btemp'];
            $hospname = $datacc[$i]['hospname'];
            $hospname = str_replace("โรงพยาบาลส่งเสริมสุขภาพตำบล","รพสต.", $hospname);
            $timeserv = $datacc[$i]['time_serv'];
        }
        //LAB
        $sqll = "SELECT l.labtest, t.labtest AS tlname,labresult
                    FROM  tmp_labfu l
                    LEFT JOIN clabtest t ON t.id_labtest = l.labtest
                    WHERE cid ='$cid'
                    AND seq='$seq' AND hospcode = '$hospcode'    ";
        $rawl = $connection->createCommand($sqll)
                ->queryAll();

        $dataProviderl = new ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawl,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);

        //ยา
        $sqldr = "SELECT d.dname,d.AMOUNT
                FROM tmp_drug_opd  d 
                WHERE cid = '$cid'
                      AND HOSPCODE ='$hospcode' AND seq ='$seq' 
                UNION ALL
                SELECT d.dname,d.AMOUNT
                FROM drug_ipd  d
               
                WHERE an ='$an'  AND hospcode = '$hospcode'  ";
        $rawdr = $connection->createCommand($sqldr)
                ->queryAll();

        $dataProviderdr = new ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawdr,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);
        
        //หัตถการ
        $sql_proced = " SELECT s.PROCEDCODE 'CODE',c.en_desc 'PROCED' FROM tmp_procedure_opd s 
INNER JOIN cproced c ON c.procedcode = s.PROCEDCODE
WHERE s.HOSPCODE = '$hospcode' AND s.CID='$cid' AND s.SEQ ='$seq' ";
        $raw_proced = $connection->createCommand($sql_proced)
                ->queryAll();
        $dataProviderp = new ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $raw_proced,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);

        return $this->render('index', ['cid' => $cid, 'tname' => $tname, 'taddr' => $taddr, 'sex' => $sex, 'chronic' => $chronic,'birth'=>$birth,
                    'dataProvider' => $dataProvider,
                    'dataProvideri' => $dataProvideri,
                    'dataProviderl' => $dataProviderl,
                    'dataProviderdr' => $dataProviderdr,
                    'dataProviderp'=>$dataProviderp,
                    'dateserv' => $date_serv,
                    'cc' => $cc,
                    'sbp' => $sbp,
                    'dbp' => $dbp,
                    'pr' => $pr,
                    'rr' => $rr,
                    'btemp' => $btemp,
                    'hospcode' =>$hospcode,
                    'hospname'=>$hospname,
                    'timeserv'=>$timeserv
        ]);
    }

}
