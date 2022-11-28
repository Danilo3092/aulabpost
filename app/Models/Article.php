<?php

namespace App\Models;

use App\Models\Tag;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    /*
    - Titolo
    - Sottotitolo
    - Corpo del Testo
    - Immagine di copertina
    */
    
    protected $fillable = [
        'title',
        'description',
        'body',
        'img',
        'user_id',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
