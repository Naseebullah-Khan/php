<?php

use Core\Validator;

it(description: "Validates a string", closure: function (): void {
    expect(value: Validator::string(value: "foobar"))->toBeTrue();
    expect(value: Validator::string(value: false))->toBeFalse();
});

it(description: "Validates a string with a minimum length", closure: function (): void {
    expect(value: Validator::string(value: "foobar", min: 6))->toBeTrue();
    expect(value: Validator::string(value: "foo", min: 6))->toBeFalse();
});

it(description: "Validates an email", closure: function (): void {
    expect(value: Validator::email(value: "foobar@gmail.com"))->toBeTrue();
    expect(value: Validator::email(value: "foobar@gma"))->toBeFalse();
});

it(description: "Validates that a number is greater than a given number", closure: function (): void {
    expect(value: Validator::greaterThan(10, 20))->toBeFalse();
    expect(value: Validator::greaterThan(20, 10))->toBeTrue();
});
