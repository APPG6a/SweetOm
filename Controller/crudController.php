<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/01/2018
 * Time: 09:51
 */

/**
 * Create new user in 'utilisateurs' and 'domicile' tables
 * @param array $array
 * @param string $login
 */
function createUser(array $array, string $login)
{
    $Prenom = $array['firstName'];
    $Nom = $array['lastName'];
    $Mail = $array['mail'];
    $TelephonePortable = $array['cellphone'];
    $TelephoneFixe = $array['phone'];
    $Adresse = $array['address'] . " " . $array['postCode'] . " " . $array['city'] . " " . $array['country'];

    create(array($Prenom, $Nom, $TelephonePortable, $TelephoneFixe, $Mail, $login), 'utilisateurs');
    $user = read(['Login' => $login], 'utilisateurs');
    create(array($Adresse, $user['ID']), "domicile");
}

/**
 * create new entry in table
 * @param array $post
 * @param string $table
 * @return boolean
 */
function create(array $post, string $table): bool
{
    $manager = new \SweetIt\SweetOm\Model\Manager();
    $bdd = $manager->dbConnect();

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
        $data->bindParam(':' . $key, $post[$key], PDO::PARAM_STR);
    }

    return $data->execute();
}

/**
 * Read elements matching attributes in table
 * @param string $table
 * @param array $post
 * @return array
 */
function read(array $post, string $table): array
{
    $manager = new \SweetIt\SweetOm\Model\Manager();
    $bdd = $manager->dbConnect();

    if (empty($post)) {
        return $bdd->query('SELECT * FROM' . $table)->fetchAll();
    }

    $where = "";
    foreach ($post as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);

    $query = 'SELECT * FROM ' . $table . ' WHERE ' . $where;

    $data = $bdd->prepare($query);


    foreach ($post as $key => $value) {
        $data->bindParam(":$key", $value);
    }
    $data->execute();

    return $data->fetchAll();
}

/**
 * update information (value) in table where (condition) is respected
 * @param array $postValue
 * @param array $postCondition
 * @param string $table
 * @return array
 */
function update(array $postValue, array $postCondition, string $table): array
{
    $manager = new \SweetIt\SweetOm\Model\Manager();
    $bdd = $manager->dbConnect();

    if (empty($postValue)) {
        return $bdd->query('SELECT * FROM' . $table)->fetchAll();
    }

    $set = "";
    foreach ($postCondition as $key => $value) {
        $set .= "$key = :c" . $key . ", ";
    }
    $set = substr_replace($set, '', -2, 2);

    $where = "";
    foreach ($postValue as $key => $value) {
        $where .= "$key = :v" . $key . ", ";
    }
    $where = substr_replace($where, '', -2, 2);

    $query = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where;

    $data = $bdd->prepare($query);

    foreach ($postCondition as $key => $value) {
        $data->bindParam(":c" . $key, $value);
    }
    $data->execute();

    foreach ($postValue as $key => $value) {
        $data->bindParam(":v" . $key, $value);
    }
    $data->execute();

    return $data->fetchAll();
}

/**
 * @param array $post
 * @param string $table
 * @return bool
 */
function delete(array $post, string $table): bool
{
    $manager = new \SweetIt\SweetOm\Model\Manager();
    $bdd = $manager->dbConnect();

    $attributes = '';
    foreach ($post as $key => $value) {
        $attributes .= '(' . $key . '= :' . $key . ') AND ';
        $v[] = $value;
    }
    $attributes = substr_replace($attributes, '', -5, 5);

    $query = ' DELETE FROM ' . $table . ' WHERE ' . $attributes . ';';

    $data = $bdd->prepare($query);
    $request = "";
    foreach ($post as $key => $value) {
        $request .= $key . ' : ' . $value . ', ';
        $data->bindParam(':' . $key, $post[$key], PDO::PARAM_STR);
    }

    return $data->execute();
}