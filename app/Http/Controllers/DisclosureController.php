<?php

namespace App\Http\Controllers;

use App\Disclosure;
use App\User;
use Illuminate\Http\Request;

class DisclosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disclosures = Disclosure::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status','active');
        })->get();
        return view('pages.disclosure.list', compact('disclosures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')
        ->where('status', 'active')->get();
        return view('pages.disclosure.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'                   => 'required|exists:users,id',
            'dbs_level'                 => 'required',
            'date_requested'            => 'required|date',
            'date_on_certificate'       => 'required|date',
            'certificate_no'            => 'required',
            'contract_type'             => 'required',
        ]);
        $disclosure = Disclosure::create($request->all());
        return redirect()->route('show.disclosures')->with('success', 'Disclosure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disclosure  $Disclosure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disclosure = Disclosure::with('user')->find($id);
        return view('pages.disclosure.show', compact('disclosure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disclosure  $Disclosure
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $form_type = $request->form_type;
        $disclosure = Disclosure::with('user')->find($id);
        // dd($disclosure);
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.disclosure.edit', compact('disclosure', 'employees','form_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disclosure  $Disclosure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dbs_level'             => 'required',
            'date_requested'        => 'required|date',
            'date_on_certificate'   => 'required|date',
            'certificate_no'        => 'required',
            'contract_type'         => 'required',
        ]);
        $disclosure = Disclosure::find($id);
        $disclosure->update($request->all());


        if ($request->form_type == "tab") {
            return redirect()->route('detail.employee', $disclosure->user_id)
                ->with('success', 'Disclosure edited successfully.');
        } else {
        return redirect()->route('show.disclosures')->with('success', 'Disclosure edited successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disclosure  $Disclosure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disclosure = Disclosure::find($id);
        $disclosure->delete();
        return redirect()->back()->with('success', 'Disclosure deleted successfully.');
    }
}
