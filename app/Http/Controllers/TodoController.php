<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    private TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//
    {
        // way 1
        // skip and limit
        // 100
        // skip 10
        // data 11-20
        // count = 100
        return response()->json([
            'success' => true,
            'data' => $this->todoService->getAll($request->search, $request->skip, $request->limit)
        ]);

        // way 2
        // page and limit
        // 100
        // page 2 or null
        // limit 10
        // data 11-20
        //total_page = 10
        // return response()->json([
        //      'success' => true,
        //      'todo' => $this->todoservice->getAll($request->page, $request->limit)
        //])
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        // //
        // $request->validate([
        //     'description' => ['required','string']
        // ]);

        // dd($request);
        return response()->json([
            'success' => true,
            'data' => $this->todoService->create($request->description)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->todoService->getById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        //
        return response()->json([
            'success' => true,
            'data' => $this->todoService
                ->update($id, $request->description)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return response()->json([
            'success' => true,
            // 'data' => $this->todoService->destroy($id)
        ]);
    }
}
