@extends('layouts.admin')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Вход в ваш аккаунт</h2>
                    <form action="{{ route('admin.auth.login') }}" method="POST" autocomplete="off" novalidate="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Адрес электронной почты</label>
                            <input name="email" type="email" value="{{ old('email') }}" tabindex="1" class="form-control" placeholder="your@email.com" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Пароль
                            </label>
                            <div class="input-group input-group-flat">
                                <input id="passwordField" name="password" type="password" tabindex="2" class="form-control" placeholder="Ваш пароль" autocomplete="off">
                                <span class="input-group-text">
                                    <a id="togglePasswordVisibility" href="#" tabindex="-1" class="link-secondary" data-bs-toggle="tooltip" onclick="togglePasswordVisibility()" aria-label="Показать или скрыть пароль" data-bs-original-title="Показать или скрыть пароль">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input name="remember_me" type="checkbox" tabindex="3" class="form-check-input" {{ old('remember_me') ? 'checked' : null }}>
                                <span class="form-check-label">Запомнить на этом устройстве</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" tabindex="4" class="btn btn-primary w-100">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('passwordField');
            const togglePasswordVisibility = document.getElementById('togglePasswordVisibility');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordVisibility.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                        <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                        <path d="M3 3l18 18" />
                    </svg>`;

            } else {
                passwordField.type = 'password';
                togglePasswordVisibility.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                    </svg>`;
            }
        }
    </script>
@endsection
