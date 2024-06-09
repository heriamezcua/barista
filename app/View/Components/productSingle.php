<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class productSingle extends Component
{

    public $product;
    public $ratingInfo;

    /**
     * Create a new component instance.
     */
    public function __construct(Product $product, $ratingInfo)
    {
        $this->product = $product;
        $this->ratingInfo = $ratingInfo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-single');
    }
}
