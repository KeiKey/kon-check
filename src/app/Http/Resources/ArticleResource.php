<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="Article",
 *     title="Article",
 *     @OA\Property(property="uuid", type="string", example="389ffffe-b89c-47b6-bc63-cf5fd2a88218"),
 *     @OA\Property(property="content", type="string", example="example@example.com"),
 *     @OA\Property(property="type", type="string", example="Text"),
 *     @OA\Property(property="result", type="string", example="example@example.com"),
 *     @OA\Property(property="created_at", type="string", example="example@example.com")
 * )
 */
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid"       => $this->uuid,
            "content"    => $this->content,
            "type"       => $this->type,
            "result"     => $this->result,
            "created_at" => $this->created_at
        ];
    }
}
