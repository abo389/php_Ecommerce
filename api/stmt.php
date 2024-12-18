<?php


$selectAllProducts = "SELECT 
    p.id, 
    p.name, 
    p.price,
    c.name as category,
    b.name as brand, 
    p.count, 
    p.description, 
    GROUP_CONCAT(i.name SEPARATOR ', ') as image, 
    p.views 
    FROM products p 
    INNER join images i 
    on p.id = i.pro_id 
    INNER JOIN brand b 
    on p.brand = b.id 
    INNER JOIN category c 
    on c.id = p.cat
    ";

$selectSingelProduct = "SELECT 
    p.id, 
    p.name, 
    p.price,
    c.name as category,
    b.name as brand, 
    p.count, 
    p.description, 
    GROUP_CONCAT(i.name SEPARATOR ', ') as image, 
    p.views 
    FROM products p 
    INNER join images i 
    on p.id = i.pro_id 
    INNER JOIN brand b 
    on p.brand = b.id 
    INNER JOIN category c 
    on c.id = p.cat
    WHERE p.id = ? 
    GROUP by p.id;
    ";

$selectAllCategory = "SELECT * FROM category";

$selectCartItem = "SELECT 
p.id as productId, 
p.name, 
p.price, 
c.quantity, 
p.price*c.quantity as total,
i.name as image
FROM `cart` c 
inner join products p 
on p.id = c.pro_id 
inner JOIN images i 
on i.pro_id = p.id 
where c.user_id = ?
GROUP by p.id;
";

$updateCartInc = "UPDATE
cart 
SET 
quantity = quantity + 1
WHERE
user_id = ? AND pro_id = ?
";
$updateCartDec = "UPDATE
cart 
SET 
quantity = quantity - 1
WHERE
user_id = ? AND pro_id = ?
";

$deleteCartItem = "DELETE FROM cart WHERE user_id = ? AND pro_id = ?";