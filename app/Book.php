<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    /**
     * Get the author that this book belongs to
     */
    public function author()
    {
        return $this->belongsTo('\App\Author');
    }

    public function comment()
    {
        return $this->belongsTo('\App\Comment');
    }

    public function character()
    {
        return $this->belongsTo('\App\Character');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url','name', 'isbn','number_of_pages', 'publisher','country', 'media_type','released', 'author_id'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}