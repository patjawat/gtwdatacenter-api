<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Version;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\VersionResuorce;
use App\Http\Resources\VersionCollection;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $versions = Version::paginate(5);
        // $versions = Version::all();
        // return new VersionCollection($versions);
        return response()->json(['token' => 'ss']);
    }

    public function versioninfo(Request $request){
        $client = $request->get('version');

        $model = Version::where(['status' => 'Y'])
        ->orderBy("version_number", "DESC")
        ->first();

        if($model){
            if($client < $model->version_number){

                return response()->json([
                    'version' => $model->version_number,
                    'msg' => '<i class="fas fa-circle-notch fa-spin"></i> ตรวจพบเวอร์ชั่นใหม่',
                    'status' => true,
                    ]);

                }else{

                    return response()->json([
                        'msg' => 'เป็นปัจจุบันแล้ว',
                        'client' => $client,
                        'server' => $model->version_number,
                        'status' => true,
                        ]);
                }

            }else{
                
                return response()->json([
                    'msg' => 'ไม่บบการอัพเดท',
                    'client' => '',
                    'server' => '',
                    'status' => false,
                    ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Version;
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $extension = $files->getClientOriginalExtension();
            $filename = $request->version_number.'.'.$extension;
            $path = Storage::putFileAs('public/version', $files,$filename);
            // return response()->json($path);
            $model->version_number =  $request->version_number;
            $model->status =  $request->status;
            $model->files =  $filename;
            return $model->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Version $version)
    
    {
        // return response()->json($version);
        return new  VersionResuorce($version);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
