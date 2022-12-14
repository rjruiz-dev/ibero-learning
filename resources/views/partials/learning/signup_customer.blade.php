<!-- Si no existe la sesion login  -->
@if(!session('error-login'))
    <!-- Mostramos los errores de validacion del formulario de registro -->
    @include('partials.form_errors')
@endif

<form class="intro-newslatter text-center" action="{{ route('register' ) }}" method="POST">
    @csrf <!-- envia token para que laravel valide si es correcta  -->
    <input type="hidden" name="role" value="{{ \App\Models\User::STUDENT }}"/>
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <input 
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="{{ __("Nombre") }}" 
            />
            <input 
                type="text" 
                name="email"
                class="last-s" 
                value="{{ old('email') }}"
                placeholder="{{ __("Correo electrónico") }}"
            />
        </div>
        <div class="col-12 no-gutters"> <!-- ver clase si es necesaria -->
            <input 
                type="password"
                name="password" 
                placeholder="{{ __("Contraseña") }}"
            />
            <input 
                type="password" 
                name="password_confirmation" 
                class="last-s" 
                placeholder="{{ __("Confirma la contraseña") }}"
            />
        </div>
        <div class="col-lg-12 mt-3">
            <button type="submit" class="site-btn btn-block">{{ __("Crear cuenta") }}</button>
        </div>
    </div>
</form>
