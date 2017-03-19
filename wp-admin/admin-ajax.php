<?php
/**
 * WordPress Ajax Process Execution
 *
 * @package WordPress
 * @subpackage Administration
 *
 * @link https://codex.wordpress.org/AJAX_in_Plugins
 */

/**
 * Executing Ajax process.
 *
 * @since 2.1.0
 */
define( 'DOING_AJAX', true );
if ( ! defined( 'WP_ADMIN' ) ) {
	define( 'WP_ADMIN', true );
}

/** Load WordPress Bootstrap */
require_once( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );

/** Allow for cross-domain requests (from the front end). */
send_origin_headers();

if (!empty($_GET['custom_action'])) {

    if(!session_id()) {
        session_start();
    }
    switch ($_GET['custom_action']) {
        case 'update_card':
            if (!empty($_SESSION['card'][0])) {
                unset($_SESSION['card'][0]);
            }
            $count = $_GET['count'];
            $product_id = $_GET['product_id'];
            if ($count == 'remove') {
                unset($_SESSION['card'][$product_id]);
            } else {
                $_SESSION['card'][$product_id] += $count;
            }
            break;
        case 'render_card':
            $result = [];
            if (!empty($_SESSION['card']) && is_array($_SESSION['card'])) {
                foreach ($_SESSION['card'] as $id => $count) {
                    $product = get_post($id);
                    $image = get_field('product_image', $product);
                    $image_final = wp_get_attachment_image_url($image['id'], 'small');
                    $result[] = '
                <div class="cart-item">
                <div class="cart-item--image">
                    <img src="' . $image_final . '" alt="">
                </div>
                <div class="cart-item--info">
                    <p>' . $product->post_title . '</p>
                    <div class="cart-item--amount">Количетсво: ' . $count . '</div>
                    <div class="cart-item--price">₸' . get_field('product_price', $product) . '</div>
                </div>
                <a href="" class="delete-item" data-id="'.$product->ID.'">
                    <img src="'. esc_url( get_template_directory_uri() ) .'/images/close-button.png" alt="">
                </a>
            </div>
            ';
                }
            } else {
                $result[] = '<span data-hook="user-free-text" class="user-free-text">Корзина пуста</span>';
            }

            exit(join("\n", $result));
            break;
        case 'update_count':
            $count = 0;
            if (!empty($_SESSION['card'])) {


                foreach ($_SESSION['card'] as $id => $value) {
                    $count  = $count + $value;
                }

            }
            echo intval($count);
            exit;
        break;
        case 'update_summ':
            $summ=0;
            if (!empty($_SESSION['card'])) {
                foreach ($_SESSION['card'] as $id => $value) {
                    $product = get_post($id);
                    $summ += $value * get_field('product_price', $product);
                }
            }
            echo '₸'.intval($summ);
            exit;
        break;
        case 'card-minus-one':
            $id = $_GET['id'];
            $_SESSION['card'][$id]--;
        break;
        case 'send_order':
            $body = [];
            if (!empty($_SESSION['card'])) {
                $body[] = '<p>'.$_POST['name'].'</p>';
                $body[] = '<p>'.$_POST['email'].'</p>';
                $body[] = '<p>'.$_POST['adress'].'</p>';
                $body[] = '<p>'.$_POST['city'].'</p>';
                $body[] = '<p>'.$_POST['phone'].'</p>';

                $summ = 0;
                foreach ($_SESSION['card'] as $id => $count) {
                    $summ += $value * get_field('product_price', $product);
                    $product = get_post($id);
                    $body[] = '<p>'.$product->post_title.'------'.$count.'/<span>Цена: ₸<?=get_field(\'product_price\', $product)?></span></p>';
                }
                $body[] = '<p>Итого : '.$summ.'</p>';

                if (wp_mail('wfwdave@gmail.com', 'Новый заказ в магазине RisCafe', join("\n", $body))) {
                    unset($_SESSION['card']);
                    exit('success');
                } else {
                    exit('fail');
                }
            } else {
                exit('fail');
            }

        break;
        case 'send_feedback':
            $body = [];
            $body[] = '<p>Имя '.$_POST['name'].'</p>';
            $body[] = '<p>Email '.$_POST['email'].'</p>';
            $body[] = '<p>Сообщение '.$_POST['message'].'</p>';

            if (wp_mail('wfwdave@gmail.com', 'Новое сообщение от клиента', join("\n", $body))) {
                exit('success');
            } else {
                exit('fail');
            };
        break;
    }
}

// Require an action parameter
if ( empty( $_REQUEST['action'] ) )
	die( '0' );

/** Load WordPress Administration APIs */
require_once( ABSPATH . 'wp-admin/includes/admin.php' );

/** Load Ajax Handlers for WordPress Core */
require_once( ABSPATH . 'wp-admin/includes/ajax-actions.php' );

@header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
@header( 'X-Robots-Tag: noindex' );

send_nosniff_header();
nocache_headers();

/** This action is documented in wp-admin/admin.php */
do_action( 'admin_init' );

$core_actions_get = array(
	'fetch-list', 'ajax-tag-search', 'wp-compression-test', 'imgedit-preview', 'oembed-cache',
	'autocomplete-user', 'dashboard-widgets', 'logged-in',
);

$core_actions_post = array(
	'oembed-cache', 'image-editor', 'delete-comment', 'delete-tag', 'delete-link',
	'delete-meta', 'delete-post', 'trash-post', 'untrash-post', 'delete-page', 'dim-comment',
	'add-link-category', 'add-tag', 'get-tagcloud', 'get-comments', 'replyto-comment',
	'edit-comment', 'add-menu-item', 'add-meta', 'add-user', 'closed-postboxes',
	'hidden-columns', 'update-welcome-panel', 'menu-get-metabox', 'wp-link-ajax',
	'menu-locations-save', 'menu-quick-search', 'meta-box-order', 'get-permalink',
	'sample-permalink', 'inline-save', 'inline-save-tax', 'find_posts', 'widgets-order',
	'save-widget', 'delete-inactive-widgets', 'set-post-thumbnail', 'date_format', 'time_format',
	'wp-remove-post-lock', 'dismiss-wp-pointer', 'upload-attachment', 'get-attachment',
	'query-attachments', 'save-attachment', 'save-attachment-compat', 'send-link-to-editor',
	'send-attachment-to-editor', 'save-attachment-order', 'heartbeat', 'get-revision-diffs',
	'save-user-color-scheme', 'update-widget', 'query-themes', 'parse-embed', 'set-attachment-thumbnail',
	'parse-media-shortcode', 'destroy-sessions', 'install-plugin', 'update-plugin', 'press-this-save-post',
	'press-this-add-category', 'crop-image', 'generate-password', 'save-wporg-username', 'delete-plugin',
	'search-plugins', 'search-install-plugins', 'activate-plugin', 'update-theme', 'delete-theme',
	'install-theme', 'get-post-thumbnail-html',
);

// Deprecated
$core_actions_post[] = 'wp-fullscreen-save-post';

// Register core Ajax calls.
if ( ! empty( $_GET['action'] ) && in_array( $_GET['action'], $core_actions_get ) )
	add_action( 'wp_ajax_' . $_GET['action'], 'wp_ajax_' . str_replace( '-', '_', $_GET['action'] ), 1 );

if ( ! empty( $_POST['action'] ) && in_array( $_POST['action'], $core_actions_post ) )
	add_action( 'wp_ajax_' . $_POST['action'], 'wp_ajax_' . str_replace( '-', '_', $_POST['action'] ), 1 );

add_action( 'wp_ajax_nopriv_heartbeat', 'wp_ajax_nopriv_heartbeat', 1 );

if ( is_user_logged_in() ) {
	/**
	 * Fires authenticated Ajax actions for logged-in users.
	 *
	 * The dynamic portion of the hook name, `$_REQUEST['action']`,
	 * refers to the name of the Ajax action callback being fired.
	 *
	 * @since 2.1.0
	 */
	do_action( 'wp_ajax_' . $_REQUEST['action'] );
} else {
	/**
	 * Fires non-authenticated Ajax actions for logged-out users.
	 *
	 * The dynamic portion of the hook name, `$_REQUEST['action']`,
	 * refers to the name of the Ajax action callback being fired.
	 *
	 * @since 2.8.0
	 */
	do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}
// Default status


die( '0' );
