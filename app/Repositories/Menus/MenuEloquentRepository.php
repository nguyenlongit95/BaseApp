<?php
namespace App\Repositories\Menus;

use App\CategoriesProducts;
use App\Products;
use App\ImageProducts;
use App\Rattings;
use App\Repositories\Eloquent;
use App\Repositories\Eloquent\EloquentRepository;

class MenuEloquentRepository extends EloquentRepository implements MenuRepositoryInterface{


    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Menus::class;
    }
}

?>
