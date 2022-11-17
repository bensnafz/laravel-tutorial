<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->userService->getAll(),
        ]);
    }

    public function store(UserRequest $request)
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->userService
                ->create($request->name, $request->email, $request->password)
        ]);
    }

    public function show($id)
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->userService->getById($id)
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->userService
                ->update($id, $request->name, $request->email, $request->password)
        ]);
    }

    public function destroy($id)
    {
        //
        return response()->json([
            'success' => true,
        ]);
    }
}
