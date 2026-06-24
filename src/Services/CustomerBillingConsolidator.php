<?php

declare(strict_types=1);

namespace App\Services;

final class CustomerBillingConsolidator
{
    public function consolidate(array $orders): array
    {
        $totals = [];

        foreach ($orders as $order) {
            $customerId = $order['customer_id'];
            $totals[$customerId] = ($totals[$customerId] ?? 0) + $order['total'];
        }

        return $totals;
    }
}
