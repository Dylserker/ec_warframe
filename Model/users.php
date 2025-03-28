<?php
function getUsers(PDO $pdo, ): array | string
{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query="SELECT *  FROM users ORDER BY username LIMIT 10";
    $prep = $pdo->prepare($query);
    try
    {
        $prep->execute();
    }
    catch (PDOException $e)
    {
        return " erreur : ".$e->getCode() .' :</b> '. $e->getMessage();
    }

    $res = $prep->fetchAll();
    $prep->closeCursor();

    return $res;
}
function toggleEnabled(PDO $pdo, int $id): string | bool
{
    $res = $pdo->prepare('UPDATE `users` SET enabled = NOT enabled WHERE id = :id');
    $res->bindParam(':id', $id, PDO::PARAM_INT);

    try
    {
        $res->execute();
    }
    catch (PDOException $e)
    {
        return " erreur : ".$e->getCode() .' '. $e->getMessage();
    }

    return true;
}

function getUnlinkedUsers(PDO $pdo)
{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $query="SELECT u.id, u.username FROM users AS u
//            LEFT JOIN user_person AS up ON up.user_id = u.id
//            WHERE up.user_id IS NULL ORDER BY u.username";
    $query="SELECT u.id, u.username FROM users AS u
            ORDER BY u.username";
    $prep = $pdo->prepare($query);
    try
    {
        $prep->execute();
    }
    catch (PDOException $e)
    {
        return " erreur : ".$e->getCode() .' :</b> '. $e->getMessage();
    }

    $res = $prep->fetchAll();
    $prep->closeCursor();

    return $res;
}
