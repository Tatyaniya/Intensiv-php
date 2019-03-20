<?php 

    require_once 'parts/header.php';

    if ( isset( $_GET['cat'] )) {
        $currentCat = $_GET['cat'];
        $products = $connect -> query( "SELECT * FROM products WHERE cat='$currentCat'" );
        $products = $products -> fetchAll( PDO::FETCH_ASSOC );
    } else {
        $products = $connect -> query( "SELECT * FROM products" );
        $products = $products -> fetchAll( PDO::FETCH_ASSOC );
    }

    // $products = $connect -> query( "SELECT * FROM products" );
    // $products = $products -> fetchAll( PDO::FETCH_ASSOC );

    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';

?>

    <div class="main">

        <?php foreach ($products as $product) { ?>
            <div class="card">
                <a href="product.php?product=<?php echo $product['title']?>">
                    <img src="img/<?php echo $product['img'] ?>" alt="<?php echo $product['rus_name'] ?>">
                </a>
                <div class="label"><?php echo $product['rus_name'] ?> (<?php echo $product['price'] ?> рублей)</div>
                <form action="actions/add.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <input type="submit" value="Добавить в корзину">
                </form>
            </div>
        <?php } ?>

</body>
</html>

