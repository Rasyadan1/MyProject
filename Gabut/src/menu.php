<?php
class MenuItem {
    public $name;
    public $price;
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}
class Order {
    public $item;
    public $quantity;

    public function __construct($item, $quantity) {
        $this->item = $item;
        $this->quantity = $quantity;
    }

    public function calculateTotal() {
        return $this->item->price * $this->quantity;
    }
}

// Define menu items
$coffeeMenu = [
    new MenuItem("Espresso", 30000),
    new MenuItem("Coffee Latte", 35000),
    new MenuItem("Cappuccino", 32000)
];

$nonCoffeeMenu = [
    new MenuItem("Milk Chocolate", 30000),
    new MenuItem("Matcha", 35000),
    new MenuItem("Brown Sugar", 28000)
];

$dessertMenu = [
    new MenuItem("Chocolate Cake", 40000),
    new MenuItem("Cheesecake", 45000),
    new MenuItem("Croissant", 20000)
];

$snackMenu = [
    new MenuItem("French Fries", 15000),
    new MenuItem("Garlic Bread", 18000),
    new MenuItem("Onion Rings", 20000)
];

do {
    echo "\nSelamat Datang di Coffee Shop\n";
    echo "Menu\n";
    echo "1. Coffee\n";
    echo "2. Non Coffee\n";
    echo "3. Dessert\n";
    echo "4. Snack\n";
    echo "5. Struk Pembayaran\n";
    echo "6. Exit\n";
    echo "Pilih menu yang ada diatas : ";
    $menu = trim(fgets(STDIN)); 

    if ($menu == 6) {
        echo "Thank you for visiting! Exiting...\n";
        break;  
    }

    switch ($menu) {
        case "1":
            echo "\n--- Coffee Menu ---\n";
            foreach ($coffeeMenu as $index => $item) {
                echo ($index + 1) . ". {$item->name} - Rp. {$item->price}\n";
            }
            echo "Choose an item from the Coffee Menu: ";
            $itemChoice = trim(fgets(STDIN));
            $chosenItem = $coffeeMenu[$itemChoice - 1];
            break;

        case "2":
            echo "\n--- Non Coffee Menu ---\n";
            foreach ($nonCoffeeMenu as $index => $item) {
                echo ($index + 1) . ". {$item->name} - Rp. {$item->price}\n";
            }
            echo "Choose an item from the Non Coffee Menu: ";
            $itemChoice = trim(fgets(STDIN));
            $chosenItem = $nonCoffeeMenu[$itemChoice - 1];
            break;

        case "3":
            echo "\n--- Dessert Menu ---\n";
            foreach ($dessertMenu as $index => $item) {
                echo ($index + 1) . ". {$item->name} - Rp. {$item->price}\n";
            }
            echo "Choose an item from the Dessert Menu: ";
            $itemChoice = trim(fgets(STDIN));
            $chosenItem = $dessertMenu[$itemChoice - 1];
            break;

        case "4":
            echo "\n--- Snack Menu ---\n";
            foreach ($snackMenu as $index => $item) {
                echo ($index + 1) . ". {$item->name} - Rp. {$item->price}\n";
            }
            echo "Choose an item from the Snack Menu: ";
            $itemChoice = trim(fgets(STDIN));
            $chosenItem = $snackMenu[$itemChoice - 1];
            break;

        case "5";
            echo "Enter quantity: ";
            $quantity = trim(fgets(STDIN));
            $order = new Order($chosenItem, $quantity);
            $totalPrice = $order->calculateTotal();
        
            echo "\n--- Order Summary ---\n";
            echo "Item: {$chosenItem->name}\n";
            echo "Price: Rp. {$chosenItem->price}\n";
            echo "Quantity: {$quantity}\n";
            echo "Total Price: Rp. {$totalPrice}\n";

        default:
            echo "Invalid selection. Please choose a number between 1 and 6.\n";
            continue;  
    }
} while (true); 
?>