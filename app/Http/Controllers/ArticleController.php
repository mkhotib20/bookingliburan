<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use Redirect,Response;
use App\Http\Controllers\ModelController;
use Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array('article' => Article::orderBy('created_at', 'desc')->get());
        return view('admin.article')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['id'] = '';
        $data['title'] = '';
        $data['content'] = '';
        $data['cover_img'] = '';
        return view('admin.add-article')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSlug($str)
    {
        $str = strtolower($str);
        $slug = str_replace(' ', '-', $str);
        $src = Article::where('slug', $slug)->count();
        $newSlug = ($src>0) ? $slug.'-new' : $slug;
        return $newSlug;
    }
    public function store(Request $request)
    {
        $id = $request->id;
        $tujuan_upload = 'public/uploads/img_article';
        $slug = $this->getSlug($request->title);

        if (isset($request->cover_img)) {
            $file = $request->file('cover_img');
            $fn = 'img-'.$slug.'.'.$file->guessExtension();;
            $file->move($tujuan_upload,$fn);
            $cover_img = $fn;
            Article::updateOrCreate(
                ['id' => $id],
                [
                    'title' => $request->title,
                    'slug' => $slug,
                    'content' => $request->content,
                    'cover_img' => $cover_img,
                ]
            );
        }
        else{
            Article::updateOrCreate(
                ['id' => $id],
                [
                    'title' => $request->title,
                    'slug' => $slug,
                    'content' => $request->content,
                ]
            );
        }

        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('article.index')->with('success', 'Post tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $data['id'] = $article->id;
        $data['title'] = $article->title;
        $data['content'] = $article->content;
        $data['cover_img'] = $article->cover_img;
        return view('admin.add-article')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('article.index')->with('success', 'Post tersimpan');
    }
}
