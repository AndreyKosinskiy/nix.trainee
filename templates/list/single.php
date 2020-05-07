<?php
echo '<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">';
foreach ($articles as $article) {
    echo '<article class = "col-12">
                <header>
                    <h2>' . $article->getName() . '</h2>
                </header>
                <section>
                    <p>' . $article->getText() . '</p>
                </section>
            </article>';
}
echo '            
        </div>
    </div>
</main>';