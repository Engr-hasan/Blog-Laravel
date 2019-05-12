<?php

namespace App\Http\Controllers\Admin;

use App\AddSkill;
use App\Application;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::latest()->get();
        $addskills = AddSkill::latest()->get();
        return view('admin.addskill.index', compact('applications','addskills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addskill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name_of_skill' => 'required',
           'skill_name' => 'required',
           'skill_status' => 'required',
           'skill_duration' => 'required',
           'good_skill' => 'required',
           'bad_skill' => 'required',
           'skill_attach' => 'required'
        ]);

        $appData = new Application();
//        dd($request->all());
        $appData->name_of_skill = $request->name_of_skill;
        $appData->save();
        //Registrationinfo::where('reg_id',$appData->id)->delete();
        $count=count($request->skill_name);
        for ($i=0; $i <$count ; $i++) {
            $skill= new AddSkill();
            $skill->ref_id     = $appData->id;
            $skill->skill_name      = $request->skill_name[$i];
            $skill->skill_status      = $request->skill_status[$i];
            $skill->skill_duration      = $request->skill_duration[$i];
            $skill->good_skill      = $request->good_skill[$i];
            $skill->bad_skill      = $request->bad_skill[$i];
            $image = $request->file('skill_attach');
            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename =$currentDate.'-'.uniqid().'.'. $image[$i]->getClientOriginalExtension();
                if (!file_exists('skill_attach')) {
                    mkdir('skill_attach',0777,true);
                }
                $image[$i]->move('skill_attach',$imagename);
            }else{
                $imagename = 'default.png';
            }
            $skill->skill_attach      = $imagename;
            $skill->save();
        }
        Toastr::success('Skills Add successfully','Success');
        return redirect()->route('admin.addskill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applications = Application::find($id);
        $addskills = AddSkill::where('ref_id',$id)->get();
        return view('admin.addskill.edit', compact('applications','addskills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_of_skill' => 'required',
            'skill_name' => 'required',
            'skill_status' => 'required',
            'skill_duration' => 'required',
            'good_skill' => 'required',
            'bad_skill' => 'required',
//            'skill_attach' => 'required'
        ]);

        $appData = Application::find($id);
        $appData->name_of_skill = $request->name_of_skill;
        $appData->save();

        AddSkill::where('ref_id',$appData->id)->delete();
        $count=count($request->child);
        for ($i=0; $i <$count ; $i++) {
            $skill= new AddSkill();
            $skill->ref_id     = $appData->id;
            $skill->skill_name      = $request->skill_name[$i];
            $skill->skill_status      = $request->skill_status[$i];
            $skill->skill_duration      = $request->skill_duration[$i];
            $skill->good_skill      = $request->good_skill[$i];
            $skill->bad_skill      = $request->bad_skill[$i];
            /*$image = $request->file('skill_attach');
            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename =$currentDate.'-'.uniqid().'.'. $image[$i]->getClientOriginalExtension();
                if (!file_exists('skill_attach')) {
                    mkdir('skill_attach',0777,true);
                }
                $image[$i]->move('skill_attach',$imagename);
            }else{
                $imagename = 'default.png';
            }*/
            $imagename = "hi";
            $skill->skill_attach      = $imagename;
            $skill->save();
        }
//        dd($skill);
        Toastr::success('Skills Update successfully','Success');
        return redirect()->route('admin.addskill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::find($id)->delete();
        Toastr::success('Skill Successfully Deleted','Success');
        return redirect()->back();
    }
}
