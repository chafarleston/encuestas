<?php

namespace App\Http\Controllers;

use App\Models\SurveyDetail;
use App\Models\Survey;
use App\Http\Requests\StoreSurveyDetailRequest;
use App\Http\Requests\UpdateSurveyDetailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SurveyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $survey_id = Session::get('survey_id');
        $survey = Survey::find($survey_id);
        $survey_detail = surveyDetail::where("survey_id","=",$survey_id)->get();
            return view("survey_detail", compact("survey_detail","survey"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveyDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyDetail $surveyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyDetail $surveyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyDetailRequest $request, SurveyDetail $surveyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyDetail $surveyDetail)
    {
        //
    }
}
