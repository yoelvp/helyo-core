<?php

namespace Helyo\Http;

use Helyo\Server\NativeServer;

readonly class Request {
  private string $path;
  private HttpMethod $method;

  public function __construct(NativeServer $server) {
    $this->path = parse_url($server->get("REQUEST_URI"), PHP_URL_PATH);
    $this->method = HttpMethod::from($server->get("REQUEST_METHOD"));

    return $this;
  }

  /**
   * Get the path portion of the URI (example: yoelvalverde.com/route/1 returns /route/1)
   *
   * @return string
   */
  public function path(): string {
    return $this->path;
  }

  /**
   * Get the request HTTP method.
   * @return HttpMethod
   */
  public function method(): HttpMethod {
    return $this->method;
  }

  /**
   * Get specific key from request data.
   *
   * @return ?string
   */
  /* public function get(string $key): ?string { */
  /*   return $this->data[$key] ?? null; */
  /* } */
}
