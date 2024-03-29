{!! Form::open(['url' => '/Administracion/documentos/storeAfos',
                'autocomplete' => 'off',
                'files' => true]) !!}

  <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
  <br>
  <div class="form-group {{ $errors->has('naves') ? 'has-error' : ''}}">
          {!! Form::label('naves', 'Nave', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
              <select class="form-control input-sm" name="naves" id="naves">
                <option value=""></option>
                <option value="1">102</option>
                <option value="2">23A</option>
                <option value="3">TUNEL</option>
                <option value="4">2</option>
              </select>
              {!! $errors->first('naves', '<p class="help-block">:message</p>') !!}
          </div>
  </div>
  <br>

<!--
  <div class="form-group {{ $errors->has('PROYECTO') ? 'has-error' : ''}}">
          {!! Form::label('PROYECTO', 'Nombre del Proyecto', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-sm-6">
            {!! Form::text('Proyecto', null, [
                'class'                         => 'form-control input-sm',
                'placeholder'                   => 'Nombre del Proyecto',
                'required'                      => 'required',
                'id'                            => 'Proyecto',
                'data-parsley-required-message' => 'Este campo es importante',
                'data-parsley-trigger'          => 'change focusout',
            ]) !!}
              {!! $errors->first('PROYECTO', '<p class="help-block">:message</p>') !!}

          </div>
  </div>
  <br>
-->

  <div class="form-group {{ $errors->has('procesos') ? 'has-error' : ''}}">
          {!! Form::label('procesos', 'Proceso', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
            <select class="form-control input-sm" name="procesos" id="procesos">
              <option value=""></option>
              <option value="1">UB1</option>
              <option value="2">UB2</option>
              <option value="3">ANBAUTEILE</option>
              <option value="4">AUFBAU</option>
              <option value="5">COSTADOS</option>
              <option value="6">FINISH</option>
            </select>
              {!! $errors->first('procesos', '<p class="help-block">:message</p>') !!}
          </div>
  </div>
  <br>
  <div class="form-group {{ $errors->has('lineas') ? 'has-error' : ''}}">
          {!! Form::label('lineas', 'Lineas', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
            <select class="form-control input-sm" name="lineas" id="lineas">
              <option value=""></option>
            </select>
              {!! $errors->first('lineas', '<p class="help-block">:message</p>') !!}
          </div>
  </div>
  <br>
  <div class="form-group {{ $errors->has('afos') ? 'has-error' : ''}}">
          {!! Form::label('afos', 'Afo', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
            <select class="form-control input-sm" name="afos" id="afos">
              <option value=""></option>
            </select>
              {!! $errors->first('afos', '<p class="help-block">:message</p>') !!}
          </div>
  </div>
  <br>

  <div class="form-group {{ $errors->has('NOMBREPADRE') ? 'has-error' : ''}}">
          {!! Form::label('NOMBREPADRE', 'Nombre de la linea Padre', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
            <select class="form-control input-sm" name="NOMBREPADRE" id="NOMBREPADREC">
              <option value=""></option>
            </select>
            {{ $errors->first('NOMBREPADRE','<p class="help-block">:message</p>') }}
          </div>
  </div>
  <br>

  <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
          {!! Form::label('nombre', 'Nombre del Archivo', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
          <div class="col-md-6">
            {{ Form::text('nombre', null, array('class' => 'form-control','placeholder'=>'Nombre del Archivo')) }}
            {{ $errors->first('nombre','<p class="help-block">:message</p>') }}
          </div>
  </div>
  <br>

  <div class="form-group">
      {!! Form::label('Excel', 'Excel', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
      <div class="col-md-6">
        {{ Form::file('Excel', null, array('class' => 'form-control')) }}
      </div>
  </div>

  <div class="">
    <button class = 'btn btn-primary' onclick="validate()" type = "submit">Crear</button>
  </div>


{!! Form::close() !!}

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

     var afos = $('#afos');
     if (afos.val() === '') {
         alert("Selecciona una opción en Afo.");
         $('#afos').focus();
         return false;
     }

     var nombrepadre = $('#NOMBREPADRE');
     if (nombrepadre.val() === '') {
         alert("Selecciona una opción en Linea Padre.");
         $('#NOMBREPADRE').focus();
         return false;
     }

     if (naves.val() != '' && procesos.val() != '' && lineas.val() != '' && afos.val() != '' && nombrepadre.val() != '') {
       //window.alert("todo esta bien");
       UpdateDatoAfo();
     }

     else return;

  }
</script>
