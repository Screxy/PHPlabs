
<?php 
    include __DIR__.'/../header.php';
    
    foreach($articles as $article)
    echo '<h2><a href="article/show/'.$article->getId().'">'.$article['name'].'</a></h2>';
    echo '<p>'.$article->getText();.'</p>';
    include __DIR__.'/../footer.html';

?>
                    
          