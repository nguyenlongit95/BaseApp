<?php
    var_dump($CategoryProducts);
?>

<form action="addNewCategoryProduct" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="NameCategory" value="Name of categories">
    <input type="text" name="Info" value="iste nulla quia similique veritatis voluptate. Accusantium animi minus recusandae vero. Iste, magnam voluptas.">
    <select name="Parent_id" id="">
        <option value="0">New Category</option>
        @foreach($CategoryProducts as $categoryProduct)
        <option value="{{ $categoryProduct->id }}"> {{ $categoryProduct->NameCategory }} </option>
        @endforeach
    </select>
    <input type="submit" value="submit">
</form>
