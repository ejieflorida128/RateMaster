<?php
include("../connection.php");
include("Irate_navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Details</title>
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }
        .star {
            cursor: pointer;
            text-shadow: 1px 1px 1px #000;
        }
        input[type=radio] {
            display: none;
        }
        label:before {
            content: '★';
            color: gray;
        }
        input[type=radio]:checked ~ label:before {
            color: gold;
        }
    </style>
</head>
<body>

    <?php
    $id = $_GET['item_id'];
    $sql = "SELECT * FROM items WHERE id = $id";
    $query=mysqli_query($connForEjie,$sql);

    while($test = mysqli_fetch_assoc($query)){
    ?>

    <img src="<?php echo $test['img']; ?>" style = "width: 400px; height: 400px; margin-left: 400px;">
    <h4 style = "margin-left: 400px;"><?php echo $test['item_name'] ?></h4>
    <h4 style = "margin-left: 400px;"><?php echo $test['item_price'] ?></h4>
    <h4 style = "margin-left: 400px;"><?php echo $test['item_source'] ?></h4>
    <h4 style = "margin-left: 400px;"><?php echo $test['seller'] ?></h4>
    <h4 style = "margin-left: 400px;">Seller Id: <?php echo $test['SellerId'] ?></h4>

    <form action="Irate_details.php" method="post" style = "margin-left: 400px;">
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars" class="star">☆</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars" class="star">☆</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars" class="star">☆</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars" class="star">☆</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star" class="star">☆</label>
        </div>
        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
        <button type="submit">Submit Rating</button>
    </form>

    <?php
    }
    ?>

</body>
</html>