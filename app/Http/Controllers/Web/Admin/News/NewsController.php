<?php

namespace App\Http\Controllers\Web\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::query();
        $news->searchByTitle($request->title);
        $news->searchByDescription($request->description);
        $news = $news->paginate(12);

        return view('admin.news.index')
            ->with(compact('news'));
    }

    public function show(News $news): View
    {
        return view('admin.news.show')
            ->with(compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('uploads', 'public');
            }

            $news = News::query()->create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filePath,
            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при созаднии публикации: ' . $e->getMessage());
        }

        return redirect()->route('admin.news.show', $news)
            ->with('success', 'Успешно создано');
    }

    public function update(News $news, Request $request): RedirectResponse
    {
        try {
            $news->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при обновлении публикации: ' . $e->getMessage());
        }

        return back()->with('success', 'Успешно обновлено');
    }
}
