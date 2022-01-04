<?php

if ($_POST['ac']=='jx')
{
	include ('asset/datajx.php');
	$url=$_POST['url'];
	if(empty($url))
	{
		header('location: ./index.php');
	}
	$key1="https://svip.aiaine.com/home/api?type=ys&uid=".$yzmjx['jx']['set']['uid']."&key=".$yzmjx['jx']['set']['key1']."&url=";
	$key2="https://www.aiaine.com/api/?key=".$yzmjx['jx']['set']['key2']."&url=";
	$key3 = $yzmjx['jx']['bak'];
	if ($yzmjx['jx']['state'])
	{
		if($yzmjx['jx']['set']['group'] == '1')
		{
			$data = file_get_contents($key1.$url);
			$urldata = json_decode($data, true);
			if($urldata['code']=='200')
			{
				echo $data;
			}
			else
			{
				$data = file_get_contents($key3.$url);
				$urldata = json_decode($data, true);
				if($urldata['code']=='200')
				{
					echo $data;
				}
				else
				{
					echo '{"code": 233}';
				}
			}
		}
		if($yzmjx['jx']['set']['group'] == '2')
		{
			$data = file_get_contents($key2.$url);
			$urldata = json_decode($data, true);
			if($urldata['code']=='200')
			{
				echo $data;
			}
			else
			{
				$data = file_get_contents($key3.$url);
				$urldata = json_decode($data, true);
				if($urldata['code']=='200')
				{
					echo $data;
				}
				else
				{
					echo '{"code": 233}';
				}
			}
		}
		elseif($yzmjx['jx']['set']['group'] == '3')
		{
			$data = file_get_contents($key3.$url);
			$urldata = json_decode($data, true);
			if($urldata['code']=='200')
			{
				echo $data;
			}
			else
			{
				echo '{"code": 233}';
			}
		}
	}
	else
	{
		echo '{"code": 233}';
	}
}
else
{
	include ('asset/data.php');
	$json = [ 'code' => 1, 'data' => $yzm ];
	die(json_encode($json));
}
?><?php
?>