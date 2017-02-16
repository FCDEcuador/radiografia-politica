<?php

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
 ?>
<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Superintendencia de compañías</title>
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
    <table class="border" >
      <tr>
        <th>Posición</th>
        <th>Compañía</th>
      </tr>
      @foreach($profile->companies as $i => $company)
      <tr>
        <td>{{getCompanyPosition($company->position)}}</td>
        <td >{{$company->name}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
