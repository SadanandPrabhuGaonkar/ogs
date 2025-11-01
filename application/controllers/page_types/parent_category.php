<?php

namespace Application\Controller\PageType;


use Concrete\Core\Page\Controller\PageTypeController;
use Concrete\Core\Page\PageList;

class ParentCategory extends PageTypeController
{
    public function view() {
        $currentPageID = $this->getPageObject()->getCollectionID();

        $pl = new PageList();
        $pl->filterByParentID($currentPageID);
        $pl->filterByPageTypeHandle('category');
        $pl->sortByDisplayOrder();
        $pages = $pl->getResults();
        $this->set('pages', $pages);
    }
}