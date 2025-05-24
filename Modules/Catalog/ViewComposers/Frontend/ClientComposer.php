<?php

namespace Modules\Catalog\ViewComposers\Frontend;

use Modules\Catalog\Repositories\Frontend\ClientRepository as Client;
use Illuminate\View\View;
use Cache;

class ClientComposer
{
    public function __construct(Client $client)
    {
        $this->clients =  $client->getLimitedClients();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('clients', $this->clients);
    }
}
