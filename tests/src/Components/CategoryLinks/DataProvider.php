<?php

namespace MageSuite\ContentConstructor\Components\CategoryLinks;

interface DataProvider
{
    public function getCategories($mainCategoryId, $subCategoriesIds);
}