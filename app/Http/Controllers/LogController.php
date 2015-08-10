<?php 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Http\Requests\LoginRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LoginRequest $request)
    {
       
          //$usr=User::all();

       if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return Redirect::to('/control');  
        }

        Session::flash('message-error', 'Datos son incorrectos');
        return Redirect::to('/login');

    }



    public function logout(){
        Auth::logout();
        return Redirect::to('/login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
