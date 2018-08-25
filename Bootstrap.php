<?php

require_once __DIR__ . '/autoload.php';

/**
 * @author dizykov
 * @package test
 *
 */
class Bootstrap
{
	public static function main($argv)
	{
        $statementDataParser = new StatementDataParser();
        $data = $statementDataParser->getData($argv[1]);

        $statementFactory = new StatementFactory();
        $statements = $statementFactory->createStatements($data);

        $statementService = new StatementService();
        $targetName = $argv[2] ?? 'PAY';
        $paymentStatements = $statementService->filterStatementsByName($statements, $targetName);

        $targetDate = $argv[3] ?? '06/03/2011';
        $totalValues = $statementService->getTotalValueForEachCurrencyByDate($paymentStatements, $targetDate);


        if (empty($totalValues)) {
            return print_r("Empty data\n");
        }

        print_r("Totals\n");

        foreach ($totalValues as $key => $totalValue) {
            print_r($key . ' ' . $totalValue . "\n");
        }
	}
}

Bootstrap::main($argv);
