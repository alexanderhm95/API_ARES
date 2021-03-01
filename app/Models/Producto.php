<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $table = 'modelo_producto';
    protected $primarykey = 'prod_id';
    protected $fillable = ['precio', 'nombre', 'existencia',  'estado', 'date_created'];
    public $timestamps = false; //no se guarda los valores del created_at y update_at
    //public $timestamps = true;
    #protected $hidden = [
    
    #    "cli_id"        
    #];
}
