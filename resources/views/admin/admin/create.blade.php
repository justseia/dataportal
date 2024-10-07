@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.admins.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Имя</label>
                                        <input name="first_name" type="text" value="{{ old('first_name') }}" class="form-control" placeholder="Имя" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Фамилия</label>
                                        <input name="last_name" type="text" value="{{ old('last_name') }}" class="form-control" placeholder="Фамилия" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Почта</label>
                                        <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Почта" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Пароль</label>
                                        <input name="password" type="password" minlength="8" class="form-control" placeholder="Пароль" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Доступ</label>
                                        <div class="row">
                                            @foreach($permissionTypes as $permissionType)
                                                <div class="col-md-3 mb-3">
                                                    <div class="card card-body">
                                                        @foreach($permissionType as $key => $permission)
                                                            <label class="form-check">
                                                                <input name="permissions[]" value="{{ $key }}" class="form-check-input" type="checkbox" {{ in_array($key, old('permissions', [])) ? 'checked' : null }}>
                                                                <span class="form-check-label">{{ $permission }}</span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row pe-0">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-warning ms-auto">
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
@endsection
