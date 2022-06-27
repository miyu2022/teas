<?php

namespace App\Http\Controllers;

use App\Tea;
use Illuminate\Http\Request;

class TeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teas = Tea::all();
       // dd($teas);

        return view('teas.index', compact('teas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // 入力チェック
        $request->validate([
            'tea_name' => 'required',
            'tea_place' => 'required',
        ]);

        // 登録
        $tea = new Tea();
        $tea->tea_name = $request->input('tea_name');
        $tea->tea_place = $request->input('tea_place');
        $tea->save();

        // リダイレクト
        return redirect()->route('teas.show', ['id' => $tea->id])->with('message', 'Tea was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function show(Tea $tea)
    {
        return view('teas.show', compact('tea')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tea $tea)
    {
        return view('teas.edit', compact('tea'));
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tea $tea)
    {
        // 入力チェック
        $request->validate([
            'tea_name' => 'required',
            'tea_place' => 'required',
        ]);

        // 更新
        $tea->tea_name = $request->input('tea_name');
        $tea->tea_place  = $request->input('tea_place');
        $tea->save();

        // リダイレクト
        return redirect()->route('teas.show', ['id' => $tea->id])->with('message', 'Tea was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tea $tea)
    {
         // 削除
        $tea->delete();

        //eturn redirect()->route('teas.index');
        return redirect('teas');
    }
}
