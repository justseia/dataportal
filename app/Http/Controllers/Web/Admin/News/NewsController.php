<?php

namespace App\Http\Controllers\Web\Admin\News;

use App\Enums\NewsSectionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\News\StoreRequest;
use App\Http\Requests\Web\Admin\News\UpdateRequest;
use App\Models\News\News;
use App\Models\News\NewsSection;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::query();
        $news->latest('created_at');
        $news->searchByTitle($request->title);
        $news->searchByDescription($request->description);
        $news = $news->paginate(12);

        return view('admin.news.index')
            ->with(compact('news'));
    }

    public function show(News $news): View
    {
        $newsTypes = NewsSectionType::getSectionTypeType();

        return view('admin.news.show')
            ->with(compact('newsTypes'))
            ->with(compact('news'));
    }

    public function create(): View
    {
        $newsTypes = NewsSectionType::getSectionTypeType();

        return view('admin.news.create')
            ->with(compact('newsTypes'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $filePath = $request->file('image')->store('uploads', 'public');
            }

            $news = News::query()->create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filePath,
            ]);

            if ($request->has('sections')) {
                foreach ($request->input('sections') as $section) {
                    NewsSection::query()->create([
                        'type' => $section->type,
                        'value' => $section->value,
                        'news_id' => $news->id,
                    ]);
                }
            }
        } catch (Exception $e) {
            return back()->withInput()->withErrors('Ошибка при созаднии публикации: ' . $e->getMessage());
        }

        return redirect()->route('admin.news.show', $news)
            ->with('success', 'Успешно создано');
    }

    public function update(News $news, UpdateRequest $request): RedirectResponse
    {
        try {
            $news->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        } catch (Exception $e) {
            return back()->withInput()->withErrors('Ошибка при обновлении публикации: ' . $e->getMessage());
        }

        return back()->with('success', 'Успешно обновлено');
    }
}
