<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use App\Services\Interfaces\ApplyInterface;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    protected $applyService;

    public function __construct(ApplyInterface $applyService)
    {
        $this->applyService = $applyService;
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(ApplyRequest $request)
    {
        return $this->applyService->store($request->validated());
    }

    /**
     * Display a listing of applications.
     */
    public function index()
    {
        return $this->applyService->index();
    }
}
