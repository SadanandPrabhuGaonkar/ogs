<?php

namespace Application\Controller\PageType;


use Concrete\Core\Page\Controller\PageTypeController;
use Concrete\Core\Page\PageList;

class Menu extends PageTypeController
{
    public function view() {
        $currentPageID = $this->getPageObject()->getCollectionID();

        $pl = new PageList();
        $pl->filterByParentID($currentPageID);
        $pl->filterByPageTypeHandle('parent_category');
        $pl->sortByDisplayOrder();
        $pages = $pl->getResults();
        $this->set('pages', $pages);
    }
}