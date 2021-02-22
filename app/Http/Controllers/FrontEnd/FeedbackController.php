<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Feedback\StoreRequest;
use App\Repos\FeedbackRepo;
use App\Repos\ProductRepo;
use Support\Http\Controllers\BaseController;

class FeedbackController extends BaseController
{
    private $feedback;
    private $product;

    public function __construct(FeedbackRepo $feedback,
                                ProductRepo $product)
    {
        parent::__construct();

        $this->feedback = $feedback;
        $this->product = $product;
    }

    public function Feedback(StoreRequest $request, $id)
    {
        try {
            if (!$product = $this->product->findActive($id)) {
                return abort(404);
            }
            $this->feedback->create($request->data());
            return redirect()->back();
        } catch (\Exception $ex) {
            return abort(500);
        }

    }
}
