<?php
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user_id = $_SESSION['uuid'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
    <style>
        
    </style>
</head>
<body>
    <nav class="nav">
        <ul class="login">
            <?php if (isset($email)) { ?>
                <li>Welcome, <?php echo $email; ?> | <a href="../includes/logout.php">Log Out</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="menu.php">menu</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">reservations</a>
                <div class="dropdown-content">
                    <a href="view_reservation.php">View Reservations</a>
                    <a href="reservation.php">Make a Reservation</a>
                </div>
             </li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    
    </nav>
   
    <div class="menu_wrapper">
        <div class="menu_text">
            <h2>Our Menu</h2>
            <p>Our diverse menu offers a wide range of culinary delights to satisfy all tastes and preferences. From hearty breakfast options to mouth-watering lunch and dinner selections. We strive to create dishes that tantalize your taste buds and leave you wanting more.</p>
        </div>
        <div class="menu_items">
            <div class="item1">
                <img src="../assets/images/burger1.jpg" alt="">
                <h3>Burger</h3>
                <p>Juicy and satisfying, our signature burgers are a feast for your taste buds. Crafted with premium ingredients and grilled to perfection, each bite is a flavor explosion that will leave you craving more.</p>
                <button>Add Item</button>
            </div>
            <div class="item2">
                <img src="../assets/images/chicken.jpg" alt="">
                <h3>Fried Chicken</h3>
                <p>Crispy on the outside, tender on the inside – our fried chicken is a crunchy delight. Savor the golden goodness of carefully seasoned and expertly fried chicken pieces that promise to satisfy your fried chicken cravings.</p>
                <button>Add Item</button>
            </div>
            <div class="item3">
                <img src="../assets/images/pizza3.jpg" alt="">
                <h3>Pizza</h3>
                <p>Experience pizza perfection with our handcrafted pizzas. From classic margheritas to gourmet specialties, our pizzas feature fresh, high-quality ingredients atop a perfectly baked crust. It's a slice of heaven in every bite.</p>
                <button>Add Item</button>
            </div>
            <div class="item4">
                <img src="../assets/images/sandwich2.jpg" alt="">
                <h3>Dagwood Sandwiches</h3>
                <p>Elevate your sandwich game with our Dagwood creations. Piled high with an assortment of premium deli meats, cheeses, and fresh veggies, these stacked sandwiches are a delicious adventure in every layer.</p>
                <button>Add Item</button>
            </div>
            <div class="item5">
                <img src="../assets/images/ice_cream.jpg" alt="">
                <h3>Ice Cream Desserts</h3>
                <p>Indulge your sweet tooth with our decadent ice cream desserts. From sundaes to parfaits, our creations blend premium ice cream with an array of tempting toppings, creating a symphony of flavors that will satisfy any dessert craving.</p>
                <button>Add Item</button>
            </div>
            <div class="item6">
                <img src="../assets/images/drinks.jpg" alt="">
                <h3>Watermelon Fountain</h3>
                <p>Dive into a refreshing experience with our Watermelon Fountain. Perfectly chilled and artfully carved, our watermelon fountain offers a hydrating and visually stunning treat, making it the ideal choice for a light and revitalizing snack.</p>
                <button>Add Item</button>
            </div>
        </div>
    </div>
    
</body>
</html>
