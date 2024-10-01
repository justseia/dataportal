<?php

namespace App\Http\Controllers\Web\Admin\Client;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Client\ClientActivityLog;
use App\Models\Client\ClientType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        $clients = Client::query();
        $clients->with(['clientType']);
        $clients->searchByFirstName($request->first_name);
        $clients->searchByLastName($request->last_name);
        $clients->searchByPhoneNumber($request->phone_number);
        $clients->searchByOrganization($request->organization);
        $clients->searchByEmail($request->email);
        $clients->searchByClientType($request->client_type);
        $clients->latest('created_at');
        $clients = $clients->paginate(20);

        $clientTypes = ClientType::query();
        $clientTypes = $clientTypes->get();

        return view('admin.client.index')
            ->with(compact('clientTypes'))
            ->with(compact('clients'));
    }

    public function create(): View
    {
        return view('admin.client.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $client = Client::query()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->first_name,
                'phone_number' => $request->phone_number,
                'organization' => $request->organization,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'access_paid_content' => $request->access_paid_content,
                'close_all_content' => $request->close_all_content,
            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при создании клиента: ' . $e->getMessage());
        }

        return redirect()->route('admin.clients.show', $client)
            ->with('success', 'Успешно создано');
    }

    public function show(Client $client): View
    {
        $activityLogs = ClientActivityLog::query();
        $activityLogs->where('client_id', $client->id);
        $activityLogs = $activityLogs->paginate(50);

        return view('admin.client.show')
            ->with(compact('activityLogs'))
            ->with(compact('client'));
    }

    public function update(Client $client, Request $request): RedirectResponse
    {
        try {
            $client->update([
                'first_name' => $request->first_name,
                'last_name' => $request->first_name,
                'phone_number' => $request->phone_number,
                'organization' => $request->organization,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'access_paid_content' => $request->access_paid_content,
                'close_all_content' => $request->close_all_content,
            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при обновлении клиента: ' . $e->getMessage());
        }

        return back()->with('success', 'Успешно обновлено');
    }
}
