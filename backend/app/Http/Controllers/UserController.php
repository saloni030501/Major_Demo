<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function userlist(){
        $agents = User::where('role', 'agent')->get();
            return view('admin.user', compact('agents'));
        }
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('status', 'Agent deleted successfully.');
        }
    
        public function enable($id)
        {
            $user = User::findOrFail($id);
            $user->is_approved = true;
            $user->save();
            
            return redirect()->back()->with('status', 'Agent enabled successfully');
        }
    
        public function disable($id)
        {
            $user = User::findOrFail($id);
            $user->is_approved= false;
            $user->save();
            
            return redirect()->back()->with('status', 'Agent disabled successfully');
        }
}
