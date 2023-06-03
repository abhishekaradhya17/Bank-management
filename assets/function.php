<?php 
function setBalance($amount,$process,$accountNo)
{
	$conn = new mysqli('localhost','root','','mybank');
	$array = $conn->query("select * from useraccounts where accountNo='$accountNo'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return $conn->query("update useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return $conn->query("update useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function setOtherBalance($amount,$process,$accountNo)
{
	$conn = new mysqli('localhost','root','','mybank');
	$array = $conn->query("select * from otheraccounts where accountNo='$accountNo'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return $conn->query("update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return $conn->query("update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function makeTransaction($action,$amount,$other)
{
	$conn = new mysqli('localhost','root','','mybank');
	if ($action == 'transfer')
	{
		return $conn->query("insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$_SESSION[userId]')");
	}
	if ($action == 'withdraw')
	{
		return $conn->query("insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$_SESSION[userId]')");
		
	}
	if ($action == 'deposit')
	{
		return $conn->query("insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$_SESSION[userId]')");
		
	}
}
function makeTransactionCashier($action,$amount,$other,$userId)
{
	$conn = new mysqli('localhost','root','','mybank');
	if ($action == 'transfer')
	{
		return $conn->query("insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$userId')");
	}
	if ($action == 'withdraw')
	{
		return $conn->query("insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$userId')");
		
	}
	if ($action == 'deposit')
	{
		return $conn->query("insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$userId')");
		
	}
}
 ?>