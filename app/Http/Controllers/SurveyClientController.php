<?php

namespace App\Http\Controllers;

use App\Models\SurveyClient;
use App\Http\Requests\StoreSurveyClientRequest;
use App\Http\Requests\UpdateSurveyClientRequest;

class SurveyClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Ssdsds";
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
    public function store(StoreSurveyClientRequest $request)
    {
        //
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
