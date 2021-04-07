<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    private $category;


    public function __construct(Category $category)

    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dices = $this->category->paginate(5);

        return view('category.index', compact('dices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {



        if ($request->hasFile('photo') && $request->file('photo')->isvalid()) {
            $path = $request->file('photo')->store('public/photo');

            $newPath = str_replace('public','',$path);
            $save = new Category;
            $save->name = $request->name;
            $save->order = $request->order;
            $save->photo = $newPath;
            $save->save();
            $dices = $this->category->paginate(5);

            return view('category.index', compact('dices'))->with(['message' => 'Categoria criada com sucesso', 'color' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {


        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Category $category)

    {



        if (Storage::delete('public'.$category->photo) && $category->delete()) {
            $dices = $this->category->all();
            return view('category.index', compact('dices'))->with(['message' => 'Item deletado com sucesso', 'color' => 'danger']);
        }
    }
}
