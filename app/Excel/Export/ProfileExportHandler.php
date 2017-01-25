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
                $this->parseWidth($sheet,'A',1,10);
                $this->parseWidth($sheet,'B',1,60);
                $sheet->mergeCells('A1:B1');
                $objDrawing = new PHPExcel_Worksheet_Drawing;
                $objDrawing->setPath(public_path($profile->person->img)); //your image path
                $objDrawing->setWidth(420);
                $objDrawing->setResizeProportional();
                $this->parseHeight($sheet,'A',1,$objDrawing->getHeight());
                $objDrawing->setCoordinates('A1');
                $objDrawing->setWorksheet($sheet);


                $sheet->cell('A2', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Nombre');
                });
                $sheet->cell('B2', function($cell) use($profile){
                  $cell->setValue($profile->person->name);
                });
                $sheet->cell('A3', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Apellido');
                });
                $sheet->cell('B3', function($cell) use($profile){
                  $cell->setValue($profile->person->lastname);
                });
                $sheet->cell('A4', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Facebook');
                });
                $sheet->cell('B4', function($cell) use($profile){
                  $cell->setValue($profile->person->facebook);
                });
                $sheet->cell('A4', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Twitter');
                });
                $sheet->cell('B4', function($cell) use($profile){
                  $cell->setValue("@".$profile->person->twitter);
                });
                $sheet->cell('A5', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Facebook');
                });
                $sheet->cell('B5', function($cell) use($profile){
                  $cell->setValue($profile->person->facebook);
                });
                $sheet->cell('A6', function($cell){
                  $cell->setFontWeight('bold');
                  $cell->setValue('Descripción');
                });
                $sheet->cell('B6', function($cell) use($profile){
                  $cell->setValue(strip_tags($profile->person->description));
                });
                $lastrow= $sheet->getHighestRow();
                $sheet->getStyle('A2:B6'.$lastrow)->getAlignment()->setWrapText(true);
                $sheet->setBorder('A1:B6', 'thin');


           })->sheet('Timeline', function($sheet) use($profile){
             $sheet->loadView('excel.profile.timeline',['profile' => $profile]);
            // $lastrow= $sheet->getHighestRow();
          //   $sheet->getStyle('A2:B6'.$lastrow)->getAlignment()->setWrapText(true);
           })->sheet('SRI', function($sheet) use($profile){
               $sheet->loadView('excel.profile.sri',['profile' => $profile]);
           })->sheet('Declaración Patrimonial', function($sheet) use($profile){
                $sheet->loadView('excel.profile.heritage',['profile' => $profile]);
           })->sheet('Superintendencia de compañias', function($sheet) use($profile){
             $sheet->loadView('excel.profile.companies',['profile' => $profile]);
           })->sheet('Antecedentes Judicales', function($sheet) use($profile){
              $sheet->loadView('excel.profile.judicial',['profile' => $profile]);
           })->sheet('Senecyt', function($sheet) use($profile){
              $sheet->loadView('excel.profile.senecyt',['profile' => $profile]);
           })->sheet('Contraloría', function($sheet) use($profile){
              $sheet->loadView('excel.profile.comptroller',['profile' => $profile]);
           })->sheet('Antecedentes Penales', function($sheet) use($profile){
             $sheet->loadView('excel.profile.penals',['profile' => $profile]);
           })->setActiveSheetIndex(0)->export('xls');
  }


}
