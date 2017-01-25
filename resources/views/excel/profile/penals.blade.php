<?php
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
?>
<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Antecedentes Penales</title>
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
          <th>Antecedentes Penal</th>
          <td>{{getBooleanString($profile->hasPenals)}}</td>
        </tr>
    </table>
  </body>
</html>
