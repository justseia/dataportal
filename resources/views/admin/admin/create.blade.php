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
                                <div class="mb-3">
                                    <label class="form-label required">Имя</label>
                                    <input name="first_name" type="text" class="form-control" placeholder="Название" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Фамилия</label>
                                    <input name="last_name" type="text" class="form-control" placeholder="Название" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Почта</label>
                                    <input name="email" type="text" class="form-control" placeholder="Название" required>
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
