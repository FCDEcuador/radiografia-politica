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
          <th>Gerente</th>
          <td>{{$profile->companies()->where('position',1)->count() }}</td>
        </tr>
        <tr>
          <th>Presidente</th>
          <td>{{$profile->companies()->where('position',2)->count() }}</td>
        </tr>
        <tr>
          <th>Accionista</th>
          <td>{{$profile->companies()->where('position',3)->count() }}</td>
        </tr>
    </table>
  </body>
</html>
