@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row mb-3">
                    <div class="card p-3">
                        <form action="#" method="GET">
                            <div class="row gy-2 mb-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Имя</label>
                                    <input name="first_name" type="text" class="form-control" value="{{ request('first_name') }}" placeholder="Имя">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Фамилия</label>
                                    <input name="last_name" type="text" class="form-control" value="{{ request('last_name') }}" placeholder="Фамилия">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Организация</label>
                                    <input name="organization" type="text" class="form-control" value="{{ request('organization') }}" placeholder="Организация">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Почта</label>
                                    <input name="email" type="text" class="form-control" value="{{ request('email') }}" placeholder="Почта">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Номер телефона</label>
                                    <input name="phone_number" type="text" value="{{ request('phone_number') }}" oninput="onPhoneNumberChange(event);" minlength="18" placeholder="+7 (000) 000 00 00" class="form-control">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Тип клиента</label>
                                    <select name="client_type" class="form-select">
                                        <option value="" selected>Выберите тип</option>
                                        @foreach($clientTypes as $clientType)
                                            <option value="{{ $clientType->id }}" {{ request('client_type') == $clientType->id ? 'selected' : null }}>{{ $clientType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row pe-0">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Принять фильтр
                                    </button>
                                    <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-warning">
                                        Снять фильтр
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <h2 class="page-title">Пользователи</h2>
                    </div>
                    <div class="col d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Создать пользователя</a>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
                                        <th>Организация</th>
                                        <th>Почта</th>
                                        <th>Номер телефона</th>
                                        <th>Тип клиента</th>
                                        <th>Платный контент</th>
                                        <th>Все контент</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr class="cursor-pointer position-relative" onmouseover="addClassPointer(this)" onmouseout="removeClassPointer(this)">
                                            <td>
                                                <a href="{{ route('admin.clients.show', $client) }}" class="stretched-link text-decoration-none text-reset">
                                                    {{ $client->first_name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $client->last_name }}
                                            </td>
                                            <td>
                                                {{ $client->organization }}
                                            </td>
                                            <td>
                                                {{ $client->email }}
                                            </td>
                                            <td>
                                                {{ $client->phone_number }}
                                            </td>
                                            <td>
                                                {{ $client->clientType?->type }}
                                            </td>
                                            <td>
                                                {!! $client->accessPaidContent() !!}
                                            </td>
                                            <td>
                                                {!! $client->closeAllContent() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $clients->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
