<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Books",
 *     title="Books",
 *     description="Books model",
 *     @OA\Property(property="id", type="integer", format="int64", description="Book ID"),
 *     @OA\Property(property="title", type="string", description="Book title"),
 *     @OA\Property(property="author", type="string", description="Book author"),
 *     @OA\Property(property="isbn", type="string", description="Book ISBN"),
 *     @OA\Property(property="cover_image", type="string", description="Book cover image URL"),
 *     @OA\Property(property="description", type="string", description="Book description"),
 *     @OA\Property(property="quantity", type="integer", description="Book quantity"),
 *     @OA\Property(property="available", type="boolean", description="Book availability status"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last updated date")
 * )
 */
class Books extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'cover_image',
        'description',
        'quantity',
        'available'
    ];
}