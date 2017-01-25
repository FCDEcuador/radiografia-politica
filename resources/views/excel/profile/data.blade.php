<!Doctype>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Datos Personales</title>
  </head>
  <body>
    <table border="1">
      <col width="50%">
      <col width="50%">
      <tr>
         <!-- <td colspan="2"><img src="{{url($profile->person->img)}}" style="width:100%;"/></td>  -->
        <td colspan="2" style="text-align:center;"><img src="{{public_path().$profile->person->img}}" width="150px" height="auto"/></td>
      </tr>
      <tr>
        <td style="width:50;"><b>Nombre</b></td>
        <td>{{$profile->person->name}}</td>
      </tr>
      <tr>
        <td><b>Apellido</b></td>
        <td>{{$profile->person->lastname}}</td>
      </tr>
      <tr>
        <td><b>Twitter</b></td>
        <td>{{'@'}}{{$profile->person->twitter}}</td>
      </tr>
      <tr>
        <td><b>Facebook</b></td>
        <td>{{$profile->person->facebook}}</td>
      </tr>
      <tr>
        <td><b>Descripción</b></td>
        <td>{!! $profile->person->description !!}</td>
      </tr>
    </table>
  </body>
</html>
