<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post';
    protected $fillable = ['post_id', 'category_id']; // createMany() -> requires to have fillable defined
    public $timestamps = false; // disable the automatic timestamps (created_a)

    # Where is the list of categories licated, what table? Its on categories table.
    # We will create method relationship that will connect the
    # categoryPost model (table) to the category model (table)
    # Use this method to get the name of the category
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
