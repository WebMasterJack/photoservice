<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->title,
            'datatime'=>$this->created_at->format('H:m d.m.Y'),
            'anons'=>$this->anons,
            'text'=>$this->text,
            'tags'=>$this->tags->pluck('name'),
            'image'=>asset('storage/post_images/'.$this->image)
            
        ];
    }
}
