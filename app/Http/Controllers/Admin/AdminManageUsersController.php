<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BankUserService;
use App\Http\Controllers\Controller;

class AdminManageUsersController extends Controller
{
    
    private $bankUserService;

    public function __construct(BankUserService $bankUserService){
        $this->bankUserService = $bankUserService;
    }

    public function index(){
        $users = $this->bankUserService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }
}
