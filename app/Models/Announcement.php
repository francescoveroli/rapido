<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{   
   use HasFactory;
   use Searchable;
   
   
   public function toSearchableArray()
   {
      $array = [

         'id'=>$this->id,
         'title'=>$this->title,
         'body'=>$this->body,
         'category'=>$this->category->name,
         'other'=>'$announcements announcement',

      ];

      return $array;
   }
   
   
   
   public function category()
   {
      return $this->belongsTo(Category::class);
   }
   
   public function user()
   {
      return $this->belongsTo(User::class);
   }

   
  public function images()
  {
      return $this->HasMany(AnnouncementImage::class);
  }


   static public function ToBeRevisionedCount()
   {
      return Announcement::where('is_accepted', null)->count();
   }

   
}
