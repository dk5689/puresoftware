<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalTrial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class ClinicalTrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trials = ClinicalTrial::all();
        return view('clinical-trial.index', compact('trials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trial = [];
        return view('clinical-trial.create', compact('trial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'first_name' => 'required|max:255',
            'date_of_birth' => 'required|date|date_format:Y-m-d|before:today',
            'migrain_frequency'  => 'required',
            'daily_frequency' => 'required_if:migrain_frequency,1'
        );
        $messages = array(
            'title.required' => 'Please enter a task.',
            'due_date.required' => 'Please select date.',
            'daily_frequency.required' => 'Please select daily frequency'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["messages"=>$messages], 500);
        }

        $age = Carbon::parse($request->date_of_birth)->age;

        $msg = '';

        if($age < 18)
        {
            $msg = 'Participants must be over 18 years of age';
        }
        else{

            if(in_array($request->migrain_frequency, [2,3]))
            {
                $msg = 'Participant '.$request->first_name.' is assigned to Cohort A';
            } 
            else
            {
                $msg = 'Candidate '.$request->first_name.' is assigned to Cohort B';
            }
        }

        $trial = new ClinicalTrial;
        $trial->first_name = $request->first_name;
        $trial->date_of_birth = $request->date_of_birth;
        $trial->migrain_frequency = $request->migrain_frequency;
        $trial->daily_frequency = isset($request->daily_frequency) ? $request->daily_frequency : 0;
        $trial->result = $msg;
        $trial->save();
        return redirect()->route('clinical-trial.create')->with('success', 'Result : '. $msg);
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
    public function edit(string $id)
    {
        $trial = ClinicalTrial::findOrFail($id);
        return view('clinical-trial.create', compact('trial'));
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
        $rules = array(
            'first_name' => 'required|max:255',
            'date_of_birth' => 'required|date|date_format:Y-m-d|before:today',
        );
        $messages = array(
            'title.required' => 'Please enter a task.',
            'due_date.required' => 'Please select date.',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["messages"=>$messages], 500);
        }
        $trial = ClinicalTrial::find($id);
        $trial->first_name = $request->first_name;
        $trial->date_of_birth = $request->date_of_birth;
        $trial->migrain_frequency = $request->migrain_frequency;
        $trial->daily_frequency = $request->daily_frequency;
        $trial->save();
        return redirect()->route('tasks.index')->with('success', 'Trial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        ClinicalTrial::destroy($id);
        return redirect()->route('clinical-trial.index')
                        ->with('success','Product deleted successfully');
    }

}
