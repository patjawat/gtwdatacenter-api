<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
use Illuminate\Support\Facades\DB;

class AuthenController extends Controller
{

    public function login(Request $request)
    {
        $req = request()->only(['username', 'password']);
        $user = User::where('username',$req['username'])->first();
               
            if ( ! Hash::check($request->password, $user->password, [])) {
                    return  abort(401);
            }else{
                $token = $user->createToken('postman', ['admin']);
                 return response()->json(['token' => $token->plainTextToken,'profile' => $user]);
            }
    }

    public function register(){
            DB::table('users')->insert([
            'name' => 'patjawat',
            'username' => 'patjawat',
            'email' => 'patjwaat@gmail.com',
            'password' => Hash::make('112233'),
            // 'api_token' => Str::random(60),
          ]);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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