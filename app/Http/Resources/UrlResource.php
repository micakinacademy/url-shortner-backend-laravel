<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'url_link' => $this->url_link,
            'url_visit' => $this->url_visit,
            'short_url' => "https://www.ubit.tk/" . $this->url_slug,
        ];
    }
}
