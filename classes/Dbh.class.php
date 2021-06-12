<?php

class Dbh extends Config
{	
	private $connection		=	null;
	private $host			=	parent::dbHost;
	private $user			=	parent::dbUser;
	private $pwd			=	parent::dbPassword;
	private $dbName			=	parent::dbDatabaseName;
		
	public function __construct()
	{
		try
		{
			/* Database Connection */
			$this->connection = new PDO( 'mysql:host=' . $this->host, $this->user, $this->pwd );
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			/* -------------------- */

			/* Database Creation */
			$this->connection->query('CREATE DATABASE IF NOT EXISTS '.$this->dbName);
			$this->connection->query("use $this->dbName");
			/* -------------------- */
			
			/* Tables Creation */
			$this->connection->query('CREATE TABLE IF NOT EXISTS `' . parent::tbU . '` (
										`' . parent::tbUUID . '`				INT NOT NULL AUTO_INCREMENT,
                                        
										`' . parent::tbUUsername . '`			TEXT NOT NULL,
										`' . parent::tbUPass . '`				TEXT NOT NULL,
										`' . parent::tbUEmail . '`				TEXT NOT NULL,
										`' . parent::tbUBalance . '`			INT NOT NULL,
										`' . parent::tbUAccountCurrency . '`	TEXT NOT NULL,
										`' . parent::tbUAddress . '`			TEXT NOT NULL,
										`' . parent::tbUCity . '`				TEXT NOT NULL,
										`' . parent::tbUCountry . '`		    TEXT NOT NULL,
										`' . parent::tbUState . '`				TEXT NOT NULL,
										`' . parent::tbUPhone . '`				TEXT NOT NULL,
										`' . parent::tbUReason . '`				TEXT NOT NULL,
										`' . parent::tbUPaddress . '`			TEXT NOT NULL,
										`' . parent::tbUPidentification . '`	TEXT NOT NULL,
										`' . parent::tbUPfinance . '`			TEXT NOT NULL,
                                        `' . parent::tbUStatus . '`				TEXT NOT NULL,
										`' . parent::tbUActivate . '`			INT NOT NULL DEFAULT 0,
										`' . parent::tbUAccountType . '`		TEXT NOT NULL,
				                        `' . parent::tbUDatejoined . '`			DATETIME DEFAULT CURRENT_TIMESTAMP,
										`' . parent::tbUType . '`		    	INT NOT NULL,
										`' . parent::tbCreated . '`				DATETIME DEFAULT CURRENT_TIMESTAMP,
										`' . parent::tbModified . '`			DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
										PRIMARY KEY (`' . parent::tbUUID . '`)
										) ENGINE = InnoDB');




			$this->connection->query('CREATE TABLE IF NOT EXISTS `' . parent::tbT . '` (
										`' . parent::tbTUID . '`				INT NOT NULL AUTO_INCREMENT,
                                        `' . parent::tbU . '`					INT,
										`' . parent::tbTAmount . '`				INT NOT NULL,
										`' . parent::tbTBeneficiaryName . '`	TEXT NOT NULL,
										`' . parent::tbTBenificiaryBank . '`	TEXT NOT NULL,
										`' . parent::tbTAccountNumber . '`		INT NOT NULL,
										`' . parent::tbTIbanCode . '`			INT NOT NULL,
										`' . parent::tbTCity . '`				TEXT NOT NULL,
										`' . parent::tbTEmail . '`				TEXT NOT NULL,
										`' . parent::tbTCountry . '`		    TEXT NOT NULL,
										`' . parent::tbTPendingTransfer . '`	TEXT NOT NULL,
										`' . parent::tbTState . '`				TEXT NOT NULL,
										`' . parent::tbTPhone . '`				INT NOT NULL,
				                        `' . parent::tbTDatejoined . '`		    DATETIME DEFAULT CURRENT_TIMESTAMP,
										`' . parent::tbCreated . '`				DATETIME DEFAULT CURRENT_TIMESTAMP,
										`' . parent::tbModified . '`			DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
										PRIMARY KEY (`' . parent::tbTUID . '`),
										FOREIGN KEY (`' . parent::tbU . '`)
										REFERENCES `' . parent::tbU . '` (`' . parent::tbUUID . '`)
										ON DELETE CASCADE
										) ENGINE = InnoDB');

		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}			
	}

	public function Insert( $statement = "" , $parameters = [] )
	{
		try
		{
			$this->executeStatement( $statement , $parameters );
			return $this->connection->lastInsertId();
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	public function Select( $statement = "" , $parameters = [] )
	{
		try
		{
			$stmt = $this->executeStatement( $statement , $parameters );
			return $stmt->fetchAll();

		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());   
		}
	}
	
	public function Update( $statement = "" , $parameters = [] )
	{
		try
		{
			$this->executeStatement( $statement , $parameters );
			return true;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	public function Remove( $statement = "" , $parameters = [] )
	{
		try
		{
			$this->executeStatement( $statement , $parameters );
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	private function executeStatement( $statement = "" , $parameters = [] )
	{
		try
		{
			$stmt = $this->connection->prepare($statement);
			$stmt->execute($parameters);
			return $stmt;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}
}