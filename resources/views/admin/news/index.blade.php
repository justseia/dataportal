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
                                    <label class="form-label">Заголовок</label>
                                    <input name="title" type="text" class="form-control" value="{{ request('title') }}" placeholder="Заголовок">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label">Описание</label>
                                    <input name="description" type="text" class="form-control" value="{{ request('description') }}" placeholder="Описание">
                                </div>
                            </div>
                            <div class="row pe-0">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Принять фильтр
                                    </button>
                                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-warning">
                                        Снять фильтр
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <div class="page-title" style="font-size: 16px;">
                            <div aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Публикации</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Создать публикации</a>
                    </div>
                </div>
                <div class="row gy-3 mb-4">
                    @foreach ($news as $item)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ route('admin.news.show', $item) }}" class="text-decoration-none text-reset">
                                <div class="card">
                                    <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url({{ config('app_config.image_url') . $item->image }});"></div>
                                    <div class="card-body">
                                        <h3 class="card-title text-one-line">{{ $item->title }}</h3>
                                        <p class="text-secondary text-two-line">{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        {{ $news->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
