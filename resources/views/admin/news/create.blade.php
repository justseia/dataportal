@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-body d-print-none">
            <div class="container-xl">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Изображение</label>
                                    <input name="image" type="file" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Заголовок</label>
                                    <input name="title" type="text" class="form-control" placeholder="Заголовок" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Описание</label>
                                    <textarea name="description" class="form-control" data-bs-toggle="autosize" rows="5" placeholder="Описание" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start;" required></textarea>
                                </div>
                                <div id="news_section"></div>
                                <div class="mb-3">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Добавить раздел</button>
                                        <div class="dropdown-menu dropdown-menu-start">
                                            @foreach($newsTypes as $key => $newsType)
                                                <button type="button" class="dropdown-item" onclick="addHtmlSection('{{ $key }}')">
                                                    {{ $newsType }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </span>
                                </div>
                                <div class="row pe-0">
                                    <div class="d-flex gap-2">
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

    <x-input-date/>

    <script>
        let sectionIndex = 0;

        function addHtmlSection(type) {
            const newsSection = document.getElementById('news_section');
            let newHtml = '';

            if (type === 'subtitle') {
                newHtml = `
                <div class="mb-3 section-item" id="section_${sectionIndex}">
                    <label for="subheading_${sectionIndex}" class="form-label required">Подзаголовок</label>
                    <input type="text" name="sections[${sectionIndex}][type]" value="subheading" hidden>
                    <input type="text" id="subheading_${sectionIndex}" name="sections[${sectionIndex}][content]" class="form-control" placeholder="Введите подзаголовок" required>
                    <button type="button" class="btn btn-danger mt-2" onclick="removeSection(${sectionIndex})">Удалить</button>
                </div>`;
            } else if (type === 'text') {
                newHtml = `
                <div class="mb-3 section-item" id="section_${sectionIndex}">
                    <label for="text_${sectionIndex}" class="form-label required">Текст</label>
                    <input type="text" name="sections[${sectionIndex}][type]" value="text" hidden>
                    <textarea id="text_${sectionIndex}" name="sections[${sectionIndex}][content]" class="form-control" data-bs-toggle="autosize" rows="5" placeholder="Введите текст" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start;" required></textarea>
                    <button type="button" class="btn btn-danger mt-2" onclick="removeSection(${sectionIndex})">Удалить</button>
                </div>`;
            } else if (type === 'image') {
                newHtml = `
                <div class="mb-3 section-item" id="section_${sectionIndex}">
                    <label for="image_${sectionIndex}" class="form-label required">Изображение</label>
                    <input type="text" name="sections[${sectionIndex}][type]" value="image" hidden>
                    <input type="file" id="image_${sectionIndex}" name="sections[${sectionIndex}][content]" class="form-control" accept="image/*" required>
                    <button type="button" class="btn btn-danger mt-2" onclick="removeSection(${sectionIndex})">Удалить</button>
                </div>`;
            } else if (type === 'quote') {
                newHtml = `
                <div class="mb-3 section-item" id="section_${sectionIndex}">
                    <label for="quote_${sectionIndex}" class="form-label required">Цитата</label>
                    <input type="text" name="sections[${sectionIndex}][type]" value="quote" hidden>
                    <textarea id="quote_${sectionIndex}" name="sections[${sectionIndex}][content]" class="form-control" data-bs-toggle="autosize" rows="5" placeholder="Введите цитату" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start;" required></textarea>
                    <button type="button" class="btn btn-danger mt-2" onclick="removeSection(${sectionIndex})">Удалить</button>
                </div>`;
            }

            newsSection.insertAdjacentHTML('beforeend', newHtml);
            sectionIndex++;
        }

        function removeSection(index) {
            const section = document.getElementById(`section_${index}`);
            if (section) {
                section.remove();
            }
        }
    </script>
@endsection
