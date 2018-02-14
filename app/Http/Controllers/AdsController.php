<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = DB::table('ads')->paginate(5);

        return view('ads.index', [
            'ads' => $ads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $ad = Ad::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'author_name' => $request->user()->username,
                'user_id' => $request->user()->id,
                'created_at' => new Expression('NOW')
            ]);
        }

        if ($ad) {
            return redirect()->route('ads.show', [
                'ad' => $ad->id
            ])->with('success', 'Ad created successfully!');
        }

        return back()->withInput()->with('error', 'Error creating new ad');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        $ad = Ad::find($ad->id);

        return view('ads.show', [
            'ad' => $ad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $ad = Ad::find($ad->id);

        return view('ads.edit', [
            'ad' => $ad
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $adUpdate = Ad::where('id', $ad->id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        if ($adUpdate) {
            return redirect()->route('ads.show', [
                'ad' => $ad->id
            ])->with('success', 'Ad updated successfully!');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $adDelete = Ad::find($ad->id);

        if ($adDelete->delete()) {
            return redirect()->route('ads')
                ->with('success', 'Ad deleted succesfully!');
        }

        return back()->withInput()->with('error', 'Ad cannot be deleted.');
    }
}
