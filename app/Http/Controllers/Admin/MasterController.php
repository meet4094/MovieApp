<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MasterModel;
use DataTables;

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
        $data = $this->MasterModel->delete_app_data($req->all());
        return $data;
    }

    // Status Image Category Data

    public function add_status_image_category(Request $req)
    {
        if (empty($req->catId)) {
            $rules = array(
                'category' => 'required|unique:status_image_category,catName',
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
            $data = $this->MasterModel->add_status_image_category($req->all());
            return $data;
        }
    }

    public function status_image_category_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('status_image_category')->where(array('is_deleted' => 0));
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $url = asset('images/statusimages/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->image . '"><img src="  ' . $url . '/' . $row->image . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->catName . '" class="btn btn-link" onclick="edit_status_image_category(this)" data-val="' . $row->catId . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->catName . '" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->catId . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    public function delete_status_image_category(Request $req)
    {
        $data = $this->MasterModel->delete_status_image_category($req->all());
        return $data;
    }

    public function get_status_image_category_data(Request $request)
    {
        if ($request->ajax()) {
            $categorydata = DB::table('status_image_category')->where(array('catId' => $request->id))->first();
        }
        $data = array();
        $data = ([
            'catId' => $categorydata->catId,
            'catName' => $categorydata->catName,
            'image' => asset('images/statusimages/' . $categorydata->slug_name) . '/' . $categorydata->image,
        ]);
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }


    // Status Image Data

    public function get_status_image_Category(Request $request)
    {
        $search = $request->searchTerm;
        if ($search == '') {
            $categories = DB::table('status_image_category')->where(array('is_deleted' => 0))->select('catId', 'catName')->get();
        } else {
            $categories = DB::table('status_image_category')->select('catId', 'catName')->where('catName', 'like', '%' . $search . '%')->where('is_deleted', 0)->limit(10)->get();
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

    public function add_status_images(Request $req)
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
            $data = $this->MasterModel->add_status_images($req->all());
            return $data;
        }
    }

    public function status_images_list(Request $request)
    {
        if ($request->ajax()) {
            $builder = DB::table('status_images as si');
            if ($request->category_id != '') {
                $builder->where('si.catId', $request->category_id);
            }
            $builder->where('si.is_deleted', '0');
            $builder->join('status_image_category as sic', 'sic.catId', '=', 'si.catId');
            $builder->select('si.id', 'sic.catName', 'sic.slug_name', 'si.images');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->editColumn('images', function ($row) {
                    $url = asset('images/statusimages/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->images . '"><img src=" ' . $url . '/' . $row->images . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button class="btn btn-link" onclick="edit_status_image(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['images', 'action'])
                ->make(true);
        }
    }

    public function delete_status_images(Request $req)
    {
        $data = $this->MasterModel->delete_status_images($req->all());
        return $data;
    }

    public function get_status_images_data(Request $request)
    {
        if ($request->ajax()) {
            $itemdata = DB::table('status_images as si')
                ->join('status_image_category as sic', 'sic.catId', '=', 'si.catId')
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
                'image' => asset('images/statusimages/' . $item->slug_name) . '/' . $item->images,
            ]);
        }
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }


    // Status Video Catyegory Data

    public function add_status_video_category(Request $req)
    {
        if (empty($req->catId)) {
            $rules = array(
                'category' => 'required|unique:status_video_category,catName',
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
            $data = $this->MasterModel->add_status_video_category($req->all());
            return $data;
        }
    }

    public function status_video_category_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('status_video_category')->where(array('is_deleted' => 0));
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $url = asset('images/statusvideos/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->image . '"><img src="  ' . $url . '/' . $row->image . ' " height="100"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->catName . '" class="btn btn-link" onclick="edit_status_video_category(this)" data-val="' . $row->catId . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->catName . '" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->catId . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    public function delete_status_video_category(Request $req)
    {
        $data = $this->MasterModel->delete_status_video_category($req->all());
        return $data;
    }

    public function get_status_video_category_data(Request $request)
    {
        if ($request->ajax()) {
            $categorydata = DB::table('status_video_category')->where(array('catId' => $request->id))->first();
        }
        $data = array();
        $data = ([
            'catId' => $categorydata->catId,
            'catName' => $categorydata->catName,
            'image' => asset('images/statusvideos/' . $categorydata->slug_name) . '/' . $categorydata->image,
        ]);
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }

    // Status Video Data

    public function get_status_video_Category(Request $request)
    {
        $search = $request->searchTerm;
        if ($search == '') {
            $categories = DB::table('status_video_category')->where(array('is_deleted' => 0))->select('catId', 'catName')->get();
        } else {
            $categories = DB::table('status_video_category')->select('catId', 'catName')->where('catName', 'like', '%' . $search . '%')->where('is_deleted', 0)->limit(10)->get();
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

    public function add_status_videos(Request $req)
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
            $data = $this->MasterModel->add_status_videos($req->all());
            return $data;
        }
    }

    public function status_videos_list(Request $request)
    {
        if ($request->ajax()) {
            $builder = DB::table('status_videos as sv');
            if ($request->category_id != '') {
                $builder->where('sv.catId', $request->category_id);
            }
            $builder->where('sv.is_deleted', '0');
            $builder->join('status_video_category as svc', 'svc.catId', '=', 'sv.catId');
            $builder->select('sv.id', 'svc.catName', 'svc.slug_name', 'sv.videos');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->editColumn('videos', function ($row) {
                    $url = asset('images/statusvideos/' . $row->slug_name);
                    return '<a target="_blank" href="' . $url . '/' . $row->videos . '"><video controls src=" ' . $url . '/' . $row->videos . ' "width="180"></a>';
                })
                ->addColumn('action', function ($row) {
                    $update_btn = '<button class="btn btn-link" onclick="edit_status_video(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank" class="btn btn-link" onclick="editable_remove(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->rawColumns(['videos', 'action'])
                ->make(true);
        }
    }

    public function delete_status_videos(Request $req)
    {
        $data = $this->MasterModel->delete_status_videos($req->all());
        return $data;
    }

    public function get_status_videos_data(Request $request)
    {
        if ($request->ajax()) {
            $videodata = DB::table('status_videos as sv')
                ->join('status_video_category as svc', 'svc.catId', '=', 'sv.catId')
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
                'video' => asset('images/statusvideos/' . $video->slug_name) . '/' . $video->videos,
            ]);
        }
        $response = array('st' => "success", "msg" => $data);
        return response()->json($response);
    }
}
