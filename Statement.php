<?php

class Statement
{
    private $date;
    private $name;
    private $code;
    private $recipient;
    private $company;
    private $state;
    private $type;
    private $debit;
    private $credit;
    private $currency;

    public function __construct(
        string $date,
        string $name,
        string $code,
        string $recipient,
        string $company,
        string $state,
        string $type,
        float $debit,
        float $credit,
        string $currency
    ) {
        $this->date = $date;
        $this->name = $name;
        $this->code = $code;
        $this->recipient = $recipient;
        $this->company = $company;
        $this->state = $state;
        $this->type = $type;
        $this->debit = $debit;
        $this->credit = $credit;
        $this->currency = $currency;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDebit(): float
    {
        return $this->debit;
    }

    public function getCredit(): float
    {
        return $this->credit;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
