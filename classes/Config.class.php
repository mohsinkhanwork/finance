<?php

/*
	* All required information
*/

class Config
{
	/* Website Information */
	const webTitle					= "Finance Administration";
	const webURL					= "http://localhost/finance/";
	/* -------------------- */
    
	/* Storage Information */
	const storageDocument			= "images/";
	/* -------------------- */
    
	/* Database Information */
	const dbHost					= "localhost";
	const dbUser					= "root";
	const dbPassword				= "";
	const dbDatabaseName			= "finance";
	/* -------------------- */

	/* Database Tables Information */
	const tbCreated					= "date_created";
	const tbModified				= "date_modified";
	/* |||||||||||||||||||||||||||||||||||||||||||||||||| */
	const tbU						= "users";
	const tbUUID					= "uid";
	const tbUUsername				= "username";
	const tbUEmail					= "email";
	const tbUBalance				= "balance";
	const tbUAccountCurrency		= "Account_Curreny";
	const tbUPass					= "password";
	const tbUAddress    			= "address";
	const tbUPhone      			= "phone";
	const tbUCity					= "city";
	const tbUCountry				= "country";
	const tbUState					= "state";
	const tbUReason 				= "reason";
	const tbUStatus					= "status";
	const tbUPaddress				= "Proof_address";
	const tbUPidentification		= "Proof_identification";
	const tbUPfinance				= "Proof_finance";
	const tbUActivate				= "activate";
	const tbUAccountType			= "AccountType";
	const tbUDatejoined				= "date_joined";
	const tbUType				    = "type";
	/* |||||||||||||||||||||||||||||||||||||||||||||||||| */


	const tbT						= "transferform";
	const tbTUID				 	= "uid";
	const tbTAmount					= "amount";
	const tbTBeneficiaryName		= "beneficiary_name";
	const tbTBenificiaryBank		= "benificiary_bank";
	const tbTAccountNumber 			= "account_number";
	const tbTIbanCode				= "sort_swift_iban_code";
	// const tbTReason 				= "reason";
	// const tbTStatus				= "status";
	const tbTPhone      			= "phone";
	const tbTCity					= "city";
	const tbTCountry				= "country";
	const tbTPendingTransfer		= "pending_transfer";
	const tbTState					= "state";
	const tbTEmail					= "email";
	const tbTDatejoined				= "date_joined";

    
    
    
    
    
	/* |||||||||||||||||||||||||||||||||||||||||||||||||| */

	/* -------------------- */

	/* -------------------- */


    
	/* Reservation period of room in days */
	
	/* -------------------- */

    
	/* Social Information */
	const socialEmail					= "";
	const socialPhone					= "";
	const socialAddress					= "";
	/* -------------------- */

	/* Temporary Admin Account */
	const adminName					= "admin";
	const adminPassword				= "admin";
	/* -------------------- */

	/* Messages */
	const userLoginErr1				= "Username is required.";
	const userLoginErr2				= "Password is required.";
	const userLoginErr3				= "Username is incorrect.";
	const userLoginErr4				= "Password is incorrect.";
	/* -------------------- */
	/* -------------------- */
}