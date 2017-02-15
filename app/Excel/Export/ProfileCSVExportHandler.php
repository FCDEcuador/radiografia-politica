<?php

namespace App\Excel\Export;

use PHPExcel_Worksheet_Drawing;

class ProfileCSVExportHandler implements \Maatwebsite\Excel\Files\ExportHandler
{
  protected function parseWidth($sheet, $column, $row, $width)
  {
    $sheet->setWidth($column, $width);
  }

  protected function parseHeight($sheet, $column, $row, $height)
  {
    $sheet->setHeight($row, $height);
  }


  function getCompanyPosition($id)
  {
    switch ($id) {
      case '1':
      return "Presidente";
      case '2':
      return "Gerente";
      case '3':
      return "Accionista";
      default:
      return "";
    }
  }

  function getJudicalType($id)
  {
    switch ($id) {
      case '1':
      return "Actor";
      case '2':
      return "Demandado";
      default:
      return "";
    }
  }

  function getSriType($id)
  {
    switch ($id) {
      case '1':
      return "Renta";
      case '2':
      return "Divisas";
      default:
      return "";
    }
  }

  function getBooleanString($bool)
  {
    switch ($bool) {
      case '1':
        return 'Sí';
      case '0':
        return 'No';
      default:
        return "";
    }
  }

  public function handle($export)
  {

    $profile = $export->repository->find($export->id);
    return $export->sheet('Datos', function($sheet) use($profile)
    {
      $data = [
        $profile->person->name,
        $profile->person->lastname,
        $profile->person->facebook,
        "@".$profile->person->twitter,
        $profile->person->facebook,
        strip_tags($profile->person->description)
      ];
      // $sheet->fromArray($data);

      // $sheet->fromArray([]);
      $timeline = $profile->person->timelines()->orderBy('start')->get()->toArray();
      $dataTimeLine = [];

      foreach ($timeline as $tm) {
        array_push($dataTimeLine,[
          //$profile->person->name." ".$profile->person->lastname,
          $tm['start'],
          (isset($tm['end']) ? $tm['end'] : ""),
          (isset($tm['shortDescription']) ? $tm['shortDescription'] : "")
        ]);
      }

      $sheet->rows(array(
        $data,['']
      ));

      $sheet->rows($dataTimeLine);

      $sheet->rows(array(
        ['']
      ));


      $impuestos = $profile->sri()->orderBy('year')->get()->toArray();
      $dataSri = [];
      foreach ($impuestos as $sri) {
        array_push($dataSri,[
          //  $profile->person->name." ".$profile->person->lastname,
          $sri['year'],
          (isset($sri['value']) ? $sri['value'] : ""),
          (isset($sri['taxType']) ? $this->getSriType($sri['taxType']) : "")
        ]);
      }

      $sheet->rows($dataSri);

      $sheet->rows(array(
        ['']
      ));

      $heritage = $profile->heritage->toArray();

      $dataHeritage = [];

      array_push($dataHeritage,[
        //  $profile->person->name." ".$profile->person->lastname,
        $heritage['houses'],
        $heritage['cars'],
        $heritage['money'],
        $heritage['companies'],
        $heritage['actualDeclaration'],
        $heritage['actualAssets'],
        $heritage['actualLiabilities'],
        $heritage['actualHeritage'],
        $heritage['previousDeclaration'],
        $heritage['previousAssets'],
        $heritage['previousLiabilities'],
        $heritage['previousHeritage']
      ]);

      $sheet->rows($dataHeritage);
      $sheet->rows(array(
        ['']
      ));

     // $companies = $profile->companies->toArray();
      $dataCompanies = [
          ['Gerente', $profile->companies()->where('position',1)->count()],
          ['Presidente' , $profile->companies()->where('position',2)->count()],
          ['Accionista' , $profile->companies()->where('position',3)->count()]
      ];
      /*foreach ($companies as $company) {
        array_push($dataCompanies,[
          //  $profile->person->name." ".$profile->person->lastname,
          $this->getCompanyPosition($company['position']),
          $company['total_companies']
        ]);
      }*/

      $sheet->rows($dataCompanies);
      $sheet->rows(array(
        ['']
      ));

      $judicials = $profile->judicials;
      $dataJudicials = [];
      foreach ($judicials as $judicial) {
        array_push($dataJudicials,[
          //  $profile->person->name." ".$profile->person->lastname,
          $this->getJudicalType($judicial->type),
          $judicial->judgmentType->name,
          $judicial->number
        ]);
      }
      $sheet->rows($dataJudicials);

      $sheet->rows(array(
        ['']
      ));

      $study = $profile->study->toArray();

      $dataStudies = [];

      array_push($dataStudies,[
        //  $profile->person->name." ".$profile->person->lastname,
        $study['profession'],
        $study['postgrad'],
        $study['phd']
      ]);

      $sheet->rows($dataStudies);


      $sheet->rows(array(
        ['']
      ));
      $dataComptroller = [];

      array_push($dataComptroller,[
        //  $profile->person->name." ".$profile->person->lastname,
        $profile->comptroller->processes
      ]);

      $sheet->rows($dataComptroller);

      $sheet->rows(array(
        ['']
      ));

      $dataPenals = [];

      array_push($dataPenals,[
        //  $profile->person->name." ".$profile->person->lastname,
        $this->getBooleanString($profile->hasPenals)
      ]);

      $sheet->rows($dataPenals);


      /**/
    })->export('csv');
  }


}
