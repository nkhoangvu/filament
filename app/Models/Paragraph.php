<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $table = 'paragraphs';
    public $timestamps = true;
      
    protected $fillable = [
        'page_id',
        'dis_order',
        'title',
        'title_enable',
        'paragraph',
    ];
    
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
