<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\View\Component;

class CardNews extends Component
{
    public $news;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news->paginate(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-news');
    }
}
