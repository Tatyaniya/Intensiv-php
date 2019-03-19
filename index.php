<?php 

    require_once 'parts/header.php';

    $products = $connect -> query( "SELECT * FROM products" );
    $products = $products -> fetchAll( PDO::FETCH_ASSOC );

    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';

?>

    <div class="main">

        <?php foreach ($products as $product) { ?>
            <div class="card">
                <a href="product.php">
                    <img src="img/<?php echo $product['img'] ?>" alt="<?php echo $product['rus_name'] ?>">
                </a>
                <div class="label"><?php echo $product['rus_name'] ?> (<?php echo $product['price'] ?> рублей)</div>
                <button type="submit">Добавить в корзину</button>
            </div>
        <?php } ?>

</body>
</html>

