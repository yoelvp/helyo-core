<?php

namespace Helyo\Server;

interface NativeServer {
  public function get(string $key): mixed;
  public function queryParams(): array;
}
