<div class="slide">
    <?php
    if (APP_SLIDE):
        $SlideSeconts = 8;
        require '_cdn/widgets/slide/slide.wc.php';
    endif;
    ?>
</div>
<div class="container">
    <div class="content">    
        <section class="article-section">
            <header>
                <h1>Aprenda Corel</h1>
                <p class="tagline">Confira aqui o que você vai encontrar em nosso site!</p>
            </header>
            <?php
            $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND target_page = 2 AND post_date <= NOW() ORDER BY post_id ASC, post_date DESC LIMIT 5");
            if (!$Read->getResult()):
                echo Erro("Ainda Não existe posts cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
            else:
                foreach ($Read->getResult() as $Post):
                    ?><article class="box30 col05">
                        <a title="Ler mais sobre <?= $Post['post_title']; ?>" href="<?= BASE; ?>/artigo/<?= $Post['post_name']; ?>">                    
                            <img title="<?= $Post['post_title']; ?>" alt="<?= $Post['post_title']; ?>" src="<?= BASE; ?>/tim.php?src=uploads/<?= $Post['post_cover']; ?>&w=<?= IMAGE_W / 2; ?>&h=<?= IMAGE_H / 2; ?>"/>
                        </a>
                        <h1><a title="<?= $Post['post_title']; ?>" href="<?= BASE; ?>/artigo/<?= $Post['post_name']; ?>"><?= $Post['post_title']; ?></a></h1>
                        <p><?= $Post['post_subtitle']; ?></p>
                        <time datetime="<?= date('Y-m-d'); ?>"><?= date('d/m/Y \à\s H:i\h\s'); ?></time>
                    </article><?php
                endforeach;
            endif;
            ?>
            <div class="clear"></div>
        </section>
        <!--<div class="clear"></div>-->        
    </div>
</div>
