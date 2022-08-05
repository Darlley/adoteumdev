<?php

it('has page teste', function(){
    $response = $this->get('/teste');

    $response->assertStatus(200);
});