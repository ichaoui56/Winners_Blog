<?php 

// session_start();
// session_destroy();
// header('Location: ../index.php?logout=true');

echo(
    "
    <nav class='bg-blue-500 text-white font-bold flex justify-around py-2'>
        <div>
            <a href='addUser.php'>new user</a>
            <a class='px-8' href='editUser.php'>edit user</a>
            <a href='delUser.php'>remove user</a>
            <a class='pl-2 px-8' href='admin.php'>dashboard</a>
            <a href='article.php'>crud article</a>
            <a class='pl-2 px-8' href='addArticle.php'>add article</a>
        </div>
        <form method='post'>
            <button type='submit' name='logout' >logout</button>
        </form>
    </nav>
    "
);
?>