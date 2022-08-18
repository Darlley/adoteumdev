<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    const NAME = 'GOOGLE';
    protected User $authUser;

    public function __invoke(): RedirectResponse
    {

        try{
            // dd($user, $user->token);
            $user = Socialite::driver('google')->user();

            DB::transaction(function () use($user) {

                $this->authUser = User::updateOrCreate([
                    'email' => $user->email,
                    ], [
                    'name' =>$user->name,
                    'password' => Hash::make(Str::random(7)),
                ])->load('interest', 'preference');

                Profile::updateOrCreate([
                    'user_id' => $this->authUser->id,
                    ], [
                    'provider' => self::NAME,
                    'provider_user_id' => $user->id,
                    'nickname' => $user->nickname,
                    'avatar' => $user->avatar,
                    'data' => json_encode($user->user)
                ]);

            }, 3);

            Auth::login($this->authUser);

            if(is_null($this->authUser->interest) ){
                return redirect()->route('app.interest');
            }

            if(is_null($this->authUser->preference) ){
                return redirect()->route('app.preference');
            }

            return redirect()->route('app.developers');
        
        }catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
