<?php

it('has qualquercoisa page', function () {
    $response = $this->get('/qualquercoisa');

    $response->assertStatus(200);
});
