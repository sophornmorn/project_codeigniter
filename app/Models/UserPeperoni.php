<?php namespace App\Models;

use CodeIgniter\Model;

class UserPeperoni extends Model
{
    protected $table      = 'menu_pizza';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'price','ingredient'];
    
}