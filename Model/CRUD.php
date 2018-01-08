<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/01/2018
 * Time: 14:58
 */

namespace SweetIt\SweetOm\Model;


use PDO;

class CRUD extends Manager
{
    /**
     * create new entry in table
     * @param array $post
     * @param string $table
     * @return boolean
     */
    function create(array $post, string $table): bool {
        $bdd = $this->dbConnect();

        $attributes = '';
        $values = '';
        foreach ($post as $key => $value) {

            $attributes .= $key . ', ';
            $values .= ':' . $key . ', ';
            $v[] = $value;
        }
        $attributes = substr_replace($attributes, '', -2, 2);
        $values = substr_replace($values, '', -2, 2);

        $query = ' INSERT INTO ' . $table . ' (' . $attributes . ') VALUES (' . $values . ')';

        $data = $bdd->prepare($query);
        $request = "";
        foreach ($post as $key => $value) {
            $request .= $key . ' : ' . $value . ', ';
            $data->bindParam($key, $post[$key], PDO::PARAM_STR);
        }

        return $data->execute();
    }

    /**
     * Read elements matching attributes in table
     * @param string $table
     * @param array $post
     * @return array
     */
    function read(array $post, string $table): array {
        $bdd = $this->dbConnect();

        $where = "";
        foreach($post as $key => $value) {
            $where .= "$key = :$key" . ", ";
        }
        $where = substr_replace($where, '', -2, 2);

        $query='SELECT * FROM ' . $table . ' WHERE ' . $where;

        $data = $bdd->prepare($query);


        foreach($post as $key => $value) {
            $data->bindParam(":$key", $value);
        }
        $data->execute();

        return $data->fetchAll();

    }
}