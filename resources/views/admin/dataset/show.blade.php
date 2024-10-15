@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <h2 class="page-title">Тема</h2>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="card p-3">
                        <form action="{{ route('admin.datasets.update', $theme) }}" method="POST">
                            @csrf
                            <div class="row gy-2 mb-3">
                                <div class="col-12">
                                    <label class="form-label">Тема</label>
                                    <input name="title" type="text" class="form-control" value="{{ $theme->title }}" placeholder="Тема" required>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Год</label>
                                    <select name="year_id" class="form-select" required>
                                        <option value="" selected>Выберите год</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}" {{ $theme->year_id == $year->id ? 'selected' : null }}>{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Доступ</label>
                                    <label class="form-check form-switch form-switch-lg">
                                        <input name="access_paid_content" value="0" type="hidden">
                                        <input name="access_paid_content" value="1" type="checkbox" class="form-check-input" {{ old('access_paid_content') == 1 ? 'checked' : null }}>
                                        <span class="form-check-label form-check-label-on">Платный доступ</span>
                                        <span class="form-check-label form-check-label-off">Открытый доступ</span>
                                    </label>
                                </div>
                            </div>
                            <hr/>
                            <div class="row gy-3 mb-3">
                                @foreach($theme->questions as $index => $question)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label class="form-label">{{ $index + 1 }}. Вопрос</label>
                                                        <div >{{ $question->title }}</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-check form-switch form-switch-lg">
                                                            <input name="access_paid_content[{{ $question->id }}]" value="0" type="hidden">
                                                            <input name="access_paid_content[{{ $question->id }}]" value="1" type="checkbox" class="form-check-input" {{ old('access_paid_content') == 1 ? 'checked' : null }}>
                                                            <span class="form-check-label form-check-label-on">Платный доступ</span>
                                                            <span class="form-check-label form-check-label-off">Открытый доступ</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row pe-0">
                                <div class="d-flex gap-2">
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
@endsection
