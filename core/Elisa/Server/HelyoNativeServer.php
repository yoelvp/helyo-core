<?php

namespace Helyo\Server;

class HelyoNativeServer implements NativeServer {
  /**
   * {@inheritdoc}
   */
  public function get(string $key): mixed {
    return $_SERVER[$key];
  }

  /**
   * {@inheritdoc}
   */

  public function queryParams(): array {
    return $_GET;
  }
  /* public function queryParams(): array { */
  /*   return $_GET; */
  /* } */
}
