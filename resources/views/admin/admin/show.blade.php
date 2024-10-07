@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.admins.update', $admin) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Имя</label>
                                        <input name="first_name" type="text" value="{{ $admin->first_name }}" class="form-control" placeholder="Имя" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Фамилия</label>
                                        <input name="last_name" type="text" value="{{ $admin->last_name }}" class="form-control" placeholder="Фамилия" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label required">Почта</label>
                                        <input name="email" type="email" value="{{ $admin->email }}" class="form-control" placeholder="Почта" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label">Пароль</label>
                                        <input name="password" type="password" minlength="8" class="form-control" placeholder="Пароль">
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
                                                                <input name="permissions[]" value="{{ $key }}" class="form-check-input" type="checkbox" {{ $admin->can($key) ? 'checked' : null }}>
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
                                        @can('admin_delete')
                                            <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete">
                                                Удалить
                                            </a>
                                        @endcan
                                        <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-warning ms-auto">
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
            </div>
        </div>
    </div>

    @can('admin_delete')
        <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <form action="{{ route('admin.admins.delete', $admin) }}" method="POST">
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
                            <div class="text-secondary">Вы действительно хотите удалить аккаунт {{ $admin->email }}? То, что вы сделали, уже не исправить.</div>
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
