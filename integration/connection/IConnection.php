<?php

interface IConnection {
    public function read($query);
    public function write($query);
}
