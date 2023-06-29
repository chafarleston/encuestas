<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\SurveyClient;
use App\Models\Survey;
use App\Models\SurveyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
      
            $survey = Survey::find($request->survey_id);
          //$survey_client =DB::select("select id,question from survey_details where survey_id =".$criterio[0]);
     // Obtén todos los IDs de las preguntas
$ids = DB::table('survey_details')->where('survey_id',"=", $request->survey_id)->pluck('id');
$question = DB::table('survey_details')->where('survey_id',"=", $request->survey_id)->pluck('question');
// Inicio de la consulta SQL
$selects = ['sc.client_id'];

// Construir dinámicamente las líneas para cada ID
foreach ($ids as $id) {
    $selects[] = DB::raw("MAX(CASE WHEN sd.id =".$id." THEN sc.answer END) as 'pregunta".$id."'");
}

// Realizar la consulta
$results = DB::table('survey_clients as sc')
    ->join('survey_details as sd', 'sc.survey_detail_id', '=', 'sd.id')
    ->groupBy('sc.client_id')
    ->orderBy('sc.client_id', 'desc')
    ->select($selects)
    ->get();
            return view('report',compact("survey","results","ids","question"));
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
        $criterio = $request->columns;
        $criterio = explode(",",$request->columns);
        
   //     $survey_detail =DB::select("select id,question from survey_details where survey_id =1");

       



// Ahora $results contiene tus resultados



//return print_r($results);
       
        //return view("reporttable",compact("results"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
