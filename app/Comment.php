<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    /**
     * Get the books that belong to this Author
     */
    // public function books()
    // {
    //     return $this->belongsTo('\App\Book');
    // }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','book_id','ip_address'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}