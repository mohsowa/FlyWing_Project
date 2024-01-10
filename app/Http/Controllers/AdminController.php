<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if((DB::table('admins')->where('user_id', Auth::user()->id)->exists())){
            return view('admin.pages.admins');
        }else{
            return view('layouts.permission_view');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Admin::create([
            "user_id" => $request->get('user_id'),
            "role" => $request->get('role'),
        ]);
        return redirect()->to('/admin');

    }
    /**
     * Display the specified resource.
     *
     * @param Admin $admin
     * @return Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Admin $admin
     * @return Response
     */
    public function update(Request $request, Admin $admin)
    {
        Admin::where('id',$admin->id)->first()->update([
            "role" => $request->get('role')
        ]);
        return redirect()->to('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return Response
     */
    public function destroy(Admin $admin)
    {
       Admin::where('id',$admin->id)->delete();
       return redirect()->to('/admin');
    }
}
