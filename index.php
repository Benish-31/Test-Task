<?php
include_once "Main.php";
$main = new Main();
$query = "SELECT * FROM product_s ORDER BY id DESC";
$result = $main->retrieveData($query);

include_once "header.php";
?>
<div class="container">
    <div class="pt-3 mt-4">

        <nav class="nav">
                <h2 class="nav__left">Product List</h2>
                <div class="nav__right">
                    <input class="nav__right-button btn btn-outline-primary" id="secondaryAdd" type="button" value="ADD">
                    <input class="nav__right-button btn btn-outline-danger active" type="button" id="delete-product-btn"  value="Mass Delete"/>
                </div>
        </nav>

        <form action="ProductAdd.php" method="POST">
            <input type="submit" name="add" id="primaryAdd" hidden>
            <input type="submit" name="delete" id="primaryDelete" hidden>
    </div>
    <hr>
    <div class="row">
    <?php
foreach ($result as $key => $row) {
    echo "<div class='col-md-3 mt-3'>";
    echo "<div class='card border border-dark rounded'>
                    <div class='card-body'>";
    echo "<input type='checkbox' class='delete-checkbox' name='checkbox[]' value='" . $row['id'] . "'>";
    echo "<p class='card-text'>" . $row['sku'] . "</p>";
    echo "<p>" . $row['n_ame'] . "</p>";
    echo "<p>" . $row['price'] . " $ </p>";
    if ($row['size'] !== "") {
        echo "<p> Size: " . $row['size'] . " MB </p>";
    } elseif ($row['w_eight'] !== "") {
        echo "<p> Weight: " . $row['w_eight'] . " KG </p>";
    } else {
        echo "<p> Dimension: " . $row['dimension'] . "</p>";
    }
    echo "</div></div>";
    echo "</div>";
}
echo "</form>";
?>
	</div>
	</div>
</body>
</html>
<?php
include_once "footer.php";
?>

<script>

$('#secondaryAdd').click(function(){
    $("#primaryAdd").click();
})

$('#delete-product-btn').click(function(){
    $("#primaryDelete").click();
})

</script>