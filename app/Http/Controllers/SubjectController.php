<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function store(CreateSubjectRequest $request) {
        return response()->json(Subject::create($request->validated()));
    }

    public function update(UpdateSubjectRequest $request) {
        $data = $request->validated();
        return response()->json(Subject::where(['id' => $data['id']])->update($data));
    }
}
