<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Http\Resources\CategoriesResource;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CategoriesResource::collection(Categories::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoriesRequest $request)
    {
        $request->validated();

        $categories = Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'parent_id' => $request->parent_id,
        ]);

        if($categories){
            return response()->json([
                'result' => 1,
                'message' => 'İşleminiz başarılı bir şekilde gerçekleşmiştir.',
                'data' => $categories,
            ],201);
        }
        else{
            return response()->json([
                'result' => 0,
                'message' => 'İşleminiz gerçekleşirken bir hata oluştu',
                'data' => null,
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        return response()->json(new CategoriesResource($categories));
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoriesRequest $request, $id)
    {
        $request->validated();

        $categories = Categories::find($id);
        $categories->name = $request->post('name');
        $categories->description = $request->post('description');
        $categories->is_active = $request->post('is_active');
        $categories->parent_id = $request->post('parent_id');
        $categories->save();
        if($categories){
            return response()->json([
                'result' => 1,
                'message' => 'Güncelleme işlemi başarılı',
            ],201);
        }
        else{
            return response()->json([
                'result' => 0,
                'message' => 'Sunucu hatası...',
            ],500);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $categories = Categories::destroy($id);
        if($categories){
            return response()->json([
                'result' => 1,
                'message' => 'Silme işlemi başarılı',
            ],201);
        }
        else{
            return response()->json([
                'result' => 0,
                'message' => 'Sunucu hatası...',
            ],500);
        }
    }

}
