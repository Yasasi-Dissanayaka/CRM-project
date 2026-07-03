<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal :: all();
        return Inertia :: render('Proposals/Index',[
            'proposals'=> $proposals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        
        return Inertia::render('Proposals/Create',[
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'proposal_number' => 'required',
            'title'=> 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',

        ]);

        Proposal::create($validated);

        return redirect()->route('proposals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proposal = Proposal :: findOrFail($id);

        $customers = Customer :: all();
        return Inertia :: render('Proposals/Edit',[
            'proposal'=>$proposal,
            'customers'=> $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'customer_id' => 'required',
            'proposal_number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $proposal = Proposal::findOrFail($id);

        $proposal->update($validated);

        return redirect()->route('proposals.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $proposal =Proposal::findOrFail($id);

        $proposal->delete();

        return redirect()->route('proposals.index');
    }
}
