<?php

namespace App\Http\Controllers\Authenticated\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gate;
use App\Models\Users\User;
use App\Models\images\Image;
use App\Models\Users\Subjects;
use App\Searchs\DisplayUsers;
use App\Searchs\SearchResultFactories;

class UsersController extends Controller
{

    public function showUsers(Request $request){
        $keyword = $request->keyword;
        $category = $request->category;
        $updown = $request->updown;
        $gender = $request->sex;
        $role = $request->role;
        $subjects = $request->subjects;// ここで検索時の科目を受け取る
        $userFactory = new SearchResultFactories();
        $users = $userFactory->initializeUsers($keyword, $category, $updown, $gender, $role, $subjects);
        $subjects = Subjects::all();
        return view('authenticated.users.search', compact('users', 'subjects'));
    }

    public function userProfile($id){
        $user = User::with('subjects')->findOrFail($id);
        $subject_lists = Subjects::all();
        return view('authenticated.users.profile', compact('user', 'subject_lists'));
    }

    public function userEdit(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->subjects()->sync($request->subjects);
        return redirect()->route('user.profile', ['id' => $request->user_id]);
    }

    public function image(Request $request){
        $imgs = Image::get();
        return view('authenticated.users.image', compact('imgs'));
    }

    public function create(Request $request){
        // 画像フォームでリクエストした画像を取得
        $img = $request->file('image');
        // storage > public > img配下に画像が保存される
        if (isset($img)) {
            // storage > public > img配下に画像が保存される
            $path = $img->store('img', 'public');
            // store処理が実行できたらDBに保存処理を実行
            if ($path) {
                Image::create([
                    'image' => $path,
                ]);
            }
        }
        return redirect()->route('image');
    }

    public function imgDelete($id){
        $image = Image::where('id', $id)->first();
        // 商品画像ファイルへのパスを取得
        $path = $image->image;
        // ファイルが登録されていれば削除
        if ($path !== '') {
            Storage::disk('public')->delete($path);
        }
        // データベースからデータを削除
        $image->delete();
        return redirect()->route('image');
    }

    public function wikiShow(){

        return view('authenticated.wiki.wiki');
    }

    public function chatShow(){
        return view('authenticated.users.chat');
    }
}
