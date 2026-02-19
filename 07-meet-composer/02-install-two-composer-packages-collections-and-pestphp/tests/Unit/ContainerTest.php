<?php

use Core\Container;

test(description: 'it can resolve something out of container', closure: function (): void {
    // arrange
    $container = new Container();

    $container->bind(key: "foo", resolver: fn(): string => "bar");

    // act
    $result = $container->resolve(key: "foo");

    // assert/expect
    expect(value: $result)->toEqual(expected: "bar");
});
