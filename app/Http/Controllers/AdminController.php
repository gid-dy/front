<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Hash;
use App\Children;
use App\Admin;
use App\Collection;
use Auth;
use DB;
use Carbon\Carbon;
use Validator;

class AdminController extends Controller
{



    public function dashboard(Request $request)
    {




        return view('admin.dashboard');
    }

    public function settings()
    {
        $adminDetails = Admin::where(['email'=>Session::get('adminSession')])->first();
        // dd($adminDetails);
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkpassword(Request $request)
    {
        $data = $request->all();
        $adminCount = Admin::where(['email'=> Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        if($adminCount == 1){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatepassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $adminCount = Admin::where(['email'=> Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
            if($adminCount == 1){
                $password = md5($data['new_pwd']);
                Admin::where('email',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current password!');
            }
        }
    }

    public function forgotpassword(Request $request){
        $meta_title ="Forgot password - Mt. Zion Methodist Kotei";
         if($request->isMethod('post')){
             $data = $request->all();
             $adminCount = Admin::where('email',$data['email'])->count();
             if($adminCount == 0){
                 return redirect()->back()->with('flash_message_error', 'Email does not exists!');
             }
             $AdminDetails = Admin::where('email', $data['email'])->first();

             //Generate random password
             $random_password = str_random(8);

             //Encode/ Secure password
             $new_pwd = md5($random_password);

             //Update password
             Admin::where('email', $data['email'])->update(['password'=>$new_pwd]);

             //Send forgot password Email Code
            //  $email = $data['email'];
            //  $messageData=[
            //      'email'=>$email,
            //      'password'=>$random_password
            //  ];
            //  Mail::send('emails.adminforgotpassword', $messageData, function($message)use($email){
            //      $message->to($email)->subject('New password - Mt. Zion Methodist Kotei');
            //  });
            //  return redirect('/admin/login')->with('flash_message_success','Please check your email for new password');
         }
         return view('admin.admin_login')->with(compact('meta_title'));
     }

    public function logout()
    {
        Session::flush();
        return redirect('/admin/login')->with('flash_message_success','logged out successfull');
    }

    public function viewAdmins(){
        $admins = Admin::get();

        return view('admin.admins.view_admins')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // dd($data);
            $adminCount = Admin::where('email',$data['email'])->count();
            if($adminCount>0){
                return redirect()->back()->with('flash_message_error', 'Admin already exist!');
            }else{

                    $admin = new Admin;
                    $admin->name =$data['name'];
                    $admin->email = $data['email'];
                    $admin->password = md5($data['password']);
                    $admin->save();
                    //Send Confirmation Email
            // $email = $data['email'];
            // $messageData = ['email'=>$data['email'], 'name'=>$data['name'], 'code'=>base64_encode($data['email'])];
            // Mail::send('emails.Adminconfirmation', $messageData,function($message) use($email){
            //     $message->to($email)->subject('ADMIN E-mail confirmation');

            return redirect()->back()->with('flash_message_success', 'Admin Account added successfully');

            }
        }

        return view('admin.admins.add_admin');
    }

    // public function confirmAccount($email){
    //     $email = base64_decode($email);
    //     $AdminCount = Admin::where('email', $email)->count();
    //     if($AdminCount>0){
    //         $AdminDetails=Admin::where('email', $email)->first();
    //         if($AdminDetails->status == 1){
    //             return redirect('/admin/login')->with('flash_message_success','Your Email account is already activated.You can login in now');
    //         }else{
    //             Admin::where('email', $email)->update(['status'=>1]);

    //             //Send Register Email
    //            $messageData = ['email'=>$email,'name'=>$AdminDetails->name];
    //            Mail::send('emails.Adminwelcome', $messageData,function($message) use($email){
    //                $message->to($email)->subject('Mt Zion Methodist Administrator');
    //            });
    //             return redirect('/admin/login')->with('flash_message_success','Your Email account is activated.You can login in now');
    //         }
    //     }else{
    //         abort(404);
    //     }
    // }

    public function editAdmin(Request $request, $id){
        $adminDetails = Admin::where('id', $id)->first();
        // $adminDetails = json_decode(json_encode($adminDetails));
        // dd($adminDetails);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            //dd($data);
            // if(empty($data['status'])){
            //     $data['status'] = 0;
            // }
                Admin::where(
                    'email', $data['email'])->update([
                        'name'=>$data['name'],
                        'password'=>md5($data['password']),
                        // 'Status'=>$data['Status']
                        ]);
                return redirect()->back()->with('flash_message_success', 'Admin updated successfully');
            }


        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }

    public function viewUsersChart(){

    }

}
