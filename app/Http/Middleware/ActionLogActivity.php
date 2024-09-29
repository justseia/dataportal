<?php

namespace App\Http\Middleware;

use App\Enums\ActionType;
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
//        if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::YEAR, $year->year);
//                $log->create();
//            }
//        } else if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::KEY, $year->year);
//                $log->create();
//            }
//        } else if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::THEME, $year->year);
//                $log->create();
//            }
//        } else if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::QUESTION, $year->year);
//                $log->create();
//            }
//        } else if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::CROSS, $year->year);
//                $log->create();
//            }
//        } else if ($request->routeIs('themes.show')) {
//            $yearId = $request->route('yearId');
//            $year = Year::query()->find($yearId);
//            if ($year) {
//                $log = new ActivityLog(ActionType::DOWNLOAD, $year->year);
//                $log->create();
//            }
//        }

        return $next($request);
    }
}
