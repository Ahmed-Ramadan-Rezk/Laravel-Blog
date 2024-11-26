<?php

it('returns a successful response in home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
