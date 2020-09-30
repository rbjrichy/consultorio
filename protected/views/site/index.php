<?php
if (Yii::app()->user->isGuest)
{ 
?>
<center>
    <h3>INTEGRAL FAMILIAR </h3>
       
        <h4>
       
        <BR>
        <BR> 
        <BR>
        <BR>
	<?php //echo CHtml::encode(Yii::app()->name); 
        echo "Versión de Yii ".Yii::getVersion(); 
        // print_r(Yii::app()->theme->baseUrl);
    ?></h4><br>
       
        
        
         <br><h1>Consultas:<br><br></h1> Llamar al teléfono/Fax: 464-52196 Celulares: 67629904 
         <br>
         <br>
         Dirección: Vaca Guzman #198 (Sucre - Bolivia). Email: -------
</center>

</br>

<?php
} 
 elseif (Yii::app()->session['idtipousuario']=='1') //administrador
{
	$this->redirect('index.php?r=usuario/admin'); 
?>
    <p>&nbsp;</p>
<?php 
}
elseif (Yii::app()->session['idtipousuario']=='2') //doctor
{
	$this->redirect('index.php?r=paciente/admin'); 
?>
    <p>&nbsp;</p>
<?php 
} 
 elseif (Yii::app()->session['idtipousuario']=='3') //secretaria
{
    $this->redirect('index.php?r=usuario/registraradminsecretaria'); 
?>
    <p>&nbsp;</p>
<?php 
}
 elseif (Yii::app()->session['idtipousuario']=='4') //paciente
{
    $this->redirect('index.php?r=reserva/admin_reservapaciente'); 
?>
    <p>&nbsp;</p>
<?php 
}
 else
{
    $this->redirect ('index.php?r=site/index');
?>
    <p>&nbsp;</p>
<?php 
} 
?>
