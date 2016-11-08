<?php

class DB
{
	private static $db = null;

	private function __construct() { }
	private function __clone() { }

	public static function getConnection() 
	{
		if( DB::$db === null )
	    {
	    	try
	    	{
	    		// Prilagodite donji string za spajanje na bazu.
		    	DB::$db = new PDO( "mysql: host=rp2.studenti.math.hr; dbname=klaric; charset=utf8", 'student', 'some code' );
		    	DB::$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		    catch( PDOException $e ) { exit( 'PDO Error: ' . $e->getMessage() ); }
	    }
		return DB::$db;
	}
}

?>
