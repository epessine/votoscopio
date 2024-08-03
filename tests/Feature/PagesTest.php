<?php

use function Pest\Laravel\get;

test('it should render about page', function () {
    get('about')->assertOk();
});

test('it should render contribute page', function () {
    get('contribute')->assertOk();
});
