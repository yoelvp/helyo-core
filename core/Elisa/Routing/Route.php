<?php

namespace Helyo\Routing;

use Closure;

readonly class Route {
  protected string $uri;
  protected Closure|array $action;
  protected array $parameters;
  protected string $regex;

  public function __construct(string $uri, Closure|array $action) {
    $this->uri = $uri;
    $this->action = $action;
    $this->regex = preg_replace(
      "/\{([a-zA-Z]+)\}/",
      "([a-zA-Z0-9]+)",
      str_replace("/", "\/", $uri)
    );
    preg_match_all("/\{([a-zA-Z]+)\}/", $uri, $parameters);
    $this->parameters = $parameters[1];
  }

  public function uri(): string {
    return $this->uri;
  }

  public function action(): Closure|array {
    return $this->action;
  }

  public function matches(string $path): bool {
    return preg_match("/^$this->regex$/", $path);
  }

  public function hasParameters(): bool {
    return count($this->parameters) > 0;
  }

  /**
   * Register action for HTTP GET method.
   *
   * @param string $path
   * @param Closure|array $callback
   */
  public static function get(string $path, Closure|array $callback) {
    app()->router->get($path, $callback);
  }

  /**
   * Register action for HTTP POST method.
   *
   * @param string $path
   * @param Closure|array $callback
   */
  public static function post(string $path, Closure|array $callback) {
    app()->router->post($path, $callback);
  }
}
