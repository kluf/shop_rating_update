<?php
    foreach ($comments as $comment) {
        foreach ($comment as $item) {
            $rating = $item['rating'];
            echo "<div class='well well-lg'>";
            echo  "<p>{$item['user_id']} {$item['dateComment']} {$item['lasts']}</p>\n<p>Rating: ";
            while ($rating) {
                echo $rating;
                $rating --;
            }
            echo "</p><p>{$item['description']}</p></div>";
        }
    }
?>

