<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Category\StoreRequest;
use App\Http\Requests\Backend\Category\UpdateRequest;
use App\Models\Category;
use App\Repos\CategoryRepo;
use Support\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    private $base;

    public function __construct(
        CategoryRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            $category = $this->base->search();
            $parent = $this->base->getSelectParent();

            return $this->response->Success([
                'category' => $category,
                'parent'   => $parent
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }

    }


    public function Create()
    {
        try {
            return $this->response->Success(['parent' => $this->base->getSelectParent()]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Store(StoreRequest $request)
    {
        try {
            return $this->response->Success([
                'category' => $this->base->create($request->data()),
                "msg"      => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }

    }


    public function Edit($id)
    {
        try {
            $category = $this->base->findNotDelete($id);
            $parent = $this->base->getSelectParent();
            if (!$category) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'category' => $category,
                'parent'   => $parent,
                "msg"      => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }

    }


    public function Update(UpdateRequest $request, $id)
    {
        try {
            if (!$this->base->findNotDelete($id)) {
                return $this->response->NotFound();
            }
            return $this->response->Success([
                'category' => $this->base->update($request->data(), $id),
                "msg"      => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }

    }


    public function Delete($ids)
    {
        try {
            $ids = explode(',', $ids);
            if (count($ids) <= 0) {
                $this->response->BadRequest("Yêu cầu không hợp lệ");
            }
            $this->base->softDelete($ids, Category::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }

    }
}
