<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    //
    public function create(Request $request)
    {
    	$user = $request->user();
    	
    	$this->validate($request, [
            'title' => 'required',
            'references' => 'required',
            'reads_type' => 'required|in:se,pe',
            'reads1' => 'required',
            'reads2' => 'required_if:reads_type,==,pe',
            'db_annotate' => 'required',
            'seq_mapper' => 'required|in:bt2,bwa,novo',
            'snp_caller' => 'required|in:sam,gatk',
        ]);

    	/*
    	| Variable Information
    	|------------------------------------------------------
		| Title 			: $input['title']
		| References		: $input['references']
		| Reads Type		: $input['reads_type']
		| Reads				: $input['reads1'][~index~]['value']
		| Reads 2 (pair)	: $input['reads2'][~index~]['value']
		| Annotation DB		: $input['db_annotate']
		| Alignment Tools	: $input['seq_mapper']
		| SNP Caller		: $input['snp_caller']
		| -----------------------------------------------------
		| To Do: list array of parameters settings
		|
    	*/
    	$input = $request->all();
        sleep(2);

    	return json_encode($input);
    }
}