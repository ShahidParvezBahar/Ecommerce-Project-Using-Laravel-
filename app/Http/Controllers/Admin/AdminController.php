<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        /*return $request->post();*/

        $email = $request->post('email');
        $password = $request->post('password');
       /* $result = Admin::where(['email'=>$email,'password'=>$password])->get();*/

     /*   echo '<pre>';
        print_r($result);
        echo '</pre>';*/

        $result = Admin::where(['email'=>$email])->first();

        if($result)
        {
            
            if(Hash::check($request->post('password'),$result->password))
            {
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID');
            return redirect('admin/dashboard');
        }

        else
        {
            $request->session()->flash('error','Please Enter Valid Password');
            return redirect('admin');
        }
    }
    else
    {
         $request->session()->flash('error','Please Enter Valid Login Details');
         return redirect('admin');
    }
}

    public function dashboard()
    {
        return view('admin.dashboard');
    }


}
