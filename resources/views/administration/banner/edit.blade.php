@extends('layouts.admin')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Candidatos Controloría General
      <small>Drafts</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Perfiles</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <form action="{{url(route('banner.update',1))}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

          <!-- /.box-header -->
          <div class="box-body">
          <div class="col-md-12">
          <div class="form-group">
                <div class="table">
                <label for="photo">Imagen Banner</label><br>
                <input type="file" name="photo" placeholder="50x50">
              </div>
              </div>
          </div>
          <div class="box-footer">
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>

      </div>



          </form>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p id="modal-question"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="modal-ok-btn">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
    <script>
    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('whatever') // Extract info from data-* attributes
      var description = button.data('description');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('#modal-question').html("¿Desea eliminar <b>" + description + "</b>?");
      modal.find('#modal-ok-btn').click(function(){
        $.ajax({
          url: "{{url('/administration/profile').'/'}}" + id,
          type:"post",
          cache: false,
          data: {_method: 'delete', _token: "{{ csrf_token() }}"},
          success:function(res)
          {
            console.log(res);
            location.reload();
          },
          error: function(error)
          {
            if(JSON.parse(error.responseText).message = "Not authorized.")
            {
              swal("Error", "No tiene autorización", "error");
            }
          }
        });
      });
    });

    $('#myModal').on('hidden.bs.modal', function (e) {
      $(this).find('#modal-ok-btn').unbind('click');
    });
    </script>
@endsection
