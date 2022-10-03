<!-- Si hay error de validacion en el formulario hacemos un loop y lo mostramos en un parrafo -->
@if($errors->any())
    <div class="form-errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif