<?php

class StatementFactory
{
    /**
     * @return Statement[]
     */
    public function createStatements(array $data): array
    {
        foreach ($data as $datum) {
            $statements[] = new Statement(
                $datum['Date'],
                $datum['Narrative1'],
                $datum['Narrative2'],
                $datum['Narrative3'],
                $datum['Narrative4'],
                $datum['Narrative5'],
                $datum['Type'],
                floatval($datum['Debit']),
                floatval($datum['Credit']),
                $datum['Currency']
            );
        }

        return $statements ?? [];
    }
}
