<?php
namespace BrCh_PLUGIN;

include BrCh_PLUGIN_PATH . 'ext/wprecord/WpRecord.php';

class Brch_Employees extends \WpRecord {
	public static function initialize() {
		self::field("employeeID","integer not null");	
		self::field("firstName","varchar(255) not null");
		self::field("SecondName","varchar(255) not null");
	}
}

class Brch_Suppliers extends \WpRecord {
	public static function initialize() {
		self::field("supplierID","integer not null auto_increment");	
		self::field("supplierName","varchar(255) not null");
	}
}

class Brch_MilkReceivingDetails extends \WpRecord {
	public static function initialize() {
		self::field("receiptID","integer not null ");	
		self::field("supplierID","integer not null");
		self::field("employeeID","varchar(255) not null");
		self::field("timearrived","varchar(255) not null");
		self::field("quantityReceived","int");
	}
}

class Brch_Churns extends \WpRecord {
	public static function initialize() {
		self::field("churnID","integer not null");
		self::field("supplierID","integer not null");		
	}
}

class Brch_ChurnTests extends \WpRecord {
	public static function initialize() {
		self::field("churnTestID","integer not null auto_increment");
		self::field("churnID","integer not null");
		self::field("smell","varchar(255) not null");
		self::field("appearance","varchar(255) not null");
		self::field("temperature","float(4, 2) not null");
		self::field("brixtest","varchar(255) not null");
		self::field("PH_test","varchar(255) not null");
		self::field("accepted","char not null");
		self::field("weight","float(5, 4) not null");
	}
}

function activate_plugin(){
	Brch_Employees::install();
	Brch_Suppliers::install();
	Brch_MilkReceivingDetails::install();
	Brch_Churns::install();
	Brch_ChurnTests::install();
}

function deactivate_wpar_test() {
	Brch_Employees::uninstall();
	Brch_Suppliers::uninstall();
	Brch_MilkReceivingDetails::uninstall();
	Brch_Churns::uninstall();
	Brch_ChurnTests::uninstall();
}
