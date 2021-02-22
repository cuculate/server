<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use App\Repos\ContactRepo;
use Support\Http\Controllers\BaseController;

class ContactController extends BaseController
{
    private $base;

    public function __construct(
        ContactRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            return $this->response->Success(['contact' => $this->base->search()]);
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

            $this->base->softDelete($ids, Contact::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
