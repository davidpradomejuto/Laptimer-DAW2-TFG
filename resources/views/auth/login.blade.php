@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        overflow: hidden;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('img/loginBackground.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        filter: blur(5px);
        z-index: -1;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9);
    }
    .card-header {
        background-color: var(--primary-color-1);
        color: white;
        text-align: center;
    }
    .btn-primary {
        background-color: var(--primary-color-1);
        border: none;
    }
    .btn-primary:hover {
        background-color: var(--primary-color-1);
    }
    .form-check-input:checked {
        background-color:var(--primary-color-1);
        border-color: var(--primary-color-1);
    }
    .logo {
        display: block;
        margin: 0 auto 20px;
        width: 100%;
        max-width: 300px;
    }

    @media (max-width: 576px) {
        .card {
            width: 100%;
            margin: 10px;
        }
        .logo {
            max-width: 200px;
        }
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
                </div>
                <div class="card-body">
                    <div class="row mb-3 text-center">
                        <h2>{{ __('Login') }}</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <a href="{{route('register')}}">No tienes cuenta? {{ __('Register') }}</a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>