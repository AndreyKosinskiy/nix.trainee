<?php
echo '<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">';
foreach ($data as $article) {
        echo '<article>
                <header>
                    <h2>' . $article['title'] . '</h2>
                </header>
                <section>
                    <p>' . $article['content'] . '</p>
                </section>
            </article>';
}
echo '            
        </div>
    </div>
</main>';