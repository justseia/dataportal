<?php

namespace App\Http\Controllers\Web\Admin\Dataset;

use App\Http\Controllers\Controller;
use App\Models\Question\Theme;
use App\Models\Question\Year;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index(): View
    {
        $themes = Theme::query();
        $themes->withCount(['questions']);
        $themes->with(['year']);
        $themes = $themes->paginate(20);

        return view('admin.dataset.index')
            ->with(compact('themes'));
    }

    public function show(Theme $theme): View
    {
        $theme->with(['questions', 'year']);

        $years = Year::query();
        $years = $years->get();

        return view('admin.dataset.show')
            ->with(compact('years'))
            ->with(compact('theme'));
    }
}
