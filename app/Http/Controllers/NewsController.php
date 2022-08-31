<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new News();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = $this->model->all();

        return view('Admin.News.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.News.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['is_published'])){
            $data['is_published'] = true;
        }else{
            $data['is_published'] = false;
        }

        $res = $this->model->create([
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'released' => $data['released'],
            'last_update' => $data['last_update'],
            'reading_time' => $data['reading_time'],
            'text' => $data['text'],
            'is_published' => $data['is_published'],
        ]);

        if ($request->hasFile('image')){
            foreach ($request->file('image') as $image){
                $path = $image->store('images/News/' . now()->year . '/' . now()->month . '/' . now()->day);
                $res->images()->create([
                    'path' => $path,
                    'type' => $image->extension(),
                ]);
            }
        }

        return redirect()->route('news.index')->with('success', 'خبر با موفقیت ایجاد شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->model->where('id', $id)->firstOrFail();

        return view('Admin.News.edit', compact('news'));
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
        $news = $this->model->where('id', $id)->firstOrFail();

        $res = $news->delete();

        return redirect()->route('news.index')->with('success', 'خبر با موفقیت پاک شد!');
    }
}
