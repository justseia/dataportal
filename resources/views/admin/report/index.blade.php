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
                                    <label class="form-label">Тип</label>
                                    <select name="actionType" class="form-select">
                                        <option value="" selected>Выберите тип</option>
                                        @foreach($actionTypes as $key => $actionType)
                                            <option value="{{ $key }}" {{ request('typeAction') == $key ? 'selected' : null }}>{{ $actionType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Значение</label>
                                    <input name="value" type="text" class="form-control" value="{{ request('value') }}" placeholder="Почта">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">C</label>
                                    @include('components.input-date', ['id' => 'date-from', 'name' => 'date-from', 'value' => request('date-from')])
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">До</label>
                                    @include('components.input-date', ['id' => 'date-to', 'name' => 'date-to', 'value' => request('date-to')])
                                </div>
                            </div>
                            <div class="row pe-0">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Принять фильтр
                                    </button>
                                    <a href="{{ route('admin.reports.index') }}" class="btn btn-outline-warning">
                                        Снять фильтр
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <h2 class="page-title">Отчет</h2>
                    </div>
                    <div class="col d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Сгенирировать отчет</a>
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
                                        <th>Действие</th>
                                        <th>Значение</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                        <tr class="cursor-pointer position-relative" onmouseover="addClassPointer(this)" onmouseout="removeClassPointer(this)">
                                            <td>
                                                <a href="{{ route('admin.clients.show', $report->client_id) }}" class="stretched-link text-decoration-none text-reset">
                                                    {{ $report->client->first_name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $report->client->first_name }}
                                            </td>
                                            <td>
                                                {{ $report->type }}
                                            </td>
                                            <td>
                                                {{ $report->value }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $reports->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
