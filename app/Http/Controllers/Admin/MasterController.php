<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MasterModel;
use DataTables;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    protected $MasterModel;
    public function __construct()
    {
        $this->MasterModel = new MasterModel();
    }

    // Dashboard 
    public function dashboard()
    {
        $res['title'] = 'dashboard';
        return view('Admin/Master/dashboard', $res);
    }

    // User 
    public function user_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $update_btn = '<button class="btn btn-link" title="' . $row->name . '" onclick="edit_user_data(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank" title="' . $row->name . '" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function add_user(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'useremail' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->MasterModel->add_user($req->all());
            return $data;
        }
    }

    public function get_user_data(Request $request)
    {
        $id = $request->id;
        $user_Data = DB::table('users')->Where('id', $id)->first();
        $data = array([
            'id' => $user_Data->id,
            'name' => $user_Data->name,
            'email' => $user_Data->email,
            'password' => $user_Data->password,
            'remember_token' => $user_Data->remember_token,
        ]);
        $response = array('st' => "success", "msg" => $data[0]);
        return response()->json($response);
    }

    public function delete_user_data(Request $req)
    {
        $data = $this->MasterModel->delete_user_data($req->all());
        return $data;
    }

    // Image Category Data

    public function add_image_category(Request $req)
    {
        if (empty($req->catId)) {
            $rules = array(
                'category' => 'required|unique:image_category,catName',
                'image' => 'required|mimes:jpeg,jpg,png,gif',
            );
        } else {
            $rules = array(
                'category' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif',
            );
        }
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->MasterModel->add_image_category($req->all());
            return $data;
        }
    }

    public function image_category_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('image_category as ic');
            $data->join('users as u', 'u.id', '=', 'ic.user_id');
            $data->where(array('ic.user_id' => Auth::User()->id));
            $data->where(array('is_deleted' => 0));
            $data->get('ic.*', 'u.name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $url = asset('images/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->image . '"><img src="  ' . $url . '/' . $row->image . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->catName . '" class="btn btn-link" onclick="edit_image_category(this)" data-val="' . $row->catId . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->catName . '" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->catId . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    public function delete_image_category(Request $req)
    {
        $data = $this->MasterModel->delete_image_category($req->all());
        return $data;
    }

    public function get_image_category_data(Request $request)
    {
        if ($request->ajax()) {
            $categorydata = DB::table('image_category')->where(array('catId' => $request->id))->first();
        }
        $data = array();
        $data = ([
            'catId' => $categorydata->catId,
            'catName' => $categorydata->catName,
            'image' => asset('images/' . $categorydata->slug_name) . '/' . $categorydata->image,
        ]);
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }


    // Image Data

    public function get_image_Category(Request $request)
    {
        $search = $request->searchTerm;
        if ($search == '') {
            $categories = DB::table('image_category')->where(array('is_deleted' => 0))->where(array('user_id' => Auth::User()->id))->select('catId', 'catName')->get();
        } else {
            $categories = DB::table('image_category')->select('catId', 'catName')->where('catName', 'like', '%' . $search . '%')->where(array('user_id' => Auth::User()->id))->where('is_deleted', 0)->limit(10)->get();
        }

        $response = array();
        foreach ($categories as $category) {
            $response[] = array(
                "id" => $category->catId,
                "text" => $category->catName
            );
        }
        return response()->json($response);
    }

    public function add_images(Request $req)
    {
        if (empty($req->itemId)) {
            $rules = array(
                'category' => 'required',
                'images' => 'required',
            );
        } else {
            $rules = array(
                'category' => 'required',
            );
        }
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->MasterModel->add_images($req->all());
            return $data;
        }
    }

    public function images_list(Request $request)
    {
        if ($request->ajax()) {
            $builder = DB::table('images as i');
            if ($request->category_id != '') {
                $builder->where('i.catId', $request->category_id);
            }
            $builder->where('i.is_deleted', '0');
            $builder->where(array('i.user_id' => Auth::User()->id));
            $builder->join('image_category as ic', 'ic.catId', '=', 'i.catId');
            $builder->join('users as u', 'u.id', '=', 'i.user_id');
            $builder->select('i.id', 'ic.catName', 'ic.slug_name', 'i.images', 'i.created_at', 'u.name');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->editColumn('images', function ($row) {
                    $url = asset('images/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->images . '"><img src=" ' . $url . '/' . $row->images . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button class="btn btn-link" onclick="edit_image(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['images', 'action'])
                ->make(true);
        }
    }

    public function delete_images(Request $req)
    {
        $data = $this->MasterModel->delete_images($req->all());
        return $data;
    }

    public function get_images_data(Request $request)
    {
        if ($request->ajax()) {
            $itemdata = DB::table('images as si')
                ->join('image_category as sic', 'sic.catId', '=', 'si.catId')
                ->where(array('id' => $request->id))
                ->select('si.*', 'sic.catName', 'sic.slug_name')
                ->get();
        }
        foreach ($itemdata as $item) {
            $data = array();
            $data = ([
                'catId' => $item->catId,
                'id' => $item->id,
                'catName' => $item->catName,
                'image' => asset('images/' . $item->slug_name) . '/' . $item->images,
            ]);
        }
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }


    // Video Catyegory Data

    public function add_video_category(Request $req)
    {
        if (empty($req->catId)) {
            $rules = array(
                'category' => 'required|unique:video_category,catName',
                'image' => 'required|mimes:jpeg,jpg,png,gif',
            );
        } else {
            $rules = array(
                'category' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif',
            );
        }
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->MasterModel->add_video_category($req->all());
            return $data;
        }
    }

    public function video_category_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('video_category as vc');
            $data->where(array('vc.is_deleted' => 0));
            $data->join('users as u', 'u.id', '=', 'vc.user_id');
            $data->where(array('vc.user_id' => Auth::User()->id));
            $data->get('vc.*', 'u.name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $url = asset('videos/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->image . '"><img src="  ' . $url . '/' . $row->image . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->catName . '" class="btn btn-link" onclick="edit_video_category(this)" data-val="' . $row->catId . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->catName . '" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->catId . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    public function delete_video_category(Request $req)
    {
        $data = $this->MasterModel->delete_video_category($req->all());
        return $data;
    }

    public function get_video_category_data(Request $request)
    {
        if ($request->ajax()) {
            $categorydata = DB::table('video_category')->where(array('catId' => $request->id))->first();
        }
        $data = array();
        $data = ([
            'catId' => $categorydata->catId,
            'catName' => $categorydata->catName,
            'image' => asset('videos/' . $categorydata->slug_name) . '/' . $categorydata->image,
        ]);
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }

    // Video Data

    public function get_video_Category(Request $request)
    {
        $search = $request->searchTerm;
        if ($search == '') {
            $categories = DB::table('video_category')->where(array('is_deleted' => 0))->where(array('user_id' => Auth::User()->id))->select('catId', 'catName')->get();
        } else {
            $categories = DB::table('video_category')->select('catId', 'catName')->where('catName', 'like', '%' . $search . '%')->where(array('user_id' => Auth::User()->id))->where('is_deleted', 0)->limit(10)->get();
        }

        $response = array();
        foreach ($categories as $category) {
            $response[] = array(
                "id" => $category->catId,
                "text" => $category->catName
            );
        }
        return response()->json($response);
    }

    public function add_videos(Request $req)
    {
        if (empty($req->videoId)) {
            $rules = array(
                'category' => 'required',
                'videos' => 'required',
            );
        } else {
            $rules = array(
                'category' => 'required',
            );
        }
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->MasterModel->add_videos($req->all());
            return $data;
        }
    }

    public function videos_list(Request $request)
    {
        if ($request->ajax()) {
            $builder = DB::table('videos as v');
            if ($request->category_id != '') {
                $builder->where('v.catId', $request->category_id);
            }
            $builder->where('v.is_deleted', '0');
            $builder->where(array('v.user_id' => Auth::User()->id));
            $builder->join('users as u', 'u.id', '=', 'v.user_id');
            $builder->join('video_category as vc', 'vc.catId', '=', 'v.catId');
            $builder->select('v.id', 'vc.catName', 'vc.slug_name', 'v.videos', 'v.created_at', 'u.name');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->editColumn('videos', function ($row) {
                    $url = asset('videos/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->videos . '"><video controls src=" ' . $url . '/' . $row->videos . ' "width="180"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button class="btn btn-link" onclick="edit_video(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['videos', 'action'])
                ->make(true);
        }
    }

    public function delete_videos(Request $req)
    {
        $data = $this->MasterModel->delete_videos($req->all());
        return $data;
    }

    public function get_videos_data(Request $request)
    {
        if ($request->ajax()) {
            $videodata = DB::table('videos as sv')
                ->join('video_category as svc', 'svc.catId', '=', 'sv.catId')
                ->where(array('id' => $request->id))
                ->select('sv.*', 'svc.catName', 'svc.slug_name')
                ->get();
        }
        foreach ($videodata as $video) {
            $data = array();
            $data = ([
                'catId' => $video->catId,
                'id' => $video->id,
                'catName' => $video->catName,
                'video' => asset('videos/' . $video->slug_name) . '/' . $video->videos,
            ]);
        }
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }
}
