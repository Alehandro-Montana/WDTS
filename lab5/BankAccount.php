<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    protected $balance;
    protected $currency;

    const MIN_BALANCE = 0;

    public function __construct($currency, $initialBalance = 0) {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення має бути додатною");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття має бути додатною");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів на рахунку {$this->currency} для зняття {$amount}.");
        }
        $this->balance -= $amount;
        echo "З рахунку в валюті {$this->currency} було знято {$amount} {$this->currency}. Поточний баланс: {$this->balance} {$this->currency}.<br>";
    }

    public function getBalance() {
        return $this->balance . ' ' . $this->currency;
    }
}
