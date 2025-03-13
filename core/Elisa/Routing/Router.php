<?php

namespace Helyo\Routing;

use Closure;
use Helyo\Http\HttpMethod;

readonly class Router {
  protected array $routes;

  /**
   * Register action for HTTP GET method.
   *
   * @param string $path
   * @param Closure|array $action
   */
  public function get(string $path, Closure|array $action) {
    echo "helo";
    $this->routes[HttpMethod::GET->value][] = new Route($path, $action);
  }
}
