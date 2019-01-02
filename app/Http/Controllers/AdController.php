<?php

namespace Monboncoin\Http\Controllers;

use Monboncoin\Ad;
use Monboncoin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Monboncoin\Http\Requests\StoreAd;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = DB::table('ads')->orderBy('created_at', 'desc')->paginate(5);
        return view('ads', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAd  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAd $request)
    {
        $validated = $request->validated();

        if (!Auth::check()) {
            $request->validate([
                'name' => 'required|unique:users|max:100',
                'email' => 'required|unique:users|email|',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $this->guard()->login($user);
        }

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->price = $validated['price'] * 100;
        $ad->localisation = $validated['localisation'];
        $ad->user_id = auth()->user()->id;
        $ad->save();

        return redirect()->route('ads.index')->with('success', 'Votre annonce a bien été ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);

        return view('ad', compact('ad'));
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
