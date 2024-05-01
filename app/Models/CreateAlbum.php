<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreateAlbum extends Model
{
    use HasFactory;
    protected $table = 'crate_album';


    protected $fillable = ['aName','maxPic','action'];

    public function images(){
       return $this->hasMany(ImageGallery::class);
    }
}
