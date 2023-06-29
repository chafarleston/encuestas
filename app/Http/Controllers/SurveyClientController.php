<?php

namespace App\Http\Controllers;

use App\Models\SurveyClient;
use App\Models\Client;
use App\Models\SurveyDetail;

use App\Models\SelectionDetail;
use App\Models\Survey;
use App\Http\Requests\StoreSurveyClientRequest;
use App\Http\Requests\UpdateSurveyClientRequest;
use Illuminate\Http\Request;
class SurveyClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $survey_count =SurveyDetail::where("survey_id","=", $request->survey_id)->count();
            $survey = Survey::find($request->survey_id);
          $survey_detail = SurveyDetail::where("survey_id","=", $request->survey_id)->get();
     
            return view('survey_client',compact("survey_detail","survey","survey_count"));
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
    public function store(Request $request)
    {
        


            $survey_client = new SurveyClient;
         $survey_client->survey_detail_id = $request->survey_detail_id;
          $survey_client->client_id = $request->client_id;
              // return $request->option;
              if ($request->type=="multiple_option") {
                  $survey_client->option = json_encode($request->option);
                }
                else {
                $survey_client->option = json_encode("");
   
            }
              if ($request->type=="short_answer") {
                  $survey_client->answer = $request->answer;
                }
                else {
                $survey_client->answer = "";
          
            }
               if ($request->type=="selection") {
            $selection_detail_id = explode("-", $request->selection_detail_id);

                  $survey_client->selection_detail_id = $selection_detail_id[0];
                 

                }
                else {
       
            }
            
      

            $survey_client->save();
  // return $this->create();
    }

    public function associate_show(Request $request)
    {
        
           $criterio=  explode("-", $request->id);
        $criterio = $criterio[0];
        $survey_details = SelectionDetail::where("associate_detail_id", "=", $criterio)->get();
            
            return view("survey_clienttable_select",compact('survey_details'));
          
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyClient $surveyClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyClient $surveyClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyClientRequest $request, SurveyClient $surveyClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyClient $surveyClient)
    {
        //
    }
}
