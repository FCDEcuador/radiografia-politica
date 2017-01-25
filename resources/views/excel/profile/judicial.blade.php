<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Antecedentes Judicales</title>
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
        <td colspan="2">Actor</td>
      </tr>
    </table>
    <br>
    <table class="border" >
        <tr>
          <th>Tipo de juicio</th>
          <th>Cantidad</th>
        </tr>
        @foreach($profile->judicials()->where('type',1)->get() as $judgment)
        <tr>
          <td style="text-align:left;">{{$judgment->judgmentType->name}}</td>
          <td style="text-align:center;">{{$judgment->number}}</td>
        </tr>
        @endforeach
        </tr>
    </table>
    <br>
    <table>
      <tr>
      <td colspan="2">Demandado</td>
      </tr>
    </table>
    <br>
    <table class="border" >

        <tr>
          <th>Tipo de juicio</th>
          <th>Cantidad</th>
        </tr>

        @foreach($profile->judicials()->where('type',2)->get() as $judgment)
        <tr>
          <td style="text-align:left;">{{$judgment->judgmentType->name}}</td>
          <td style="text-align:center;">{{$judgment->number}}</td>
        </tr>
        @endforeach

    </table>
  </body>
</html>
