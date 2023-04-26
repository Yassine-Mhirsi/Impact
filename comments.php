<div class="comments">
    <?php
    session_start();
    // Fetch comments from database
    $email = $_SESSION['alogin'];
    $sql1 = "SELECT * from comments where email = (:email);";
    $query1 = $dbh->prepare($sql1);
    $query1->bindParam(':email', $email, PDO::PARAM_STR);
    $query1->execute();
    $comments = $query1->fetchAll(PDO::FETCH_OBJ);
    ?>

    <?php

    // Check if comment form has been submitted
    if (isset($_POST['comment-submit'])) {

        foreach ($comments as $comment) {
            echo '<div class="comment">';
            echo '<div class="d-flex">';
            echo '<div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>';
            echo '<div>';
            echo '<h5><a href="">' . $comment->user_name . '</a>  ';
            echo '<time datetime="2020-01-01">' . $comment->date . '</time>';
            echo '<p>' . $comment->comment . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            // unset($_SESSION['ok']);
            // unset($_POST['comment-submit']);
            // header('location:blog-details.php');


        }
        

    }
    // unset($_POST);


    ?>