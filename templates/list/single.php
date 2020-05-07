<?php
echo '<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row"><article class = "col-12">
                <header>
                    <h2>' . $article->getName() . '</h2>
                </header>
                <section>
                    <p>' . $article->getAuthor()->getNickName() . '</p>
                </section>
            </article>            
        </div>
    </div>
</main>';