<?php

declare(strict_types=1);

namespace App\Services;

final class UserNotificationProcessor
{
    public function __construct(
        private readonly ?\Closure $emailSender = null,
    ) {
    }

    public function process(array $user): bool
    {
        if ($user === []) {
            return false;
        }

        if (empty($user['active'])) {
            return false;
        }

        if (empty($user['email'])) {
            return false;
        }

        $this->dispatchEmail($user['email']);

        return true;
    }

    private function dispatchEmail(string $email): void
    {
        if ($this->emailSender !== null) {
            ($this->emailSender)($email);
            return;
        }

        if (function_exists('sendEmail')) {
            \sendEmail($email);
        }
    }
}
