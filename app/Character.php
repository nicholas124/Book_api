<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Character extends Model
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
        'name','gender','culture','born','died','title','book_id'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}