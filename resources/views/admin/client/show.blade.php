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
                                        <input name="first_name" type="text" value="{{ $client->first_name }}" class="form-control" placeholder="Имя" required @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Фамилия</div>
                                        <input name="last_name" type="text" value="{{ $client->last_name }}" class="form-control" placeholder="Фамилия" required @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Организация</div>
                                        <input name="organization" type="text" value="{{ $client->organization }}" class="form-control" placeholder="Организация" required @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Почта</div>
                                        <input name="email" type="email" value="{{ $client->email }}" class="form-control" placeholder="Почта" required @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label required">Номер телефона</div>
                                        <input name="phone_number" type="text" value="{{ $client->phone_number }}" oninput="onPhoneNumberChange(event);" minlength="18" placeholder="+7 (000) 000 00 00" class="form-control" required @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Пароль</div>
                                        <input name="password" type="password" minlength="8" placeholder="Пароль" class="form-control" @cannot('client_update') readonly @endcan>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Доступ к платному контенту</div>
                                        <label class="form-check form-switch form-switch-lg">
                                            <input name="access_paid_content" value="0" type="hidden">
                                            <input name="access_paid_content" value="1" type="checkbox" class="form-check-input" {{ $client->access_paid_content == 1 ? 'checked' : null }} @cannot('client_update') disabled @endcan>
                                            <span class="form-check-label form-check-label-on">Включена</span>
                                            <span class="form-check-label form-check-label-off">Выключена</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">Доступ ко всему контенту</div>
                                        <label class="form-check form-switch form-switch-lg">
                                            <input name="close_all_content" value="0" type="hidden">
                                            <input name="close_all_content" value="1" type="checkbox" class="form-check-input" {{ $client->close_all_content == 1 ? 'checked' : null }} @cannot('client_update') disabled @endcan>
                                            <span class="form-check-label form-check-label-on">Включена</span>
                                            <span class="form-check-label form-check-label-off">Выключена</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row pe-0">
                                    <div class="d-flex gap-2">
                                        @can('client_delete')
                                            <a href="#" class="btn btn-outline-danger ms-auto" data-bs-toggle="modal" data-bs-target="#modal-delete">
                                                Удалить
                                            </a>
                                        @endcan
                                        @can('client_update')
                                            <button type="submit" class="btn btn-primary">
                                                Обновить
                                            </button>
                                        @endcan
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
                                        <th>Время</th>
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
                                            <td>
                                                {{ $log->created_at->format('d.m.Y H:i') }}
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

    @can('client_delete')
        <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <form action="{{ route('admin.clients.delete', $client) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        <div class="modal-status bg-danger"></div>
                        <div class="modal-body text-center py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 9v4"></path>
                                <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                                <path d="M12 16h.01"></path>
                            </svg>
                            <h3>Вы уверены?</h3>
                            <div class="text-secondary">Вы действительно хотите удалить аккаунт {{ $client->email }}? То, что вы сделали, уже не исправить.</div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                            Отмена
                                        </a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger w-100">
                                            Удалить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endcan
@endsection
