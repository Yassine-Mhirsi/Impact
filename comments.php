<div class="comments">
    <?php
    session_start();
    $email = $_SESSION['alogin'];
    $sql1 = "SELECT * from comments where email = (:email);";
    $query1 = $dbh->prepare($sql1);
    $query1->bindParam(':email', $email, PDO::PARAM_STR);
    $query1->execute();
    $comments = $query1->fetchAll(PDO::FETCH_OBJ);
    ?>
    <?php

    if (isset($_POST['comment-submit'])) {
        foreach ($comments as $comment) {
            echo '<div class="comment">';
            echo '<div class="d-flex">';
            echo '<div class="comment-img"><img src="images/'.$result->image.'" alt=""></div>';
            echo '<div>';
            echo '<h5><a href="">' . $comment->user_name . '</a>  ';
            echo '<time datetime="2020-01-01">' . $comment->date . '</time>';
            echo '<p>' . $comment->comment . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>