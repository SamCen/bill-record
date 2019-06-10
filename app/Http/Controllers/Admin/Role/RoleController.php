<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Requests\Admin\Role\RoleIndexRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Author sam
     * DateTime 2019-06-10 11:42
     * Description:
     * @param RoleIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RoleIndexRequest $request)
    {
        $page = $request->get('page',null);
        $size = $request->get('size',null);
        if(!empty($page)&&!empty($size)){
            $list = Role::query()->paginate($size);
        }else{
            $list = Role::query()->get();
        }
        return success($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
