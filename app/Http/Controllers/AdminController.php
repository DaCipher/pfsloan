<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{



   public function dashboard()
   {
      $applications = Application::all()->count();

      $users = User::where('role', "!=", ['super_admin', 'admin'])->count();

      $admins = User::where('role', 'admin')->count();

      $recent_applications = Application::where('created_at', ">=", Carbon::now()->subDays(5)->toDateTimeString())->latest()->get();

      return view('admin.dashboard', [
         'total_applications' => $applications,
         'total_users' => $users,
         'total_admin' => $admins,
         'recent_applications' => $recent_applications
      ]);
   }

   public function viewApplications()
   {
      $applications = Application::orderByDesc('created_at')->paginate(4);

      return view('admin.applications', ['applications' => $applications]);
   }

   public function getApplication(Application $application)
   {

      $header = request()->header('Ajax-Request');
      if ($header) {
         if ($application) {
            $app = $application;
            $app['application_date'] = $app['created_at']->isoFormat('MMMM Do YYYY, h:mm:ss a');
            unset($application->updated_at);
            unset($app->created_at);
            return response()->json(['data' => $app, 'status' => 200]);
         }
      } else {
         abort(403);
      }
   }

   public function deleteApplication(Request $request)
   {

      $id = $request->input('id');

      Application::destroy($id);

      return redirect()->back()->with('success', "Records deleted.");
   }

   public function showAdmin()
   {
      if (auth()->user()->role === 'super_admin') {
         $admins = User::where('role', 'admin')->get();
         return view('admin.admin', ["admins" => $admins]);
      } else {
         abort(404);
      }
   }

   public function showUsers()
   {

      $user = User::where('role', 'user')->get();
      return view('admin.users', ["users" => $user]);
   }

   public function deleteAdmin(Request $request)
   {
       if(auth()->user()->role === 'super_admin') {
          User::destroy($request->input('id'));
      return redirect()->back()->with('success', "Admin user deleted.");
       } else {
         abort(404);
       }
     
   }

   public function showProfile()
   {

      $id = auth()->id();

      $profile = User::findOrFail($id);

      return view('admin.profile', ['profile' => $profile]);
   }

   public function updateProfile(Request $request)
   {

      $this->validate($request, [
         'first_name' => 'required|alpha|min:4',
         'last_name' => 'required|alpha|min:4'
      ]);

      $id = $request->id;

      $profile = User::findOrFail($id);

      $profile->firstname = $request->first_name;
      $profile->lastname = $request->last_name;
      $profile->save();

      return redirect()->back()->with('success', "Profile Updated.");
   }

   public function changePassword(Request $request)
   {

      $this->validate(
         $request,
         [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
         ],
         [
            'password_confirmation.required' => 'Password confirmation is required.',
            'password.confirmed' => 'Passwords do not match.'
         ]
      );

      $user = User::findOrFail(auth()->id());
      $user->password = Hash::make($request->password, ['rounds' => 12]);
      $user->save();
      return redirect()->back()->with('success', "Password Updated!");
   }
}
