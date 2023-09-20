<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('templates.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|unique:plans|string',
            'price'=>'required|numeric',
            'description'=>'required|string',
            'duration_in_days'=>'required|numeric',
        ]);
        Plan::create($data);
        return redirect()->route('plan.index')->with('success','تم اضافة الخطة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view('templates.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name'=>'required|string|unique:plans,name,'.$id,
            'price'=>'required|numeric',
            'description'=>'required|string',
            'duration_in_days'=>'required|numeric',
        ]);
        $plan = Plan::findOrFail($id);
        $plan->update($data);
        return redirect()->route('plan.index')->with('success','تم تعديل الخطة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $plan = Plan::findOrFail($id);
            $plan->delete();
            return redirect()->route('plan.index')->with('success','تم حذف الخطة بنجاح');
        } catch (\Throwable $th) {
            return redirect()->route('plan.index')->with('error','حدث خطأ ما');
        }
    }

    public function assignPlan( string $planId,string $userId)
    {
        $plan = Plan::findOrFail($planId);
        $user = User::findOrFail($userId);
        $user->assignPlan($plan);
        return redirect()->route('user.index')->with('success','تم تعيين الخطة بنجاح');


    }
}
