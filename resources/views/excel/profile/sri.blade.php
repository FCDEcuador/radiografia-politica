<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SRI Impuestos</title>
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
    <table>
      <tr>
        <td colspan="2">Impuesto a la Renta</td>
      </tr>
    </table>
    <br>
    <table border="1" class="border">

      <tr>
        <th>Año</th>
        <th>Impuesto</th>
      </tr>
      @foreach($profile->sri()->where('taxType',1)->orderBy('year','desc')->get() as $sri)
        <tr>
          <td>{{$sri->year}}</td>
          <td>${{$sri->value}}</td>
        </tr>
      @endforeach
    </table>
    <br>
    <table>
      <tr>
      <td colspan="2">Impuesto a la Salida de Divisas</td>
      </tr>
    </table>
    <br>
    <table border="1" class="border">

      <tr>
        <th>Año</th>
        <th>Impuesto</th>
      </tr>
      @foreach($profile->sri()->where('taxType',2)->orderBy('year','desc')->get() as $sri)
        <tr>
          <td>{{$sri->year}}</td>
          <td>${{$sri->value}}</td>
        </tr>
      @endforeach
    </table>
  </body>
</html>
