<?php
//-------------------1----------------------
echo "Hello, World!"; //  виводить текст на екран


//-------------------2---------------------
// змінні різних типів
$stringVar = "Простий рядок"; 
$intVar = 77; 
$floatVar = 8.31; 
$boolVar = true; 

// Вивод значення змінних
echo $stringVar;  
echo $intVar;     
echo $floatVar;   
echo $boolVar;    

echo "<br>"; 

// Вивод типу кожної змінної
var_dump($stringVar);  
var_dump($intVar);     
var_dump($floatVar);   
var_dump($boolVar); 

//-----------------3--------------------------
//  дві змінні з рядковими значеннями
$firstName = "Олександр";
$lastName = "Губанов";

// Об'єднання цих змінних в один рядок та вивод результату
$fullName = $firstName . " " . $lastName;
echo $fullName;  


$number = 5;

//-------------------4------------------------
// Перевірка, чи є це число парним або непарним
if ($number % 2 == 0) {
    echo "Число парне"; 
} else {
    echo "Число непарне"; 
}

//-------------------5--------------------
// Цикл for для виведення чисел від 1 до 10
echo "<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}

// Цикл while для виведення чисел від 10 до 1
echo "<br>";
$j = 10;
while ($j >= 1) {
    echo $j . " "; 
    $j--;
}

//-------------------6-------------------
// асоціативний масив
$student = array(
    "name" => "Олександр",
    "surname" => "Губанов",
    "age" => 22,
    "group" => "IKM-M224а"
);

// Вивод значення кожного елемента масиву
echo $student["name"]; 
echo $student["surname"]; 
echo $student["age"]; 
echo $student["group"]; 

//  новий елемент до масиву
$student["average_grade"] = 74.5;

// Вивод оновленого масиву
echo "<br>";
echo "Середній бал: " . $student["average_grade"]; 


//-------------------7-------------------------
// Перевірка, чи були отримані дані через POST
if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    // Отримання значення з форми
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Перевірка, чи не є значення порожніми
    if (empty($firstName) || empty($lastName)) {
        echo "Будь ласка, заповніть всі поля!";
    } else {
        
        echo "Привіт, " . $firstName . " " . $lastName . "!";
    }
} else {
    echo "Дані не отримані.";
}
?>
