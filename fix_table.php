<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=capbeast', 'root', '');
    echo "Connected to database successfully\n";

    // Alter the label_base64 column
    $sql = "ALTER TABLE order_shipping_rates MODIFY label_base64 LONGTEXT";
    $db->exec($sql);
    echo "Table altered successfully\n";

    // Also check and alter shipping_error column if needed
    $sql2 = "ALTER TABLE orders MODIFY shipping_error TEXT";
    $db->exec($sql2);
    echo "Orders table altered successfully\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
