<?php

function getTypeEvent($id)
{
  switch ($id) {
    case '1':
      return "Función Pública";
    case '2':
        return "Función Privada";
    case '3':
        return "Actividad Política";
    default:
      return "";
  }
}

 ?>
<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Timeline</title>
    <style type="text/css">
      .border > tr > th{
        font-weight: bold;
      }
      .border > tr > td,.border > tr > th {
        border: 1px solid #000000;
      }
    </style>
  </head>
  <body>
    <table border="1" class="border">
      <tr>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Actividad/Fución</th>
      </tr>
      @foreach($profile->person->timelines()->orderBy('start')->get() as $timeline)
        <tr>
          <td>{{$timeline->start}}</td>
          <td>{{$timeline->end}}</td>
          <td>{{$timeline->shortDescription}}</td>
          <td>{{strip_tags($timeline->description)}}</td>
          <td>{{getTypeEvent($timeline->typeEvent)}}</td>
        </tr>
      @endforeach
    </table>
  </body>
</html>
