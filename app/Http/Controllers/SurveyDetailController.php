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
        $survey_id = Session::get('survey_id');
        $survey = Survey::find($survey_id);
        $survey_detail = surveyDetail::where("survey_id","=",$survey_id)->get();
        return view("survey_detailtable", compact("survey_detail","survey"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $survey_id = Session::get('survey_id');
    $valor = array(); // Crear un array vacío

$options = array(
    $request->option1,
    $request->option2,
    $request->option3,
    $request->option4,
    $request->option5,
    $request->option6,
    $request->option7,
    $request->option8,
    $request->option9,
    $request->option10
);
foreach ($options as $option) {
    if (!empty($option)) {
        $valor[] = $option;
    }
}
     
         $survey_detail = new SurveyDetail;  
        $survey_detail->survey_id   =   $survey_id;
         $survey_detail->question   =    $request->question;
          $survey_detail->type   =   $request->type;
              $survey_detail->option   =  json_encode($valor);
           $survey_detail->state   =   $request->state;
  $survey_detail->requerid   =   $request->requerid;

      $survey_detail->save();

   return $this->create();
     
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
    public function destroy(Request $request)
    {
             SurveyDetail::find($request->id)->delete();
        return $this->create();
    }
}