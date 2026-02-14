<?php

namespace Modules\Team\Http;

use App\Http\Controllers\Controller;
use Modules\Team\Http\Requests\StoreTeamRequest;
use Modules\Team\Http\Requests\UpdateTeamRequest;
use Modules\Team\Models\Team;
use Modules\Team\Services\TeamService;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::with('translations')->latest()->paginate(15);

        return view('admin.teams.index', compact('members'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request, TeamService $service)
    {
        $service->create($request->validated());

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully.');
    }

    public function edit(Team $team)
    {
        $team->load('translations');

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team, TeamService $service)
    {
        $service->update($team, $request->validated());

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $team, TeamService $service)
    {
        $service->delete($team);

        return back()->with('success', 'Team member removed successfully.');
    }

    public function toggleStatus(Team $team)
    {
        $team->update(['status' => !$team->status]);

        return back();
    }
}
