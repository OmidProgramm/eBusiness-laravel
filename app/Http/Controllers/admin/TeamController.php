<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createTeamRequest;
use App\Http\Requests\updateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = sha1(time()).'.'.$file->getClientOriginalExtension();
            $file->move("images/team",$image);
        }
        Team::create([
            "fullName" => $request->fullName,
            "caption" => $request->caption,
            "image" => $image,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
        ]);
        Session()->flash("createTeam","Team is created successfully");
        return back();
    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $team = Team::findOrfail($id);
        return view("dashboard.team.edit",compact("team"));
    }

   
    public function update(updateTeamRequest $request, string $id)
    {
        $team = Team::findOrFail($id);
        $file = $request->file('image');
        $new_image = "";
        if($file){
            if($team->image && file_exists("images/team/".$team->image)){
                unlink("images/team/".$team->image);
            }
            $new_image = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move("images/team/",$new_image);
            
        }else{
            $new_image = $team->image;
        }
        
        $team->update([
            "fullName" => $request->fullName,
            "caption" => $request->caption,
            "image" => $new_image,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
        ]);
        session()->flash('updatedTeam', "Team is updated successfully");
       return redirect()->route("team.index");
    }

    
    public function destroy(string $id)
    {
        $deleteImage = Team::findOrfail($id)->image; 
        if(file_exists("images/team/".$deleteImage)){
            unlink("images/team/".$deleteImage); 
        }
        Team::destroy($id);
        Session()->flash("deleteTeam","Team is deleted successfully");
        return back();
    }
}
