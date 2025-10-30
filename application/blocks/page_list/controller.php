<?php
namespace Application\Block\PageList;

use Concrete\Block\PageList\Controller as BaseController;
use Concrete\Core\Page\Page;
use Core;

class Controller extends BaseController {
    protected function getBlockTemplateName(){
        return $this->getBlockObject()->getBlockFilename();
    }

    public function view()
    {
        switch ($this->getBlockTemplateName()) {
            case "brand-boutiques":
            case "brand-boutiques-grid":
            case "r-concepts":
                $category = Core::make('helper/text')->sanitize($this->get("category"));
                if($category) $this->list->filterByAttribute("services_offered", $category);
                break;
            case "news-slider":
                $category = Page::getCurrentPage()->getAttribute("services_offered");
                if($category && ($category = (string)reset(iterator_to_array($category)))) $this->list->filterByAttribute("services_offered", $category);
                $this->list->filterByAttribute("exclude_block", false);
                break;
        }

        parent::view();
    }
}
