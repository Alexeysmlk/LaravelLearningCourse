<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callbacks = Callback::query()->where('user_id', Auth::id())->paginate(4);
        return view('user.callbacks.index', compact('callbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.callbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Callback::query()->create($data);
        return redirect()->route('user.callbacks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Callback  $callback
     * @return \Illuminate\Http\Response
     */
    public function show(Callback $callback)
    {
        return view('user.callbacks.show', compact('callback'));
    }
}
