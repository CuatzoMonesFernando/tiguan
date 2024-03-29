<style>

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 64px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .span {
      color: black;
      text-decoration: underline;
    }

</style>
<!-- The Modal -->
  <div class="modal fade" id="EditarDatoTransporte">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <form id="EditarForm" method="post" autocomplete="off">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">Cancelar</button>
        </div>

        @can('Editar_Dato')
        <!-- Modal body -->
        <div class="modal-body">
          <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
          <input type="hidden" name="id" value="" id="id">

          <br>

          <div class="form-group {{ $errors->has('naves') ? 'has-error' : ''}}">
                  {!! Form::label('naves', 'Nave', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                  <div class="col-md-6">
                      <select class="form-control input-sm" name="naves" id="naves" required="">
                        <option value=""></option>
                        <option value="1">102</option>
                        <option value="2">23A</option>
                        <option value="3">TUNEL</option>
                        <option value="4">2</option>
                      </select>
                      {!! $errors->first('naves', '<p class="help-block">:message</p>') !!}
                      <div class="">
                          <p id="errornaves"></p>
                      </div>
                  </div>
          </div>
          <br>
          <div class="form-group {{ $errors->has('PROYECTO') ? 'has-error' : ''}}">
                  {!! Form::label('PROYECTO', 'Nombre del Proyecto', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                  <div class="col-sm-6">
                    {!! Form::text('PROYECTO', null, [
                        'class'                         => 'form-control input-sm',
                        'placeholder'                   => 'Nombre del Proyecto',
                        'required',
                        'id'                            => 'PROYECTO',
                        'data-parsley-required-message' => 'Este campo es importante',
                        'data-parsley-trigger'          => 'change focusout',
                    ]) !!}
                      {!! $errors->first('PROYECTO', '<p class="help-block">:message</p>') !!}

                  </div>
          </div>
          <br>
          <div class="form-group {{ $errors->has('procesos') ? 'has-error' : ''}}">
                  {!! Form::label('procesos', 'Proceso', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                  <div class="col-md-6">
                    <select class="form-control input-sm" name="procesos" id="procesos" onchange="procesosEditarSelect()" required="">
                      <option value=""></option>
                      <option value="1">UB1</option>
                      <option value="2">UB2</option>
                      <option value="3">ANBAUTEILE</option>
                      <option value="4">AUFBAU</option>
                      <option value="5">COSTADOS</option>
                      <option value="6">FINISH</option>
                      <option value="7">TRANSPORTE N102</option>
                      <option value="8">TRANSPORTE EXTERNO</option>
                    </select>
                      {!! $errors->first('procesos', '<p class="help-block">:message</p>') !!}
                      <div class="">
                          <p id="errorproceso"></p>
                      </div>
                  </div>
          </div>
          <br>
          <div class="form-group {{ $errors->has('lineas') ? 'has-error' : ''}}">
                      {!! Form::label('lineas', 'Lineas', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        <select class="form-control input-sm" name="lineas" id="lineas" onchange="lineasEditarSelect()"  disabled="" required="" >
                          <option value=""></option>
                        </select>
                          {!! $errors->first('lineas', '<p class="help-block">:message</p>') !!}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('afos') ? 'has-error' : ''}}">
                      {!! Form::label('afos', 'Afo', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        <select class="form-control input-sm" name="afos" id="afos">
                          <option value=""></option>
                        </select>
                          {!! $errors->first('afos', '<p class="help-block">:message</p>') !!}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NOMBREPADRE') ? 'has-error' : ''}}">
                      {!! Form::label('NOMBREPADRE', 'Nombre de la linea Padre', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        <select class="form-control input-sm" name="NOMBREPADRE" id="NOMBREPADRE" disabled="" required="" >
                          <option value=""></option>
                        </select>
                        {{ $errors->first('NOMBREPADRE','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('MODELOBEMIPADRE') ? 'has-error' : ''}}">
                      {!! Form::label('MODELOBEMIPADRE', 'MODELO PADRE', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('MODELOBEMIPADRE', null, array('class' => 'form-control','placeholder'=>'MODELOBEMIPADRE', 'required')) }}
                        {{ $errors->first('MODELOBEMIPADRE','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('DESCRIPCION') ? 'has-error' : ''}}">
                      {!! Form::label('DESCRIPCION', 'Descripción del Padre', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('DESCRIPCION', null, array('class' => 'form-control','placeholder'=>'DESCRIPCION')) }}
                        {{ $errors->first('DESCRIPCION','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('CANTPADRES') ? 'has-error' : ''}}">
                      {!! Form::label('CANTPADRES', 'CANT. PADRES', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('CANTPADRES', null, array('class' => 'form-control','placeholder'=>'CANTPADRES')) }}
                        {{ $errors->first('CANTPADRES','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NOMBREEQUIPO') ? 'has-error' : ''}}">
                      {!! Form::label('NOMBREEQUIPO', 'NOMBRE DEL EQUIPO/ Elemento', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('NOMBREEQUIPO', null, array('class' => 'form-control','placeholder'=>'NOMBREEQUIPO')) }}
                        {{ $errors->first('NOMBREEQUIPO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('MAXIMO') ? 'has-error' : ''}}">
                      {!! Form::label('MAXIMO', '# VW', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('MAXIMO', null, array('class' => 'form-control','placeholder'=>'MAXIMO')) }}
                        {{ $errors->first('MAXIMO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('MARCAEQUIPO') ? 'has-error' : ''}}">
                      {!! Form::label('MARCAEQUIPO', 'Marca Equipo / Elemento', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('MARCAEQUIPO', null, array('class' => 'form-control','placeholder'=>'MARCAEQUIPO')) }}
                        {{ $errors->first('MARCAEQUIPO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('TYPE') ? 'has-error' : ''}}">
                      {!! Form::label('TYPE', 'Modelo del Equipo', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('TYPE', null, array('class' => 'form-control','placeholder'=>'TYPE')) }}
                        {{ $errors->first('TYPE','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NUMSERIE') ? 'has-error' : ''}}">
                      {!! Form::label('NUMSERIE', '# de Serie (Fabr. Nr.)', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('NUMSERIE', null, array('class' => 'form-control','placeholder'=>'NUMSERIE')) }}
                        {{ $errors->first('NUMSERIE','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('DESCRIPCIONCOMPLEMENTARIA') ? 'has-error' : ''}}">
                      {!! Form::label('DESCRIPCIONCOMPLEMENTARIA', 'DESCRIPCION COMPLEMENTARIA', ['class' => 'col-md-4 control-label span', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('DESCRIPCIONCOMPLEMENTARIA', null, array('class' => 'form-control','placeholder'=>'DESCRIPCIONCOMPLEMENTARIA')) }}
                        {{ $errors->first('DESCRIPCIONCOMPLEMENTARIA','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('CANTELEMENTO') ? 'has-error' : ''}}">
                      {!! Form::label('CANTELEMENTO', 'Cantidad de Elemento', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('CANTELEMENTO', null, array('class' => 'form-control','placeholder'=>'CANTELEMENTO')) }}
                        {{ $errors->first('CANTELEMENTO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NOMENCLATURA') ? 'has-error' : ''}}">
                      {!! Form::label('NOMENCLATURA', 'Nomenclatura', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('NOMENCLATURA', null, array('class' => 'form-control','placeholder'=>'NOMENCLATURA')) }}
                        {{ $errors->first('NOMENCLATURA','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NUMTABLERO') ? 'has-error' : ''}}">
                      {!! Form::label('NUMTABLERO', '# de Tablero', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('NUMTABLERO', null, array('class' => 'form-control','placeholder'=>'NUMTABLERO')) }}
                        {{ $errors->first('NUMTABLERO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('OBSERVACIONES') ? 'has-error' : ''}}">
                      {!! Form::label('OBSERVACIONES', 'Observaciones', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('OBSERVACIONES', null, array('class' => 'form-control','placeholder'=>'OBSERVACIONES')) }}
                        {{ $errors->first('OBSERVACIONES','<p class="help-block">:message</p>') }}
                      </div>
              </div>
              <br>

              <div class="form-group {{ $errors->has('NUMINVENTARIO') ? 'has-error' : ''}}">
                      {!! Form::label('NUMINVENTARIO', '#de Inventario', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
                      <div class="col-md-6">
                        {{ Form::text('NUMINVENTARIO', null, array('class' => 'form-control','placeholder'=>'NUMINVENTARIO')) }}
                        {{ $errors->first('NUMINVENTARIO','<p class="help-block">:message</p>') }}
                      </div>
              </div>
          <br>

          <div class="modal-footer">
            <button type="button" name="button" value="" class="btn btn-primary" onclick="validate();">Actualizar</button>
          </div>

        </div>

        @else
        <div class="modal-body">
          <div class="content">
              <div class="title m-b-md">
                  No Autorizado
              </div>
          </div>
        </div>
        @endcan

        <!-- Modal footer -->


        </form>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function validate(){
       var naves = $('#naves');
       if (naves.val() === '') {
           alert("Selecciona una opción en nave.");
           $('#naves').focus();
           return false;
       }

       var procesos = $('#procesos');
       if (procesos.val() === '') {
           alert("Selecciona una opción en Proceso.");
           $('#procesos').focus();
           return false;
       }

       var lineas = $('#lineas');
       if (lineas.val() === '') {
           alert("Selecciona una opción en Linea.");
           $('#lineas').focus();
           return false;
       }

       var nombrepadre = $('#NOMBREPADRE');
       if (nombrepadre.val() === '') {
           alert("Selecciona una opción en Linea Padre.");
           $('#NOMBREPADRE').focus();
           return false;
       }

       if (naves.val() != '' && procesos.val() != '' && lineas.val() != '' && nombrepadre.val() != '') {
         //window.alert("todo esta bien");
         UpdateDatoTransporte();
       }

       else return;

    }
  </script>
