<?php

//démarer le système de session pour pouvoir afficher les messages d'erreur du formulaire
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
//charger les fichiers des fonctionalités extraites dans des classes.
require_once(__DIR__ . '/controllers/ContactForm.php');

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Activer les images "thumbnail" sur nos posts
add_theme_support('post-thumbnails');
add_image_size('project_thumbnail', 570, 300, true);
add_image_size('logo_size', 30, 30, true);

function post_remove ()      //creating functions post_remove for removing menu item
{
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove');
function portfolio_register_custom_post_types()
{
    register_post_type('project', [
        'label' => 'Projets',
        'description' => 'Les projets réalisé',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-archive',
        'supports' => ['title','thumbnail'],
    ]);

    register_post_type('message', [
        'label' => 'Messages de contact',
        'description' => 'Les messages envoyer via le formulaire de contact',
        'public' => true,
        'show_ui' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-email-alt',
        'supports' => ['title','editor'],
        'capabilities' => [
            'create_posts' => false,
            'read_post' => true,
            'read_private_posts' => true,
            'edit_posts' => true,
        ],
        'map_meta_cap' => true,
    ]);
}

add_action('init', 'portfolio_register_custom_post_types');

// register custom taxonomies
function portfolio_register_custom_taxonomies()
{
    register_taxonomy('types', ['project'], [
        'labels' => [
            'name' => 'Types',
            'singular_name' => 'Type',
        ],
        'description' => 'Catégorisation des différents projet.',
        'public' => true,
        'hierarchical' => true,
    ]);
}

add_action('init', 'portfolio_register_custom_taxonomies');

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('footer', 'Navigation de pied de page');


// Custom function that returns a menu structure for given location
function portfolio_get_menu(string $location, ?array $attributes = []): array
{
    // 1. Récupérer les liens en base de données pour la location $location
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location];
    $items = wp_get_nav_menu_items($menuId);

    // 2. Formater les liens récupérés en objets qui contiennent les attributs suivants :
    // - href : l'URL complète pour ce lien
    // - label : le libellé affichable pour ce lien
    $links = [];

    foreach ($items as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;

        foreach($attributes as $attribute) {
            $link->$attribute = get_field($attribute, $item->ID);
        }

        $links[] = $link;
    }

    // 3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
    return $links;
}

// Gérer formulaire de contact custom
function portfolio_validate_contact_form(array $data) :bool|array
{
    var_dump($data);
    $errors = [];

    if (! strlen($data['firstname'] ?? null)){
        $errors['firstname'] = 'Veuillez fournir votre prénom.';
    }

    if (! strlen($data['lastname'] ?? null)){
        $errors['lastname'] = 'Veuillez fournir votre nom de famille.';
    }

    if (! strlen($data['email'] ?? null)){
        $errors['email'] = 'Veuillez fournir votre adresse mail.';
    } else if (! filter_var($data['email'] ?? null, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre adresse mail n'est pas valide.";
    }

    return $errors ?: true;
}

function portfolio_store_contact_form_message($firstname, $lastname, $subject ,$email, $message)
{
    wp_insert_post([
        'post_type' => 'message',
        'post_status' => 'publish',
        'post_title' => $firstname . ' ' . $lastname . ' <' . $email . '>' . ' Sujet : ' . $subject,
        'post_content' => $message,
    ]);
}

function portfolio_send_contact_form_message($firstname, $lastname, $subject, $email, $message)
{
    wp_mail('baptistedombard@gmail.com', $firstname . ' ' . $lastname . ' <' . $email . '>' . ' Sujet : ' . $subject, $message);
}

function portfolio_execute_contact_form ()
{
    $config = [
        'nonce_field' => 'contact_nonce',
        'nonce_identifier' => 'portfolio_contact_form',
    ];

    (new \Portfolio\ContactForm($config, $_POST))
        ->sanitize([
            'firstname' => 'text_field',
            'lastname' => 'text_field',
            'subject' => 'text_field',
            'email' => 'email',
            'message' => 'textarea_field',
        ])
        ->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'subject' => ['required'],
            'email' => ['required','email'],
            'message' => ['required'],
        ])
        ->save(
            title: fn($data) => $data['firstname'] . ' ' . $data['lastname'] . ' <' . $data['email'] . '>' . ' Sujet : ' . $data['subject'],
            content: fn($data) => $data['message'],
        )
        /*->send(
            title: fn($data) => 'Nouveau message de ' . $data['firstname'] . ' ' . $data['latname'],
            content: fn($data) => 'Firstname: ' . $data['firstname'] . PHP_EOL . 'Lastname: ' . $data['lastname'] . PHP_EOL . 'Sujet: ' . $data['subject'] . PHP_EOL . 'Email: ' . $data['email'] . PHP_EOL . 'Message:' . PHP_EOL . $data['message'],
        )*/
        ->feedback();
}

add_action( 'admin_post_nopriv_portfolio_contact_form', 'portfolio_execute_contact_form');
add_action( 'admin_post_portfolio_contact_form', 'portfolio_execute_contact_form');

//travailler avec la session de PHP
function portfolio_session_flash(string $key, mixed $value)
{
    if (! isset($_SESSION['portfolio_flash'])){
        $_SESSION['portfolio_flash'] = [];
    }

    $_SESSION['portfolio_flash'][$key] = $value;
}

function portfolio_session_get(string $key)
{
    if (isset($_SESSION['portfolio_flash']) && array_key_exists($key, $_SESSION['portfolio_flash'])){
        //1. récupérer la donnée à flash
        $value = $_SESSION['portfolio_flash'][$key];
        //2. suprimer la donnée de la session
        unset($_SESSION['portfolio_flash'][$key]);
        //3. retourner la donnée récupérée
        return $value;
    }

    //la donnée n'existait pas dans la session flash
    return null;
}