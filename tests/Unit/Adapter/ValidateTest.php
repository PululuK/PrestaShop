<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use PrestaShop\PrestaShop\Adapter\Validate;

class ValidateTest extends TestCase
{
    /**
     * @var Validate
     */
    private $validate;

    /**
     * @param string $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validate = new Validate();
    }

    /**
     * @dataProvider getIsOrderWay
     */
    public function testIsOrderWay(int $expected, $input): void
    {
        self::assertEquals($expected, Validate::isOrderWay($input));
    }

    public function getIsOrderWay(): iterable
    {
        yield [0, 'test'];
        yield [0, 1];
        yield [0, true];
        yield [1, 'ASC'];
        yield [1, 'DESC'];
        yield [1, 'asc'];
        yield [1, 'desc'];
    }

    /**
     * @param bool $expected
     * @param string $email
     *
     * @dataProvider isEmailDataProvider
     */
    public function testIsEmail(bool $expected, string $email): void
    {
        $this->assertSame($expected, $this->validate->isEmail($email));
    }

    /**
     * @param bool $expected
     * @param string $data
     *
     * @dataProvider isStringDataProvider
     */
    public function testIsString(bool $expected, string $data): void
    {
        $this->assertSame($expected, $this->validate->isString($data));
    }

    public function isStringDataProvider(): array
    {
        return [
            [true, 'jdkiizdù%'],
            [true, ' '],
            [true, '666xlkQM'],
            [true, '666'],
            [true, 'true'],
            [true, 'false'],
            [true, 'null'],
        ];
    }

    public function isEmailDataProvider(): array
    {
        return [
            [true, 'john.doe@prestashop.com'],
            [true, 'john.doe+alias@prestshop.com'],
            [true, 'john.doe+alias@pr.e.sta.shop.com'],
            [true, 'j@p.com'],
            [true, 'john#doe@prestashop.com'],
            [false, ''],
            [false, 'john.doe@prestashop,com'],
            [true, 'john.doe@prestashop'],
            [true, 'john.doe@сайт.рф'],
            [true, 'john.doe@xn--80aswg.xn--p1ai'],
            [false, 'иван@prestashop.com'], // rfc6531 valid but not swift mailer compatible
            [true, 'xn--80adrw@prestashop.com'],
            [true, 'xn--80adrw@xn--80aswg.xn--p1ai'],
        ];
    }
}
