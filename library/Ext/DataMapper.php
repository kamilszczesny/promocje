<?php

/*
 * Klasa ma za zadanie ułatwić przepisywanie danych z formularza na dowolny obiekt Entity Doctrine.
 */

/**
 * Description of DataMapper
 *
 * @author Kamil
 */
class Ext_DataMapper {

    /**
     * Funkcja przyjmuje 3 parametry. $array to dane przesłane z formularza (musi miec takie same klucze, jakie własności
     * ma obiekt którego formularz dotyczy. Wszystkie wartości z formularza mapowane są na własności przekazanego obiektu.
     * Dodatkowo parametr data jest tablicą w której klucz to własność obiektu zawierającego relacje w bazie.
     * Do własności której nazwa znajduje się jako klucz w parametrze $data przypisywane sa obiekty (powiązane rekordy bazy).
     * 
     * @param type $array - dane z formularza
     * @param type $object - obiekt kórego formularz dotyczy
     * @param type $data - listy obiektów do tworzenia relacji w $object 
     */
    public function mapArrayToObject($array, $object, $data) {
        foreach ($array as $key => $item) {
            if (property_exists($object, $key)) {
                if (gettype($object->$key) == 'object') {
                    $class = get_class($object->$key);
                    switch ($class) {
                        case 'DateTime':
                            $object->$key = date_create($item);
                            break;
                        case 'Doctrine\ORM\PersistentCollection':
                            if (!empty($data[$key])) {
                                foreach ($data[$key] as $n => $i) {
                                    foreach ($item as $key2 => $item2) {
                                        if ($i->id == $item2) {
                                            $c[] = $i;
                                        }
                                    }
                                }
                            } else {
                                $c = null;
                            }
                            $object->$key = $c;
                            break;
                        default:
                            if (!empty($data[$key])) {
                                foreach ($data[$key] as $key2 => $item2) {
                                    if ($item2->id == $item) {
                                        $object->$key = $item2;
                                        break;
                                    }
                                }
                            }
                            break;
                    }
                } else {
                    $object->$key = $item;
                }
            }
        }
    }

}

?>
