<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Declaración Patrimonial</title>
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
        <th>Inmuebles</th>
        <th>Vehículos</th>
        <th>Patrimonio</th>
        <th>Compañias</th>
      </tr>
      <tr>
        <td>{{$profile->heritage->houses}}</td>
        <td>{{$profile->heritage->cars}}</td>
        <td>${{$profile->heritage->money}}</td>
        <td>{{$profile->heritage->companies}}</td>
      </tr>
    </table>
    <br>
    <table border="1" class="border">
      <thead>
        <tr>
          <th></th>
          @if(($profile->heritage->actualDeclaration)!= 0)
          <th>Declaración Actual</th>
          @endif
          @if(($profile->heritage->previousDeclaration)!= 0)
          <th>Declaración Previa</th>
          @endif
        </tr>
      </thead>
      <tr>
        <th>Fecha de declaración</th>
        @if(($profile->heritage->actualDeclaration)!= 0)
        <td>{{$profile->heritage->actualDeclaration}}</td>
        @endif
        @if(($profile->heritage->previousDeclaration)!= 0)
        <td>{{$profile->heritage->previousDeclaration}}</td>
        @endif

      </tr>
      <tr>
        <th>Activos</th>
        @if(($profile->heritage->actualDeclaration)!= 0)
        <td>${{$profile->heritage->actualAssets}}</td>
        @endif
        @if(($profile->heritage->previousDeclaration)!= 0)
        <td>${{$profile->heritage->previousAssets}}</td>
        @endif
      </tr>
      <tr>
        <th>Pasivos</th>
        @if(($profile->heritage->actualDeclaration)!= 0)
        <td>${{$profile->heritage->actualLiabilities}}</td>
        @endif
        @if(($profile->heritage->previousDeclaration)!= 0)
        <td>${{$profile->heritage->previousLiabilities}}</td>
        @endif
      </tr>
      <tr>
        <th>Patrimonio</th>
        @if(($profile->heritage->actualDeclaration)!= 0)
        <td>${{$profile->heritage->actualHeritage}}</td>
        @endif
        @if(($profile->heritage->previousDeclaration)!= 0)
        <td>${{$profile->heritage->previousHeritage}}</td>
        @endif
      </tr>
    </table>
  </body>
</html>
