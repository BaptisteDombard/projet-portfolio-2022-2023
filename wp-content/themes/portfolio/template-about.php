<?php /* Template Name: About page template */ ?>
<?= get_header()?>
<main class="main">
    <section class="about" aria-labelledby="about__title">
        <h2 class="about__title" id="about__title">Qui suis-je?</h2>
        <div class="about__texts">
            <p class="about__excerpt">Je m’appelle Baptiste Dombard, j’ai réalisé mes études secondaires
                à l’institut Notre-dame de Heusy. Hésitant sur mes choix futurs, je me
                suis dirigé vers des études générales. J’ai obtenu sans problème
                mon CESS en option sciences sociales. Ne désirant pas arrêter mon
                parcours scolaire et ayant un dilemme entre des études d’instituteur
                et des études dans l’informatique, j’ai très vite compris que mon avenir
                serait dans l’informatique. </p>

            <p class="about__excerpt">Ayant pu travailler dans plusieurs domaines grâce à  la multitude
                de cours suivis à la HEPL (design, front-end, back-end, etc...), je peux
                affirmer que le métier de developer web est un métier qui me
                plait beaucoup et pour lequel je désire m’investir pour aider mes futurs
                clients. </p>

            <p class="about__excerpt">Je suis un web developer curieux, toujours de bonne humeur
                et ravi d’écouter vos demandes et suggestions.
                Alors, n’hésitez pas à faire appel à moi pour toutes vos requêtes
                en termes de création web.</p>
        </div>
        <img src="<?= wp_get_attachment_image_url('58', 'medium_large') ?>" alt="" class="about__img">
    </section>
</main>
<?= get_footer()?>
