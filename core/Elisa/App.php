<?php

namespace Helyo;

use Helyo\Http\Request;
use Helyo\Routing\Router;
use Helyo\Server\NativeServer;

class App {
  /**
   * Root directory of a user code
   */
  public static string $ROOT;

  /**
   * Router instance
   */
  public Router $router;
  public Request $request;

  /**
   * Create a new app instance
   *
   * @param string $root Source code root directory
   * @return self
   */
  public static function bootstrap(string $root) {
    self::$ROOT = $root;

    return singleton(self::class)
      ->setHttpHandlers();
  }

  /**
   * Prepare request, response,
   */
  protected function setHttpHandlers() {
    $this->request = singleton(Request::class, fn () => new Request(app(NativeServer::class)));
    $this->router = singleton(Router::class);
    return $this;
  }
}
