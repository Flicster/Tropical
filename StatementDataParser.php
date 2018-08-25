<?php

class StatementDataParser
{
    public function getData(string $fileName): array
    {
        $rawData = $this->getRawData($fileName);

        return $this->normalize($rawData);
    }

    private function normalize(array $rawData): array
    {
        $columns = array_shift($rawData);

        foreach ($rawData as $rawDatum) {
            $data[] = array_combine($columns, $rawDatum);
        }

        return $data ?? [];
    }

    private function getRawData(string $fileName): array
    {
        $handle = fopen($fileName, "r");

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $rawData[] = array_map('trim', explode(',', str_replace(' ', '', $line)));
            }
        } else {
            throw new RuntimeException('File not found');
        }

        return $rawData ?? [];
    }
}
