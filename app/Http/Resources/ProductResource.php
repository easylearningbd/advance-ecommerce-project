<?php

namespace App\Http\Resources;

use Behamin\BResources\Resources\BasicResource;

class ProductResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        return [
            "id" => (integer)$resource->id,
            "brand_id" => (integer)$resource->brand_id,
            "category_id" => (integer)$resource->category_id,
            "subcategory_id" => (integer)$resource->subcategory_id,
            "subsubcategory_id" => (integer)$resource->subsubcategory_id,
            "product_name_en" => $resource->product_name_en,
            "product_name_hin" => $resource->product_name_hin,
            "product_slug_en" => $resource->product_slug_en,
            "product_slug_hin" => $resource->product_slug_hin,
            "product_code" => $resource->product_code,
            "product_qty" => (integer)$resource->product_qty,
            "product_tags_en" => $resource->product_tags_en,
            "product_tags_hin" => $resource->product_tags_hin,
            "product_size_en" => $resource->product_size_en,
            "product_size_hin" => $resource->product_size_hin,
            "product_color_en" => $resource->product_color_en,
            "product_color_hin" => $resource->product_color_hin,
            "selling_price" => (integer)$resource->selling_price,
            "discount_price" => (integer)$resource->discount_price,
            "short_descp_en" => $resource->short_descp_en,
            "short_descp_hin" => $resource->short_descp_hin,
            "long_descp_en" => $resource->long_descp_en,
            "long_descp_hin" => $resource->long_descp_hin,
            "product_thambnail" => $resource->product_thambnail,
            "hot_deals" => $resource->hot_deals,
            "featured" => $resource->featured,
            "special_offer" => $resource->special_offer,
            "special_deals" => $resource->special_deals,
            "status" => $resource->status,
            "created_at" => $resource->created_at,
            "updated_at" => $resource->updated_at,
            "digital_file" => $resource->digital_file,
            "user_order_date" => $resource->user_order_date,
            "action_type" => $resource->action_type,
            "action" => $resource->action,
        ];
    }
}
