@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <h2 class="page-title">Роли</h2>
                    </div>
                    <div class="col d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Создать роль</a>
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
                                        <th>Почта</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr class="cursor-pointer position-relative" onmouseover="addClassPointer(this)" onmouseout="removeClassPointer(this)">
                                            <td>
                                                <a href="{{ route('admin.admins.show', $admin) }}" class="stretched-link text-decoration-none text-reset">
                                                    {{ $admin->first_name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $admin->last_name }}
                                            </td>
                                            <td>
                                                {{ $admin->email }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $admins->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
