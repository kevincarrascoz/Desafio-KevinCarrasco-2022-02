<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('artista_id') }}
            {{ Form::select('artista_id', $artistas, $album->artista_id, ['class' => 'form-control' . ($errors->has('artista_id') ? ' is-invalid' : ''), 'placeholder' => 'Artista Id']) }}
            {!! $errors->first('artista_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $album->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::file('foto', $album->foto, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaLanzamiento') }}
            {{ Form::date('fechaLanzamiento', $album->fechaLanzamiento, ['class' => 'form-control' . ($errors->has('fechaLanzamiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechalanzamiento']) }}
            {!! $errors->first('fechaLanzamiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>