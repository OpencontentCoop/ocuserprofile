<?php

class OCUserProfileProvider implements ezpRestProviderInterface
{
    /**
     * Returns registered versioned routes for provider
     *
     * @return array Associative array. Key is the route name (beware of name collision !). Value is the versioned route.
     */
    public function getRoutes()
    {
        $routes = array(
            'OCMe'  => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/profile', 'OCUserProfileController', 'viewProfile' ), 1 ),
        );
        return $routes;
    }

    /**
     * Returns associated with provider view controller
     *
     * @return ezpRestViewController
     */
    public function getViewController()
    {
        return new ezpRestApiViewController();
    }
}
