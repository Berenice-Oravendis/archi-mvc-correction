<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/edit_post.php');

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    editPost($_GET['id']);
} elseif (isset($_GET['id'])) {
    post($_GET['id']);
} else {
    homepage();
}
