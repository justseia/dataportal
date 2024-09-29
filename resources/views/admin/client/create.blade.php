@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row">
                    <h2 class="page-title">Создать пользователя</h2>
                    <div class="page-body">
                        <div class="card">
                            <div class="card-body">
                                <form id="create-user" action="{{ route('admin.clients.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-label required">Имя</div>
                                            <input name="first_name" type="text" class="form-control" placeholder="Имя" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label required">Фамилия</div>
                                            <input name="last_name" type="text" class="form-control" placeholder="Фамилия" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label required">Организация</div>
                                            <input name="organization" type="text" class="form-control" placeholder="Организация" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label required">Почта</div>
                                            <input name="email" type="email" class="form-control" placeholder="Почта" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label required">Номер телефона</div>
                                            <input name="phone_number" type="text" oninput="onPhoneNumberChange(event);" minlength="18" placeholder="+7 (000) 000 00 00" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label required">Пароль</div>
                                            <input name="password" type="password" minlength="8" placeholder="Пароль" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label">Доступ к платному контенту</div>
                                            <label class="form-check form-switch form-switch-lg">
                                                <input name="access_paid_content" value="0" type="hidden">
                                                <input name="access_paid_content" value="1" type="checkbox" class="form-check-input" {{ old('access_paid_content') == 1 ? 'checked' : null }}>
                                                <span class="form-check-label form-check-label-on">Включена</span>
                                                <span class="form-check-label form-check-label-off">Выключена</span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label">Доступ ко всему контенту</div>
                                            <label class="form-check form-switch form-switch-lg">
                                                <input name="close_all_content" value="0" type="hidden">
                                                <input name="close_all_content" value="1" type="checkbox" class="form-check-input" {{ old('close_all_content') == 1 ? 'checked' : null }}>
                                                <span class="form-check-label form-check-label-on">Включена</span>
                                                <span class="form-check-label form-check-label-off">Выключена</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row pe-0">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-warning ms-auto">
                                                Назад
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                Создать
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
