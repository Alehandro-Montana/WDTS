<?php
require_once 'SavingsAccount.php';

try {
    $account1 = new BankAccount("USD", 100);
    $account1->deposit(50);
    $account1->withdraw(30);
    echo "Рахунок 1: " . $account1->getBalance() . "<br>";

    $account2 = new BankAccount("UAH", 200);
    $account2->withdraw(50);
    echo "Рахунок 2: " . $account2->getBalance() . "<br>";

    $savings = new SavingsAccount("USD", 200);
    $savings->applyInterest();
    echo "Накопичувальний рахунок 1 після відсотків: " . $savings->getBalance() . "<br>";

    $savings2 = new SavingsAccount("UAH", 500);
    $savings2->deposit(100);
    $savings2->applyInterest();
    echo "Накопичувальний рахунок 2 після відсотків: " . $savings2->getBalance() . "<br>";

    $savings->withdraw(500); // викличе виняток
    $savings2->withdraw(100);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
