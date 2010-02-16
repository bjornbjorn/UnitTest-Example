<style>
<!--
h2.ok {
	color: green;
}

h2.fail {
	color: red;
}
-->
</style>

<?
$passed = 0;
$failed = 0;
foreach($result as $unit_result)
{
	if($unit_result['Result'] != 'Passed')
	{
		$failed++;		
	}
	else
	{
		$passed++;
	}
}

if($failed == 0)
{
	?>
		<h2 class='ok'><?=$passed?> of <?=$passed?> unit tests passed :-)</h2>
	<?
}
else
{
	?>
		<h2 class="fail">Error: <?=$failed?> of <?=($failed+$passed)?> unit test failed!</h2>
	<?
}
?>
<div>
<?=$report?>
</div>