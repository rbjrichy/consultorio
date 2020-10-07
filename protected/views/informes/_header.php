<div class="header">
<table width="100%">
	<tr>
		<td width="15%"><img src="./images/logo-clinica.png" alt="logo"></td>
		<td width="70%" style="text-align: center">
			<h3><?php echo $model->titulo; ?></h3>
		</td>
		<td width="15%" style="font-size: .8em">
			<span class="pull-right">
				 <strong>Usuario</strong><br /> <?php echo Yii::app()->user->name; ?><br />
				 <strong>Fecha</strong><br /> <?php echo date('d/m/Y H:i') ?>
			</span>
		</td>
	</tr>
</table>
</div>
