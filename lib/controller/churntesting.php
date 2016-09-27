<?php
namespace BrCh_PLUGIN;

include BrCh_PLUGIN_PATH . "ext/wpcrud/WpCrud.php";

class ChurnTesting extends \WpCrud {
	function init() {
		$this->addField("Supplier")
				 ->type("select")
				 ->options($this->getAllSuppliers());

		$this->addField("Supplier")
				 ->type("select")
				 ->options($this->getAllSuppliers());
	}
	function getAllSuppliers(){
		$suppliers = Brch_Suppliers::findAllByQuery('SELECT * FROM  `wp_brch_suppliers`');
		$suppliers_arr = array();
		foreach ($suppliers as $supplier){
			$suppliers_arr += [$supplier->supplierID => $supplier->supplierName ];
		}
		return $suppliers_arr;
	}
  function getLiteral($literalId) {
        switch ($literalId) {
            case "typeName":
                return "Churn Test";
                break;
        }
    }
	function createItem() {
		return new Brch_ChurnTests();
	}
	function getItem($id) {
		return Brch_ChurnTests::findOne($id);
	}
	function saveItem($item) {
		$item->save();
	}
	function deleteItem($item) {
		$item->delete();
	}
	function getAllItems() {
		return Brch_ChurnTests::findAll();
	}
}