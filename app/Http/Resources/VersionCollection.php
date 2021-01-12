<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VersionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection->map(function ($each) {
                unset($each->id,$each->created_at,$each->updated_at);// ไม่ให้แสดง
                $each->demo = $each->files; // map key เขึ้นมาใหม่
                return $each;
            })
        ];
    }
    public function with($request)
    {
        return[
            'version' =>'1.0'
        ];
    }
}
