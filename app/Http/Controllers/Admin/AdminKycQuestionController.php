<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\KycQuestionService;
use App\Http\Requests\StoreKycQuestionRequest;

class AdminKycQuestionController extends Controller
{
    protected $kycQuestionService;
    public function __construct(KycQuestionService $kycQuestionService)
    {
        $this->kycQuestionService = $kycQuestionService;
    }

    public function index()
    {
        $questions = $this->kycQuestionService->getAllQuestions();
        return view('admin.kyc_questions.index', compact('questions'));
    }

    public function create(){
        return view('admin.kyc_questions.create');
    }

    public function store(StoreKycQuestionRequest $request)
    {
        $this->kycQuestionService->createQuestion($request->validated());
        return redirect()->route('admin.kyc_questions.index')->with('success', 'Question created successfully.');
    }
}
