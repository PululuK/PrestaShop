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

namespace PrestaShopBundle\Form\Validator\Constraints;

use function get_class;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;

class MultipleEmailsWithSeparator extends Constraint
{
    public const INVALID_EMAILS_ERROR_CODE = 'INVALID_EMAILS_ERROR_CODE';

    /**
     * @var string
     */
    public $separator;

    /**
     * @var string
     */
    public $message;

    public function __construct($options = null)
    {
        if (null !== $options && !is_array($options)) {
            $options = [
                'separator' => $options,
                'message' => null,
            ];
        }

        parent::__construct($options);

        if (null === $this->separator) {
            throw new MissingOptionsException(sprintf('Option "separator" must be given for constraint %s', __CLASS__), ['separator']);
        }
    }

    public function validatedBy(): string
    {
        return get_class($this) . 'Validator';
    }
}
