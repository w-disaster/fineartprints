<?php

class PriceCalculator {

    private $base_price = 0.0;
    private $discounted_price = 0.0;
    private $height = 0.0;
    private $width = 0.0;
    private $technique_price = 0.0;
    private $frame_price = 0.0;
    private $passpartout_price = 0.0;
    private $price_divider = 0.0;

    public function __construct($price_divider){
        $this->price_divider = $price_divider;
    }

    public function setBasePrice($base_price) {
        $this->base_price = $base_price;
    }

    public function setDiscountedPrice($discounted_price) {
        $this->discounted_price = $discounted_price;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setTechniquePrice($technique_price) {
        $this->technique_price = $technique_price;
    }

    public function setFramePrice($frame_price) {
        $this->frame_price = $frame_price;
    }

    public function setPasspartoutPrice($passpartout_price) {
        $this->passpartout_price = $passpartout_price;
    }

    public function computePrice() {
        $delta = ($this->base_price * $this->price_divider) + $this->technique_price + $this->passpartout_price;
        return number_format($this->base_price + $this->frame_price + $delta * ($this->height + $this->width), 2, '.', '');
    }

    public function computeDiscountedPrice() {
        $delta = ($this->discounted_price * $this->price_divider) + $this->technique_price + $this->passpartout_price;
        return number_format($this->discounted_price + $this->frame_price + $delta * ($this->height + $this->width), 2, '.', '');
    }
}

?>