<?php

$router->post('/webhook/apple', 'WebhookController@handleApple');
$router->post('/webhook/stripe', 'WebhookController@handleStripe');