<?php

/**
 * FOSSBilling.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 *
 * Copyright FOSSBilling 2022
 * This software may contain code previously used in the BoxBilling project.
 * Copyright BoxBilling, Inc 2011-2021
 *
 * This source file is subject to the Apache-2.0 License that is bundled
 * with this source code in the file LICENSE
 */

/**
 * Example module Admin API.
 *
 * API can be access only by admins
 */

namespace Box\Mod\Example\Api;

class Admin extends \Api_Abstract
{
    /**
     * Return list of example objects.
     *
     * @return string[]
     */
    public function get_something($data): array
    {
        $result = [
            'apple',
            'google',
            'facebook',
        ];

        if (isset($data['microsoft'])) {
            $result[] = 'microsoft';
        }

        return $result;
    }

    /**
     * An example that checks if the staff member has permission to the `do_something` permission key.
     * 
     * @return bool 
     */
    public function can_do_something($data)
    {
        // First, get an instance of the staff module
        $staff_service = $this->di['mod_service']('Staff');

        /* Next, we use the staff module to check if the current staff member has permission.
         * We pass `null` to the first parameter to tell it to check against current staff member
         * The second parameter `example` is the name of the module
         * The third parameter is the name of the permission key we are checking (`do_something`)
         */
        if (!$staff_service->hasPermission(null, 'example', 'do_something')) {
            throw new \FOSSBilling\InformationException('You do not have permission to perform this action', [], 403);
        }

        return true;
    }


    /**
     * An example that checks if the staff member has permission to the `a_select` permission key depending on the specific constraint set.
     * 
     * @return bool 
     */
    public function check_select($data)
    {
        $data['constraint'] ??= 'value_1';

        // First, get an instance of the staff module
        $staff_service = $this->di['mod_service']('Staff');

        /* Next, we use the staff module to check if the current staff member has permission.
         * We pass `null` to the first parameter to tell it to check against current staff member
         * The second parameter `example` is the name of the module
         * The third parameter is the name of the permission key we are checking (`a_select`)
         * The final parameter is the contraint we want to apply for the staff member's permission. When using the select type pemission, this is how you check if they have a specific one. (`value_1` for example)
         */
        if (!$staff_service->hasPermission(null, 'example', 'a_select', $data['constraint'])) {
            throw new \FOSSBilling\InformationException('You do not have permission to perform this action', [], 403);
        }

        return true;
    }
}
