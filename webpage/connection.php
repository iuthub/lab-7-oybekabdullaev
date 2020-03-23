<?
include('users.php');
include('posts.php');
$db = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
$users = new UsersRepo($db);
$posts = new PostsRepo($db);
