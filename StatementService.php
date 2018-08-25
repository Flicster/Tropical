<?php

class StatementService
{
    public const PAYMENT_NAME_PREFIX = 'PAY';

    /**
     * @param Statement[]
     *
     * @return Statement[]
     */
    public function filterStatementsByName(array $statements, string $name): array
    {
        foreach ($statements as $statement) {
            if ($name === self::PAYMENT_NAME_PREFIX && $this->isPayment($statement)) {
                $paymentStatements[] = $statement;
                continue;
            }

            if ($statement->getName() === $name) {
                $paymentStatements[] = $statement;
            }
        }

        return $paymentStatements ?? [];
    }

    /**
     * @param Statement[]
     */
    public function getTotalValueForEachCurrencyByDate(array $paymentStatements, string $date): array
    {
        $totalValues = [];

        foreach ($paymentStatements as $paymentStatement) {
            if ($paymentStatement->getDate() !== $date) {
                continue;
            }

            if (isset($totalValues[$paymentStatement->getCurrency()])) {
                $totalValues[$paymentStatement->getCurrency()] += $paymentStatement->getDebit();
            } else {
                $totalValues[$paymentStatement->getCurrency()] = $paymentStatement->getDebit();
            }
        }

        return $totalValues;
    }

    private function isPayment(Statement $statement): bool
    {
        return  substr($statement->getName(), 0, 3) === self::PAYMENT_NAME_PREFIX;
    }
}
