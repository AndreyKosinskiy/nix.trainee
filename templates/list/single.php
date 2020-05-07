<?php
echo '<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row"><article class = "col-12">
                <header>
                    <h2>' . $articles->getName() . '</h2>
                </header>
                <section>
                    <p>' . $articles->getText() . '</p>
                    <p>' . $articles->getAuthor()->getNickName() . '</p>
                </section>
            </article>            
        </div>
    </div>
</main>';