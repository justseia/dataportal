@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row mb-3">
                    <div class="row h2 mb-2">Пользователь</div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-label required">Имя</div>
                                        <input name="first_name" type="text" value="{{ $client->first_name }}" class="form-control" placeholder="Имя">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Фамилия</div>
                                        <input name="last_name" type="text" value="{{ $client->last_name }}" class="form-control" placeholder="Фамилия">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Организация</div>
                                        <input name="organization" type="text" value="{{ $client->organization }}" class="form-control" placeholder="Организация">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Почта</div>
                                        <input name="email" type="email" value="{{ $client->email }}" class="form-control" placeholder="Почта">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Номер телефона</div>
                                        <input name="phone_number" type="text" value="{{ $client->phone_number }}" oninput="onPhoneNumberChange(event);" minlength="18" placeholder="+7 (000) 000 00 00" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Пароль</div>
                                        <input name="password" type="password" minlength="8" placeholder="Пароль" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Доступ к платному контенту</div>
                                        <label class="form-check form-switch form-switch-lg">
                                            <input name="access_paid_content" value="0" type="hidden">
                                            <input name="access_paid_content" value="1" type="checkbox" class="form-check-input" {{ $client->access_paid_content == 1 ? 'checked' : null }}>
                                            <span class="form-check-label form-check-label-on">Включена</span>
                                            <span class="form-check-label form-check-label-off">Выключена</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Доступ ко всему контенту</div>
                                        <label class="form-check form-switch form-switch-lg">
                                            <input name="close_all_content" value="0" type="hidden">
                                            <input name="close_all_content" value="1" type="checkbox" class="form-check-input" {{ $client->close_all_content == 1 ? 'checked' : null }}>
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
                                            Обновить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row h3 mb-2">Действие</div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Значение</th>
                                        <th>Тип</th>
                                        <th>Ссылка</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityLogs as $log)
                                        <tr class="cursor-pointer position-relative" onmouseover="addClassPointer(this)" onmouseout="removeClassPointer(this)">
                                            <td>
                                                {{ $log->value }}
                                            </td>
                                            <td>
                                                {{ $log->type }}
                                            </td>
                                            <td>
                                                {{ $log->link }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $activityLogs->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
