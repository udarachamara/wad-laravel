<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanySaveRequest;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::get();
        return view('pages.company.all_companies', ['companyData' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = ['url' => '/company', 'method' => 'POST'];
        return view('pages.company.show_company', ['edit' => true, 'action' => (object) $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompanySaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanySaveRequest $request)
    {
        try {
            $company = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'telephone' => $request->email,
                'logo' => $request->logo,
                'website' => $request->website
            ]);
            if ($company) {
                \Session::flash('state', 'Successfully created ..!');
            } else {
                \Session::flash('state', 'Error creating ..!');
            }
        } catch (\Throwable $th) {
            \Session::flash('state', 'Error creating ..!');
        }

        return redirect('company/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $edit = $request->edit ? true : false;
        $action = ['url' => '/company/'.$id, 'method' => 'PATCH'];
        $company = Company::find($id);
        return view('pages.company.show_company', ['id' => $id, 'companyData' => $company, 'edit' => $edit, 'action' => (object) $action]);
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
     * @param  \Illuminate\Http\CompanySaveRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanySaveRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->telephone = $request->telephone;
        if(isset($request->logo)){
            $company->logo = $request->logo;
        }
        $company->website = $request->website;
        $company->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        return $company->delete();
    }
}
