<?php

Yii::import('application.vendors.*');
require 'PhpSpreadsheet/autoload.php';

use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Dimension;

class ReportController extends Controller {

    public function filters() {
        return array(
            'accessControl'
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $file = 'upload_file/reports/news.xlsx';//file directory
        $inputFileType = IOFactory::identify($file);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);
        $sheet = $spreadsheet->getActiveSheet();
        $styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ]
        ];

//Retrieve Highest Column (e.g AE)
        $highestRow = $sheet->getHighestRow();//row text bold
        $highestColumn = $sheet->getHighestColumn();//colmun text bold style


//set first row bold
        $sheet->getStyle('A1:'  . 'C1')->applyFromArray($styleArrayFirstRow);
       
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'title');
        $sheet->setCellValue('C1', 'news text');
//        $sheet->setCellValue('D1', Yii::t("translation", "delivery_type"));
//        $sheet->setCellValue('E1', Yii::t("translation", "agromarkaz_service"));
//        $sheet->setCellValue('F1', Yii::t("translation", "name"));
//        $sheet->setCellValue('G1', Yii::t("translation", "surname"));
//        $sheet->setCellValue('H1', Yii::t("translation", "phone"));
//        $sheet->setCellValue('I1', Yii::t("translation", "address"));
//        $sheet->setCellValue('J1', Yii::t("translation", "status"));
//        $sheet->setCellValue('K1', Yii::t("translation", "create_time"));
//        $sheet->setCellValue('L1', Yii::t("translation", "update_time"));
//        $sheet->setCellValue('M1', Yii::t("translation", "user"));
//        $sheet->setCellValue('N1', Yii::t("translation", "manager"));
//        $sheet->setCellValue('O1', Yii::t("translation", "time_processing"));
//        $sheet->setCellValue('P1', Yii::t("translation", "time_spam"));
//        $sheet->setCellValue('Q1', Yii::t("translation", "time_progress"));
//        $sheet->setCellValue('R1', Yii::t("translation", "time_done"));
//        $sheet->setCellValue('S1', Yii::t("translation", "time_failed"));
//        $sheet->setCellValue('T1', Yii::t("translation", "where_from"));
//        $sheet->setCellValue('U1', Yii::t("translation", "manager_comment"));
//        $sheet->setCellValue('V1', Yii::t("translation", "notification_telegram_send"));
//        $sheet->setCellValue('W1', Yii::t("translation", ""));
//        $sheet->setCellValue('X1', Yii::t("translation", ""));

        $bid_agromarkazs = News::model()->findAll();
        $n = 2;
        foreach ($bid_agromarkazs as $bid_agromarkaz) {
            $sheet->setCellValue('A' . $n, $bid_agromarkaz->id);
            $sheet->setCellValue('B' . $n, $bid_agromarkaz->title);
            $sheet->setCellValue('C' . $n, $bid_agromarkaz->news_text);
//            $sheet->setCellValue('D' . $n, $bid_agromarkaz->NameDeliveryType);
//            $sheet->setCellValue('E' . $n, $bid_agromarkaz->AgromarkazServiceName);
//            $sheet->setCellValue('F' . $n, $bid_agromarkaz->name);
//            $sheet->setCellValue('G' . $n, $bid_agromarkaz->surname);
//            $sheet->setCellValue('H' . $n, $bid_agromarkaz->phone);
//            $sheet->setCellValue('I' . $n, $bid_agromarkaz->address);
//            $sheet->setCellValue('J' . $n, $bid_agromarkaz->NameStatus);
//            $sheet->setCellValue('K' . $n, $bid_agromarkaz->create_time);
//            $sheet->setCellValue('L' . $n, $bid_agromarkaz->update_time);
//            $sheet->setCellValue('M' . $n, $bid_agromarkaz->NameUserFIO);
//            $sheet->setCellValue('N' . $n, $bid_agromarkaz->NameManagerFIO);
//            $sheet->setCellValue('O' . $n, $bid_agromarkaz->time_processing);
//            $sheet->setCellValue('P' . $n, $bid_agromarkaz->time_spam);
//            $sheet->setCellValue('Q' . $n, $bid_agromarkaz->time_progress);
//            $sheet->setCellValue('R' . $n, $bid_agromarkaz->time_done);
//            $sheet->setCellValue('S' . $n, $bid_agromarkaz->time_failed);
//            $sheet->setCellValue('T' . $n, $bid_agromarkaz->NameWhereFrom);
//            $sheet->setCellValue('U' . $n, $bid_agromarkaz->manager_comment);
//            $sheet->setCellValue('V' . $n, $bid_agromarkaz->notification_telegram_send);
//            $sheet->setCellValue('W' . $n, $bid_agromarkaz->Title);
//            $sheet->setCellValue('X' . $n, $bid_agromarkaz->Title);
            $n++;
        }
        $sheet->getStyle('A1:'.'A'.$n)->applyFromArray($styleArrayFirstRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save($file);

        if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            // читаем файл и отправляем его пользователю
            readfile($file);
            exit;
        }
        Yii::app()->end();
    }

}
