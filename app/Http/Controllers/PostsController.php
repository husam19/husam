<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'details'=>'required|min:20',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required'=>'العنوان يجب ان يكون مدخل',
            'details.required'=>'التفاصيل يجب ان يكون مدخل',
            'details.min'=>'يجب ألا يقل عدد الأحرف عن 20 حرف',
            'image.required'=>'يجب رفع صورة',
            'image.image'=>'يجب ان يكون الملف صورة',
        ]);
        $path = $request->file('image')->store('uploads', 'public');

        Post::create(
            [
                'title'=>$request->get('title'),
                'details'=>$request->get('details'),
                'user_id'=>1,
                'image'=>$path,
                ]
        );

        return redirect()->route('posts.index')->with('success','تم اضافة المنشور بنجاح');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        return view('posts.create',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'details'=>'required|min:20',
            'image'=>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required'=>'العنوان يجب ان يكون مدخل',
            'details.required'=>'التفاصيل يجب ان يكون مدخل',
            'details.min'=>'يجب ألا يقل عدد الأحرف عن 20 حرف',
            'image.image'=>'يجب ان يكون الملف صورة',
        ]);
        $post=Post::find($id);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('uploads', 'public');

        }else{
            $path = $post->image;
        }

//        $post->title=$request->get('title');
//        $post->save();
        Post::find($id)->update(
            [
                'title'=>$request->get('title'),
                'details'=>$request->get('details'),
                'user_id'=>1,
                'image'=>$path,
            ]
        );

        return redirect()->route('posts.index')->with('success','تم تعديل المنشور بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success','تم حذف المنشور بنجاح');

    }
}
