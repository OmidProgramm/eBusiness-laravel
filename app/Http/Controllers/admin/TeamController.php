<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::paginate(5);
        return view("dashboard.team.index",compact('team'));
    }

    
    public function create()
    {
        return view("dashboard.team.create");
    }

    public function store(createTeamRequest $request)
    {
        $dd($request->all());
    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
