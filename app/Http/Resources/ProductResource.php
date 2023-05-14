<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public $status;
    public $message;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function __construct($status,$message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray($request)
    {
        return [
            // 'id' => $this->id,
            // 'product_name' => $this->product_name,
            // 'variants' => $this->variants,
            // 'product_categories' => $this->product_categories,
            // 'product_images' => $this->product_images

            'message' => $this->message,
            'success' => $this->status,
            'data' => $this->resource

        ];
    }
}
