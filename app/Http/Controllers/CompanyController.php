<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Throwable;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = '';
        $name = '';
        $email = '';
        $website = '';

        $company = Company::all();

        try{
            foreach($company as $item)
            {
                $id = $item->id;
                $name = $item->name;
                $email = $item->email;
                $website = $item->website;
            }
        } catch(Throwable $e) {
            report($e);
            return false;
        }

        return view('company.index',[
                                        'id' => $id,
                                        'name' => $name,
                                        'email' => $email,
                                        'website' => $website,
                                        'isEmpty' => Company::exists()
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
     * Store company information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        if($file = $request->file('logo')){
            $name= time() . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($name, $request->file('logo'));
        }

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $name ? $name : '';
        $company->website = $request->website;
        $company->save();

        return redirect()->back()->with('message', 'Successfully Created Company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('company.info');
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
    public function update(StoreCompanyRequest $request)
    {
        Company::find($request->id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'website' => $request->website
                    ]);
        return redirect()->back()->with('message', 'Successfully Updated Company');
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
