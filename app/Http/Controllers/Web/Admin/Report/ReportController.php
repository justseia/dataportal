<?php

namespace App\Http\Controllers\Web\Admin\Report;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientActivityLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = ClientActivityLog::query();
        $reports->with(['client']);
        $reports = $reports->paginate(50);

        $actionTypes = ActionType::getActionType();

        return view('admin.report.index')
            ->with(compact('actionTypes'))
            ->with(compact('reports'));
    }
}
