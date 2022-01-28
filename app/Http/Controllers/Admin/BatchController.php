<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchCreateRequest;
use App\Http\Requests\BatchUpdateRequest;
use App\Http\Requests\MassDestroyBatchRequest;

use App\Models\Batch;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BatchController extends Controller
{
    /**
     * Display a listing of Batches resource.
     *     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('batch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::orderBy('id')->get();

        return view('admin.batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     * create new batch..
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('batch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.batches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchCreateRequest $request)
    {
        $req_data = [
            "_token" => $request->_token,
            "batch_label" => $request->batch_label,
            "display_status" => (int)$request->display_status
        ];

        $batch = Batch::create($req_data);
        return redirect()->route('admin.batches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        abort_if(Gate::denies('batch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        abort_if(Gate::denies('batch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchUpdateRequest $request, Batch $batch)
    {

        $batch->update($request->all());

        return redirect()->route('admin.batches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        // dd('here');
        abort_if(Gate::denies('batch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($batch->categories)
            $batch->categories()->delete();

        $batch->delete();

        return back();
    }

    public function massDestroy(MassDestroyBatchRequest $request)
    {
        DB::enableQueryLog();
        $category = Category::whereIn('batch_id', request('ids'))->delete();
        $queries = DB::getQueryLog();
        $batch =  Batch::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
