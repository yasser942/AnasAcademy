<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $usersQuery = User::with('roles', 'plans');

        // Check if there is a search term (email)
        if ($request->has('email')) {
            $email = $request->input('email');
            $usersQuery->where('email', 'like', '%' . $email . '%');
        }

        $users = $usersQuery->paginate(10);
        $plans = Plan::all();

        return view('templates.users.index', compact('users', 'plans'));
    }
    public function toggleStatus($id, $action)
    {
        $user = User::findOrFail($id);

        if ($action === 'activate') {
            $user->status = 'active';
        } elseif ($action === 'deactivate') {
            $user->status = 'passive';
        }

        $user->save();

        return redirect()->back()->with('success', 'تم تغيير حالة المستخدم بنجاح');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }

}
