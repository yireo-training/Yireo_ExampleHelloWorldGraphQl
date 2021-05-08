<?php declare(strict_types=1);

namespace Yireo\ExampleHelloWorldGraphQl\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class HelloWorld implements ResolverInterface
{
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['name'])) {
            throw new GraphQlInputException(__('Name is required'));
        }

        return [
            'name' => $args['name'],
            'greeting' => 'Hello ' . $args['name']
        ];
    }
}
