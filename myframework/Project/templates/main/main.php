
<?php 
    include __DIR__.'/../header.php';
    
    foreach($articles as $article)
    echo '<h2>'.$article['name'].'</h2>';
    echo '<p>'.$article['text'];.'</p>';
    include __DIR__.'/../footer.html';

?>
                    
          