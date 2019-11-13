<?php

$container->loadFromExtension('framework', [
    'serializer' => true,
    'messenger' => [
        'serializer' => [
            'default_serializer' => 'messenger.transport.symfony_serializer',
        ],
        'routing' => [
            'Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Messenger\DummyMessage' => ['amqp', 'audit'],
            'Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Messenger\SecondMessage' => [
                'senders' => ['amqp', 'audit'],
            ],
            '*' => 'amqp',
        ],
        'transports' => [
            'amqp' => 'amqp://localhost/%2f/messages',
        ],
    ],
]);
