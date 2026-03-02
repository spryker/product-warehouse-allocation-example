<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ProductWarehouseAllocationExample;

use Orm\Zed\Stock\Persistence\SpyStockProductQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \Spryker\Zed\ProductWarehouseAllocationExample\ProductWarehouseAllocationExampleConfig getConfig()
 */
class ProductWarehouseAllocationExampleDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const STOCK_PRODUCT_QUERY = 'STOCK_PRODUCT_QUERY';

    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);
        $container = $this->addStockProductQuery($container);

        return $container;
    }

    protected function addStockProductQuery(Container $container): Container
    {
        $container->set(static::STOCK_PRODUCT_QUERY, $container->factory(function () {
            return SpyStockProductQuery::create();
        }));

        return $container;
    }
}
