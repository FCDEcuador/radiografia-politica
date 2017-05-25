<?php

namespace App\Excel\Export;

use PHPExcel_Worksheet_Drawing;

class ProfileExportHandler implements \Maatwebsite\Excel\Files\ExportHandler
{

  protected function parseWidth($sheet, $column, $row, $width)
  {
      $sheet->setWidth($column, $width);
  }

  protected function parseHeight($sheet, $column, $row, $height)
  {
    $sheet->setHeight($row, $height);
  }
  public function handle($export)
  {

    $profile = $export->repository->find($export->id);
    return $export->sheet('Datos', function($sheet) use($profile)
           {
                /*$sheet->loadView('excel.profile.data',['profile' => $profile]);
                $lastrow= $sheet->getHighestRow();
                $sheet->getStyle('A2:B6'.$lastrow)->getAlignment()->setWrapText(true);*/
                $header = new PHPExcel_Worksheet_Drawing;
                $header->setPath(public_path('img/header-exel-radiografiaP.png')); //your image path
                $header->setWidth(320);
                $header->setResizeProportional();
                $header->setCoordinates('B2');
                $header->setWorksheet($sheet);

                $this->parseWidth($sheet,'B',10,10);
                $this->parseWidth($sheet,'C',10,60);
                $sheet->mergeCells('B10:C10');
                $objDrawing = new PHPExcel_Worksheet_Drawing;
                $objDrawing->setPath(public_path($profile->person->img)); //your image path
                $objDrawing->setWidth(420);
                $objDrawing->setResizeProportional();
                $this->parseHeight($sheet,'B',10,$objDrawing->getHeight());
                $objDrawing->setCoordinates('B10');
                $objDrawing->setWorksheet($sheet);


                $sheet->cell('B11', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Nombre');
                });
                $sheet->cell('C11', function($cell) use($profile){
                  $cell->setValue($profile->person->name);
                });
                $sheet->cell('B12', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Apellido');
                });
                $sheet->cell('C12', function($cell) use($profile){
                  $cell->setValue($profile->person->lastname);
                });
                $sheet->cell('B13', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Facebook');
                });
                $sheet->cell('C13', function($cell) use($profile){
                  $cell->setValue($profile->person->facebook);
                });
                $sheet->cell('B14', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Twitter');
                });
                $sheet->cell('C14', function($cell) use($profile){
                  $cell->setValue("@".$profile->person->twitter);
                });
                $sheet->cell('B15', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Facebook');
                });
                $sheet->cell('C15', function($cell) use($profile){
                  $cell->setValue($profile->person->facebook);
                });
                $sheet->cell('B16', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Descripción');
                });
                $sheet->cell('C16', function($cell) use($profile){
                  $cell->setValue(strip_tags($profile->person->description));
                });
                $lastrow= $sheet->getHighestRow();
                $sheet->getStyle('B11:C16'.$lastrow)->getAlignment()->setWrapText(true);
                $sheet->setBorder('B10:C16', 'thin');


           })->sheet('Timeline', function($sheet) use($profile){
             $sheet->loadView('excel.profile.timeline',['profile' => $profile]);
            // $lastrow= $sheet->getHighestRow();
          //   $sheet->getStyle('A2:B6'.$lastrow)->getAlignment()->setWrapText(true);
        })->sheet('SRI Impestos', function($sheet) use($profile){
               $sheet->loadView('excel.profile.sri',['profile' => $profile]);
           })->sheet('Declaración Patrimonial', function($sheet) use($profile){
                $sheet->loadView('excel.profile.heritage',['profile' => $profile]);
           })->sheet('Superintendencia de compañías', function($sheet) use($profile){
             $sheet->loadView('excel.profile.companies',['profile' => $profile]);
           })->sheet('Antecedentes Judicales', function($sheet) use($profile){
              $sheet->loadView('excel.profile.judicial',['profile' => $profile]);
           })->sheet('Formación Académica', function($sheet) use($profile){
              $sheet->loadView('excel.profile.senecyt',['profile' => $profile]);
           })->sheet('Contraloría', function($sheet) use($profile){
              $sheet->loadView('excel.profile.comptroller',['profile' => $profile]);
           })->sheet('Antecedentes Penales', function($sheet) use($profile){
             $sheet->loadView('excel.profile.penals',['profile' => $profile]);
           })->setActiveSheetIndex(0)->export('xls');
  }


}
