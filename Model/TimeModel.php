<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/01/2018
 * Time: 15:37
 */

namespace SweetIt\SweetOm\Model;


class TimeModel extends Manager
{
    function readLatest(array $post, string $table, string $dateTimeColumn): array
    {
        $manager = new Manager();
        $bdd = $manager->dbConnect();

        if (empty($post)) {
            return $bdd->query('SELECT * FROM' . $table)->fetchAll();
        }

        $where = "";
        foreach ($post as $key => $value) {
            $where .= "$key = :$key" . ", ";
        }
        $where = substr_replace($where, '', -2, 2);

        $query = 'SELECT MAX(' . $dateTimeColumn . ') AS tMax FROM ' . $table . ' WHERE ' . $where;

        $data = $bdd->prepare($query);


        foreach ($post as $key => $value) {
            $data->bindValue(":$key", $value);
        }
        $data->execute();

        $time = $data->fetch();
        var_dump($time);

        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $dateTimeColumn . ' = \'' . $time["tMax"] . '\'';

        echo $query;

        $data = $bdd->prepare($query);
        $data->execute();

        return $data->fetch();
    }
}