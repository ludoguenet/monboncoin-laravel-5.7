<?php

namespace Monboncoin\Http\Controllers;

use Monboncoin\Ad;
use Monboncoin\User;
use Monboncoin\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($seller_id, $ad_id)
    {
        $seller = User::find($seller_id);
        $buyer = User::find(auth()->user()->id);
        $ad = Ad::find($ad_id);

        return view('messenger', [
            'seller' => $seller,
            'buyer' => $buyer,
            'ad' => $ad,
        ]);
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
        $message = new Message();
        $message->ad_id = $request->ad_id;
        $message->seller_id = $request->seller_id;
        $message->buyer_id = auth()->user()->id;
        $message->content = $request->content;
        $message->save();

        return redirect()->route('ads.index')->with('success','Votre message a bien été envoyé à ' . getUserName($request->seller_id));
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
