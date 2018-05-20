<?php

namespace App\Mappers\Responses;

class HistoryResponseMapper
{   
    public function transform($data)
    {
        return [
            "histories" => $this->transformHistory($data->getCollection()),
            "pagination" => $this->getPagination($data)
        ];
    }
    
    private function transformHistory($data)
    {
        return $data->map(function ($item) {
            return [
                "id" => $item->id,
                "user" => [
                    "id" => $item->follows->following->id,
                    "name" => $item->follows->following->name,
                    "avatar" => $item->follows->following->avatar,
                    "self" => ""
                ],
                "action" => $item->action->template,
                "product" => $this->getProduct($item->product),
                "link" => $this->getLink($item->link),
                "message" => $item->additional_message,
                "sponsored" => ($item->sponsored == 1)
            ];
        });
    }
    
    private function getLink($link)
    {
        if (!is_null($link)) {
            return [
                "title" => $link->title
            ];
        }
        
        return null;
    }
    
    private function getProduct($product)
    {
        if (!is_null($product)) {
            return [
                "name" => $product->name,
                "url" => $product->url,
                "image" => $product->image
            ];
        }
        
        return null;
    }
    
    private function getPagination($data)
    {
        return [
            "page" => $data->currentPage(),
            "per_page" => $data->perPage(),
            "total_pages" => $data->total()
        ];
    }
}