<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
    public function __construct()
    {
        //if (!$clients) {
        //Log :: info ( "Користувач увійшов!");
        Session::flash('message2', 'ВИ УСПІШНО ЗАРЕЄСТРОВАНІ');
            //Session::flash ( 'flash_message_error' ,'Ваш аккаунт не активний!' ) ;
            //return redirect ( $this -> redirectTo ) ; //}
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $clients = Client::where('city', 'like', '%'.$request->search.'%')
                ->orWhere('name', 'like', '%'.$request->search.'%')
                ->orWhere('surname', 'like', '%'.$request->search.'%')
                ->orderBy('clients.created_at', 'desc')
                ->get();

            return view('client.index',compact('clients'));
        }

        $clients= Client::all();

        return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $client=new Client();
        $client->create($request->all());
        return back()
            -> with('success', 'Ви успішно приєднались!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('course.index')->with('success','Успішно редаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index');
    }
}
