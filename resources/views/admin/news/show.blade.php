@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.news.update', $news) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Заголовок</label>
                                    <input name="title" type="text" value="{{ $news->title }}" class="form-control" placeholder="Заголовок" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Описание</label>
                                    <textarea name="description" class="form-control" data-bs-toggle="autosize" rows="5" placeholder="Описание" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start;" required>{{ $news->description }}</textarea>
                                </div>
                                <div class="row pe-0">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-warning ms-auto">
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
@endsection
