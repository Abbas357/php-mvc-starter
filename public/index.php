<?php

require '../app/init.php';
require '../app/routes.php';

use App\Support\Router;

$uri = request_url();
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST' && isset($_POST['_method'])) {
    $method = $_POST['_method'];
}

Router::dispatch($uri, $method);

// <form action="/update-user" method="post">
//     <input type="hidden" name="_method" value="PUT">
//     <input type="text" name="username" value="new_username">
//     <button type="submit">Update User</button>
// </form>

// <form id="updateUserForm">
//     <input type="text" name="username" value="new_username">
//     <button type="button" onclick="updateUser()">Update User</button>
// </form>

// <script>
//     function updateUser() {
//         const form = document.getElementById('updateUserForm');
//         const formData = new FormData(form);

//         fetch('/update-user', {
//             method: 'PUT',
//             body: new URLSearchParams(formData)
//         }).then(response => response.text())
//         .then(data => {
//             console.log(data); // Handle the response
//         });
//     }
// </script>