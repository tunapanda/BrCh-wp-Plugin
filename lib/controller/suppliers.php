<?php
namespace BrCh_PLUGIN;

include BrCh_PLUGIN_PATH . "ext/wpcrud/WpCrud.php";

class Suppliers extends \WpCrud {
	function init() {
		$this->addField("supplierName")->label("Supplier Name");
	}
  function getLiteral($literalId) {
        switch ($literalId) {
            case "typeName":
                return "Suppliers";
                break;
        }
    }
	function createItem() {
		return new Brch_Suppliers();
	}
	function getItem($id) {
		return Brch_Suppliers::findOne($id);
	}
	function saveItem($item) {
		$item->save();
	}
	function deleteItem($item) {
		$item->delete();
	}
	function getAllItems() {
		return Brch_Suppliers::findAll();
	}
	function setFieldvalue($item, $field, $value){
		$column_exists = Brch_Suppliers::findAllByQuery(
		 	"SELECT * FROM information_schema.COLUMNS 
		 	WHERE TABLE_SCHEMA = 'browncheese' 
		 	AND TABLE_NAME = 'wp_brch_suppliers' 
		 	AND COLUMN_NAME = '$field'");	
		
		if (empty($column_exists)){
			throw new \Exception("$field does not match any column in the database");
		}

		if (is_array($item))
			$item[$field]=$value;

		else if (is_object($item))
			$item->$field=$value;
	}
}