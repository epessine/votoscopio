<?php

test('seed pools command should be successful', function () {
    $this->artisan('app:seed-pools')->assertSuccessful();
});
