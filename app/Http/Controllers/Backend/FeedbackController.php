<?php

namespace App\Http\Controllers\Backend;

use App\Models\Feedback;
use App\Repos\FeedbackRepo;
use App\Repos\ProductRepo;
use Support\Http\Controllers\BaseController;

class FeedbackController extends BaseController
{
    private $base;
    private $product;

    public function __construct(
        FeedbackRepo $base,
        ProductRepo $product)
    {
        parent::__construct();

        $this->base = $base;
        $this->product = $product;
    }

    public function Index()
    {
        $feedback = $this->base->search();
        $product = $this->product->getSelectProduct();

        return $this->response->Success([
            'feedback' => $feedback,
            'product'  => $product
        ]);
    }


    public function Delete($ids)
    {
        try {
            $ids = explode(',', $ids);
            if (count($ids) <= 0) {
                $this->response->BadRequest("Yêu cầu không hợp lệ");
            }

            $this->base->softDelete($ids, Feedback::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
