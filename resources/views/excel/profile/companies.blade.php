<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Superintendencia de compañias</title>
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
          <td>{{($profile->companies()->where('position',1)->first() != null) ? $profile->companies()->where('position',1)->first()->total_companies : 0}}</td>
        </tr>
        <tr>
          <th>Presidente</th>
          <td>{{($profile->companies()->where('position',2)->first() != null) ? $profile->companies()->where('position',2)->first()->total_companies : 0}}</td>
        </tr>
        <tr>
          <th>Accionista</th>
          <td>{{($profile->companies()->where('position',3)->first() != null) ? $profile->companies()->where('position',3)->first()->total_companies : 0}}</td>
        </tr>
    </table>
  </body>
</html>
