<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;
use DataTables;
use View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $dataProvider = VersionControl::latest()->paginate(5);

    //     return view('version.index', compact('dataProvider'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Version::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route('version.edit', $row->id).'" title="แก้ไข" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="show-modalxx loadscreen"><i class="far fa-edit"></i></a>';
   
                           $btn = $btn.' <a href="'.route('version.store').'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="delete text-danger"><i class="far fa-trash-alt"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('version.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Version $model)
    {
        // return view('version._form', compact('model'));
        return View::make("version.create", compact('model'))
        ->with("value", 'xxx')
        ->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'version_number' => 'required',
        //     'files' => 'required|mimes:zip',
        // ]);

        $model = new Version;

        // $this->validate($request, [
        //     'version_number' => 'required',
        //     'files' => 'required',
        //     'status' => 'required',
        // ]);

       $request->validate([
            'version_number' => 'required',
            // 'files' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $extension = $files->getClientOriginalExtension();
            $filename = $request->version_number.'.'.$extension;
            $path = Storage::putFileAs('public/version', $files, $request->version_number.'.'.$extension);
            // $path = Storage::putFileAs('public/version', $files,'test.'.$extension);
            $model->version_number =  $request->version_number;
            $model->status =  $request->status;
            $model->files =  $filename;
            $model->save();
        }
            
            return redirect()->route('version.index')
            ->with('success', 'created successfully.');
            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VersionControl  $versionControl
     * @return \Illuminate\Http\Response
     */
    public function show(VersionControl $model)
    {
        return view('version.show', compact('model'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VersionControl  $versionControl
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->findModel($id);
        return view('version.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VersionControl  $versionControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Version $version)
    {
        $request->validate([
            'version_number' => 'required',
            // 'files' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('files')) {
            Storage::delete('public/version/'.$version->files);
            $files = $request->file('files');
            $extension = $files->getClientOriginalExtension();
            $filename = $request->version_number.'.'.$extension;
            $path = Storage::putFileAs('public/version', $files, $request->version_number.'.'.$extension);
            $version->files =  $filename;
        }

            $version->version_number =  $request->version_number;
            $version->status =  $request->status;
            $version->save();

        return redirect()->route('version.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VersionControl  $versionControl
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->findModel($id);
        Storage::delete('public/version/'.$model->files);
        return $model->delete();
        

        // return redirect()->route('version.index')
        //     ->with('success', 'deleted successfully');
     dd($model->delete());
    }

    protected function findModel($id)
    {
        if (($model = Version::findOrFail($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }

    public function versioninfo(Request $request){
        $client = $request->get('version');

        $model = Version::where(['status' => 'Y'])
        ->orderBy("version_number", "DESC")
        ->first();

        if($model){
            if($client < $model->version_number){
                return response()->json([
                    'version' => $model->version_number
                    ]);
                    // return Storage::disk('public')->download($server);
                }else{
                    return response()->json([
                        'msg' => 'There are currently no updates available',
                        'client' => $client,
                        'server' => $model->version_number,
                        ]);
                    }
            }else{
                return null;
        }
    }

    
    function download($name){
        return Storage::disk('version')->download($name);
 
    }

public function free(Version $model){
    $model->version_type = 'free';
    return View::make("version.create", compact('model'))
    ->with("value", 'xxx')
    ->render();
}

public function commercial(Version $model){
    $model->version_type = 'commercial';
    return View::make("version.create", compact('model'))
        ->with("value", 'xxx')
        ->render();
}

}