<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function index()
   {
    $result['data'] = Brand::all();
    return view('admin/brand',$result);
   }

      public function manage_brand(Request $request,$id='')
    {   
        if($id > 0)
        {
            $arr = Brand::where(['id'=>$id])->get();

            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;

            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_selected'] = "";

            if($arr['0']->is_home == 1)
            {
                $result['is_home_selected'] = "checked";
            }

            $result['status'] = $arr['0']->status;            
            $result['id']=$arr['0']->id;
        }

        else
        {
            $result['name'] = '';
            $result['image'] ='';
             $result['status'] = '';
              $result['is_home'] = '';
               $result['is_home_selected'] = '';
             $result['id'] = 0;
        }

        return view('admin/manage_brand',$result);
    }

    public function manage_brand_process(Request $request)
    {
        $request->validate([

                'name'=>'required|unique:brands,name,'.$request->post('id'),
                'image'=>'mimes:jpeg,jpg,png'
                
        ]);

        if($request->post('id') > 0)
        {
            $model = Brand::find($request->post('id'));
            $msg = "Brand Updated";
        }

        else
        {
            $model = new Brand();
            $msg = "Brand Inserted";
        }

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/brand',$image_name);
            $model->image=$image_name;
        }

        $model->is_home=0;
        if($request->post('is_home')!==null)
        {
            $model->is_home=1;
        }

        $model->name=$request->post('name');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }

    public function delete(Request $request,$id)
    {
        $model=Brand::find($id);
        $model->delete();
        $request->session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Brand::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Brand Status Updated');
        return redirect('admin/brand');
    }
}
