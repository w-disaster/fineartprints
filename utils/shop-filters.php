<?php

require_once 'utils/functions.php';

class ShopFilters{
    
    private $filtered_authors;
    private $filtered_categories;
    private $order;

    public function setFilteredAuthors($authors){
        $this->filtered_authors = $authors;
    }

    public function setFilteredCategories($categories){
        $this->filtered_categories = $categories;
    }

    public function setOrderFilter($order){
        $this->order = $order;
    }
    
    function filter_pictures_by_authors($pictures){
        $pictures = array_filter($pictures, function($picture){
            return in_array($picture["Author"], $this->filtered_authors);
        });
        return $pictures;
    }
    
    function filter_pictures_by_categories($pictures){
        $pictures = array_filter($pictures, function($picture){
            return in_array($picture["Category_name"], $this->filtered_categories);
        });
        return $pictures;
    }
    
    function filter_pictures_in_sale($pictures){
        $pictures = array_filter($pictures, function($picture){
            return $picture["Discount"] > 0;
        });
        return $pictures;
    }

    function filter_order($pictures){
        switch($this->order){
            case "none":
                break;
            case "publish_date":
                usort($pictures, function($a, $b) {
                    return strtotime($b['Publish_date']) - strtotime($a['Publish_date']);
                });
                break;
            case "cost_rising":
                usort($pictures, function($a, $b) {
                    return discounted_price($a['Base_price'], $a["Discount"]) - discounted_price($b['Base_price'], $b["Discount"]);
                });                
                break;
            case "cost_decreasing":
                usort($pictures, function($a, $b) {
                    return discounted_price($b['Base_price'], $b["Discount"]) - discounted_price($a['Base_price'], $a["Discount"]);
                });                
                break;
            default: 
                throw new BadMethodCallException('unexpected value provided as order name');
                break;
        }
        return $pictures;
    }
}

?>