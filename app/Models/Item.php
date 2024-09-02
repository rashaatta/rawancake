<?php

namespace App\Models;

use App\Models\Traits\HasMediaTrait;

use App\Models\Traits\Language;
use App\Models\Traits\StatusTrait;
use App\Transformers\ProductsTransformer;
use Carbon\Carbon;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia,Transformable
{
    use HasMediaTrait;
    use HasFactory;
    use StatusTrait;
    use Language;
    protected $CollectionName='products';
    protected $fillable = [
        'id',
        'CatID',
        'Date',
        'blob',
        'Name',
        'NameEN',
        'Description',
        'DescriptionEN',
        'Available',
        'stock',
        'Price',
        'Views',
        'ItemID',

        'Special',
        'operator',
    ];


    protected static $fieldStatusMapping = [
        'Available' => 'statusMapping',
    ];
    protected static $statusMapping = [
        0 => [
            'codeName' => 'available',
        ],
        1 => [
            'codeName' => 'unavailable',
        ]
    ];
    public function subCategory(){
        return $this->belongsTo(Category::class, 'CatID');
    }
    public function offerActive(){
        return $this->hasMany(Offer::class, 'ItemID')->isActive();
    }
    public function price(){
        $offer=$this->offerActive->last();
        return $offer?$offer->NewPrice:$this->Price;
    }
    public function checkStock(){
        return  $this->stock>0?true:false;
    }
    public function scopeIsStock($query){
        return  $query->where('stock','>',0);
    }
    public function transformer()
    {
       return ProductsTransformer::class;
    }

    public function getTitle(){
        return  $this->getLang()=='en'?$this->NameEN: $this->Name;
    }
    public function getDescription(){
        return  $this->getLang()=='en'?$this->DescriptionEN: $this->Description;
    }
    public function optionDetil(){
        return $this->hasMany(OptionDetil::class,'ItemID');
    }

    public function subOption(){
        return $this->hasMany(SubOption::class,'OptID');
    }
    public function getOperator(){
       return empty($this->operator)?[]:json_decode($this->operator);
    }
    public function incrementReadCount() {
        $this->Views++;
        return $this->save();
    }
    public function getAvarg(){
        return floor($this->hasMany(Rating::class,'ItemID')->avg('rate'));
    }
    public function getPercentage(){
      return  self::getAvarg() *20;
    }
    public function getRateCount(){
        return floor($this->hasMany(Rating::class,'ItemID')->count());
    }
    public function isFavorite(){
        if(getLogged()){
            return UserFavorite::where('ItemID',$this->id)->where('UserID',getLogged()->id)->exists();
        }
        return false;
    }
}
