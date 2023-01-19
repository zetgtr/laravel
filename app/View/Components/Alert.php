<?php
declare(strict_types=1);
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    public string $type;
    public string $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type,string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return \view('components.alert');
    }
}
