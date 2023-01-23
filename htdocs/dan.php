<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'AbstractBox.php';
include 'FileBox.php';
include 'DbBox.php';
$categories = array(
    "id" => 1,
    "title" => "Обувь",
    'children' => array(
        array(
            'id' => 2,
            'title' => 'Ботинки',
            'children' => array(
                array('id' => 3, 'title' => 'Кожа'),
                array('id' => 4, 'title' => 'Текстиль'),
            ),
        ),
        array('id' => 5, 'title' => 'Кроссовки',),
    ),
    array(
        "id" => 6,
        "title" => "Спорт",
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
    array(
        "id" => 6,
        "title" => "Спорт",
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
);
function searchCategory($categories, $id)
{
    if (isset($categories['id'])) {
        if ($categories['id'] == $id)
            return $categories['title'];
    }
    foreach ($categories as $part) {
        if (searchCategory($part, $id) != 'null')
            return searchCategory($part, $id);
    }
    return 'null';
}

//SELECT id,first_name,last_name,name FROM `worker` JOIN `child` ON `worker`.id = `child`.user_id JOIN `car` ON `worker`.id = `car`.`user_id` WHERE `car`.`user_id` = `worker`.`id`;
$html = ['<a>', '<div>', '</div>', '</a>'];
function html($html)
{
    $result = array();
    foreach ($html as $part) {
        if (strpos($part, '/') === false) {
            array_push($result, $part);
        } else {
            if (array_pop($result) != str_replace("/", "", $part))
                return 'This document is invalid!\n';
        }
    }
    return (sizeof($result) == 0) ? 'This document is valid!\n' : 'This document is invalid!\n';
}

$var = FIleBox::getConnect();
$var2 = FIleBox::getConnect();
$var->setData('four', 'four');
$var->setData('five', 'kek');
$var2->setData('one', 'one');
$var->save();
$db = DbBox::getConnect();
$db->setData('seven','eight');
$db->setData('nine','ten');
$db->save();
$db->load();
echo $db->getData('ones');
$var->load();
echo $var->getData('four');



