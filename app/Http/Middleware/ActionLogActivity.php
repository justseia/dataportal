<?php

namespace App\Http\Middleware;

use App\Enums\ActionType;
use App\Models\News\News;
use App\Models\Question\Keyword;
use App\Models\Question\Question;
use App\Models\Question\Theme;
use App\Models\Question\Year;
use App\Services\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionLogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('api.online-analyze.themes')) {
            $yearId = $request->route('yearId');
            $year = Year::query()->find($yearId);
            if ($year) {
                $log = new ActivityLog(ActionType::YEAR, $year->year);
                $log->create();
            }
        } else if ($request->routeIs('api.online-analyze.questions')) {
            $id = $request->route('id');
            if ($request->input('searchType') === 'key') {
                $keyword = Keyword::query()->find($id);
                if ($keyword) {
                    $log = new ActivityLog(ActionType::KEY, $keyword->key);
                    $log->create();
                }
            } else if ($request->input('searchType') === 'year') {
                $theme = Theme::query()->find($id);
                if ($theme) {
                    $log = new ActivityLog(ActionType::KEY, $theme->title);
                    $log->create();
                }
            }
        } else if ($request->routeIs('api.online-analyze.result')) {
            $yearId = $request->route('questionId');
            $question = Question::query()->find($yearId);
            if ($question) {
                $log = new ActivityLog(ActionType::QUESTION, $question->title);
                $log->create();
            }
        } else if ($request->routeIs('api.online-analyze.cross')) {
            $questionFirstId = $request->route('questionFirst');
            $questionSecondId = $request->route('questionSecond');
            $questionFirst = Question::query()->find($questionFirstId);
            $questionSecond = Question::query()->find($questionSecondId);
            if ($questionFirst && $questionSecond) {
                $log = new ActivityLog(ActionType::CROSS, $questionFirst, $questionSecond);
                $log->create();
            }
        } else if ($request->routeIs('api.research.show')) {
            $themeId = $request->route('theme');
            $theme = Theme::query()->find($themeId);
            if ($themeId) {
                $log = new ActivityLog(ActionType::RESEARCH, $theme->title);
                $log->create();
            }
        } else if ($request->routeIs('api.news.show')) {
            $newsId = $request->route('news');
            $news = News::query()->find($newsId);
            if ($news) {
                $log = new ActivityLog(ActionType::NEWS, $news->title);
                $log->create();
            }
        }

        return $next($request);
    }
}
