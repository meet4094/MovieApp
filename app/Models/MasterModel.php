<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MasterModel extends Model
{
    use HasFactory;

    // Users Data
    public function add_user($req)
    {
        if (empty($req['userId'])) {
            $remember_token = Str::random(15);
        } else {
            $remember_token = $req['remember_token'];
        }
        $data = array(
            'name' => $req['username'],
            'email' => $req['useremail'],
            'password' => Hash::make($req['password']),
            'remember_token' => $remember_token
        );

        if ($req['userId']) {
            DB::table('users')->where('id', $req['userId'])->update($data);
            return response()->json(['st' => 'success', 'msg' => 'Update Successfully..',]);
        } else {
            DB::table('users')->insert($data);
            return response()->json(['st' => 'success', 'msg' => 'User Data added..',]);
        }
    }

    public function delete_user_data($req)
    {
        $id = $req['id'];
        $drdata = DB::table('users')->where('id', $id)->delete();
        if ($drdata) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        return response()->json($response);
    }

    // Image Category
    public function add_image_category($req)
    {
        if ($req['catId']) {

            if (isset($req['image']) && $req['image']->getError() == 0) {

                $iOriginal = DB::table('image_category')->Where('catId', $req['catId'])->first();
                $slug_name = $iOriginal->slug_name;

                if (isset($iOriginal->image) && !empty($iOriginal->image)) {

                    $iOriginal = public_path('images/' . $slug_name) . '/' . $iOriginal->image;

                    if (file_exists($iOriginal))

                        @unlink($iOriginal);
                }

                $file = $req['image'];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('images/' . $slug_name), $fileName);
                $data['image'] = $fileName;
            }
            $data['catName'] = $req['category'];

            DB::table('image_category')->where('catId', $req['catId'])->update($data);
            return response()->json(['st' => 'success', 'msg' => 'Update Successfully..',]);
        } else {
            $slug_name = str_replace(' ', '_', strtolower($req['category']));
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $file = $req['image'];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('images/' . $slug_name), $fileName);
                $data['image'] = $fileName;
            }

            $data['user_id'] = Auth::User()->id;
            $data['catName'] = $req['category'];
            $data['slug_name'] = $slug_name;

            DB::table('image_category')->insert($data);
            return response()->json(['st' => 'success', 'msg' => 'Category added..',]);
        }
    }

    public function delete_image_category($req)
    {
        $id = $req['id'];
        $drdata = DB::table('image_category')->where('catId', $id)->update(array('is_deleted' => 1));
        if ($drdata) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        return response()->json($response);
    }

    // Images
    public function add_images($req)
    {
        if ($req['imageId']) {

            if (isset($req['images'][0]) && $req['images'][0]->getError() == 0) {

                $iOriginal = DB::table('image_category')->Where('catId', $req['category'])->first();
                $slug_name = $iOriginal->slug_name;

                $iImage = DB::table('images')->Where('id', $req['imageId'])->first();

                if (isset($iImage->images) && !empty($iImage->images)) {

                    $iImage = public_path('images/' . $slug_name) . '/' . $iImage->images;

                    if (file_exists($iImage))

                        @unlink($iImage);
                }

                $file = $req['images'][0];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('images/' . $slug_name . '/'), $fileName);
                $data['images'] = $fileName;
            }
            $data['catId'] = $req['category'];
            $data['is_new'] = $req['new'];

            DB::table('images')->where('id', $req['imageId'])->update($data);
            return response()->json(['st' => 'success', 'msg' => 'Update Successfully..',]);
        } else {

            $iOriginal = DB::table('image_category')->Where('catId', $req['category'])->first();
            $slug_name = $iOriginal->slug_name;

            foreach ($req['images'] as  $key => $photo) {
                $file = $photo->getClientOriginalName();
                $extension = $photo->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $photo->move(public_path('images/' . $slug_name . '/'), $fileName);
                $data = array(
                    'user_id' => Auth::User()->id,
                    'catId' => $req['category'],
                    'images' => $fileName,
                    'is_new' => $req['new'],
                );
                DB::table('images')->insert($data);
            }

            return response()->json(['st' => 'success', 'msg' => 'Image added..',]);
        }
    }

    public function delete_images($req)
    {
        $id = $req['id'];
        $drdata = DB::table('images')->where('id', $id)->update(array('is_deleted' => 1));
        if ($drdata) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        return response()->json($response);
    }

    // Video Category
    public function add_video_category($req)
    {
        if ($req['catId']) {

            if (isset($req['image']) && $req['image']->getError() == 0) {

                $iOriginal = DB::table('video_category')->Where('catId', $req['catId'])->first();
                $slug_name = $iOriginal->slug_name;

                if (isset($iOriginal->image) && !empty($iOriginal->image)) {

                    $iOriginal = public_path('videos/' . $slug_name) . '/' . $iOriginal->image;

                    if (file_exists($iOriginal))

                        @unlink($iOriginal);
                }

                $file = $req['image'];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('videos/' . $slug_name), $fileName);
                $data['image'] = $fileName;
            }
            $data['catName'] = $req['category'];

            DB::table('video_category')->where('catId', $req['catId'])->update($data);
            return response()->json(['st' => 'success', 'msg' => 'Update Successfully..',]);
        } else {
            $slug_name = str_replace(' ', '_', strtolower($req['category']));
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $file = $req['image'];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('videos/' . $slug_name), $fileName);
                $data['image'] = $fileName;
            }

            $data['user_id'] = Auth::User()->id;
            $data['catName'] = $req['category'];
            $data['slug_name'] = $slug_name;

            DB::table('video_category')->insert($data);
            return response()->json(['st' => 'success', 'msg' => 'Category added..',]);
        }
    }

    public function delete_video_category($req)
    {
        $id = $req['id'];
        $drdata = DB::table('video_category')->where('catId', $id)->update(array('is_deleted' => 1));
        if ($drdata) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        return response()->json($response);
    }

    // Videos
    public function add_videos($req)
    {
        if ($req['videoId']) {

            if (isset($req['videos'][0]) && $req['videos'][0]->getError() == 0) {

                $iOriginal = DB::table('video_category')->Where('catId', $req['category'])->first();
                $slug_name = $iOriginal->slug_name;

                $iVideos = DB::table('videos')->Where('id', $req['videoId'])->first();

                if (isset($iVideos->videos) && !empty($iVideos->videos)) {

                    $iVideos = public_path('videos/' . $slug_name) . '/' . $iVideos->videos;

                    if (file_exists($iVideos))

                        @unlink($iVideos);
                }

                $file = $req['videos'][0];
                $extension = $file->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $file->move(public_path('videos/' . $slug_name . '/'), $fileName);

                $data['videos'] = $fileName;
            }
            $data['catId'] = $req['category'];
            $data['is_new'] = $req['new'];
            DB::table('videos')->where('id', $req['videoId'])->update($data);
            return response()->json(['st' => 'success', 'msg' => 'Update Successfully..',]);
        } else {

            $iOriginal = DB::table('video_category')->Where('catId', $req['category'])->first();
            $slug_name = $iOriginal->slug_name;

            foreach ($req['videos'] as  $key => $photo) {
                $file = $photo->getClientOriginalName();
                $extension = $photo->extension();
                $fileName = md5(uniqid() . time()) . '.' . $extension;
                $photo->move(public_path('videos/' . $slug_name . '/'), $fileName);
                $data = array(
                    'user_id' => Auth::User()->id,
                    'catId' => $req['category'],
                    'videos' => $fileName,
                    'is_new' => $req['new'],
                );

                DB::table('videos')->insert($data);
            }
            return response()->json(['st' => 'success', 'msg' => 'Video added..',]);
        }
    }

    public function delete_videos($req)
    {
        $id = $req['id'];
        $drdata = DB::table('videos')->where('id', $id)->update(array('is_deleted' => 1));
        if ($drdata) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        return response()->json($response);
    }
}
