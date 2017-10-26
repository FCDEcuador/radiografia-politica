<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formación Académica</title>
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
          <th>Título</th>
          <td>{{$profile->study->profession}}</td>
        </tr>
        <tr>
          <th>Títulos de cuarto nivel</th>
          <td>{{$profile->study->postgrad}}</td>
        </tr>
        <tr>
          <th>Títulos de cuarto nivel</th>
          <td>{{$profile->study->phd}}</td>
        </tr>
    </table>
  </body>
</html>
