<?php

namespace Source\Core;

use Source\Support\Message;
use Source\Support\Seo;

/**
 *
 * @author Gabriel Gomes <gabrielgomessdasilva13@gmail.com>
 * @package Source\Models
 */
class Controller
{
    /** @var View */
    protected $view;

    /** @var Seo */
    protected $seo;

    /** @var Message */
    protected $message;

    /**
     * Controller constructor.
     * @param string|null $pathToViews
     */
    public function __construct(?string $pathToViews = null)
    {
        $this->view = $pathToViews ? new View($pathToViews) : null;
        $this->seo = new Seo();
        $this->message = new Message();
    }
}