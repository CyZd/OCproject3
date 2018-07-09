<?php
namespace OCFram;

class Router
{
  protected $routes = [];

  const NO_ROUTE = 1;

  public function addRoute(Route $route)
  {
    if (!in_array($route, $this->routes))
    {
      $this->routes[] = $route;
    }
  }

  public function getRoute($url)
  {
    foreach ($this->routes as $route)
    {
      // Si la route correspond à l'URL
      if (($varsValues = $route->match($url)) !== false)
      {
        // Si cette route a des variables
        if ($route->hasVars())
        {
          $varsNames = $route->varsNames();
          $listVars = [];

          // On crée un nouveau tableau clé/valeur
          foreach ($varsValues as $key => $match)
          {
            // On garde la première valeur 
            if ($key !== 0)
            {
              $listVars[$varsNames[$key-1]] = $match;
              
            }

          }


          // On assigne ce tableau de variables � la route
          $route->setVars($listVars);
        }

        return $route;
      }

    }

    throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
  }
}