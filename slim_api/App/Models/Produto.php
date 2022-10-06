<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Produto extends Model
{
	protected $fillable = ['titulo','descricao','preco','fabricante','created_at','updated_at'];
}