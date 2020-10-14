<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class inboxModel extends Model
{
    protected $table='inbox_campaigns';
    protected $fillable=['id','title','link','status','description','date','zone','limit','import_csv','block'];
}
