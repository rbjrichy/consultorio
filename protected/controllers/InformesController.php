<?php

class InformesController extends Controller
{
    

    public $layout='//layouts/informes';  

        //public $layout='//layouts/tabla';
	public function actionIndex()
	{
            $model = new Informe;
  
            $this->render('index',array('model'=>$model));
	}
        
    //reportes
    public function actionReportes()
    {
        $model = new Informe;

          if(isset($_POST['Informe']))
          {
                $model->attributes = $_POST['Informe'];
                // validate user input and redirect to the previous page if valid
                
                    //var_dump($model);
                    if($model->idtiporeporte == 1 || $model->idtiporeporte == '1')//pagos realizados
                    {
                        $sql="
                            SELECT fechahoraregistro as fecha_pago, numeropieza, costo, acuenta, saldo
                            FROM pago
                            WHERE idpaciente = '".$model->idpaciente."' ORDER BY id desc";
                    }

                    elseif($model->idtiporeporte == 2 || $model->idtiporeporte == '2')//reporte de pagos
                    {
                        $sql="
                            SELECT SUM(acuenta) AS monto_pagado,
                            SUM(saldo) AS monto_adeudado
                            FROM pago 
                            WHERE idpaciente = '".$model->idpaciente."'";
                    }

                    elseif($model->idtiporeporte == 3 || $model->idtiporeporte == '3')//recaudaciones por fechas
                    {
                      $sql="
                      SELECT SUM(acuenta) as total_recaudado, SUM(saldo) total_saldo
                      FROM pago
                      WHERE fechahoraregistro >= '".$model->fechainicio."' and fechahoraregistro <= '".$model->fechafin."'";
                    }

                    elseif($model->idtiporeporte == 4 || $model->idtiporeporte == '4')//grafico recaudaciones por programa
                    {
                      $sql="
                      SELECT t.nombres as descripcion, SUM(p.acuenta) AS valor
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id
                      GROUP BY pac.id
                      ORDER BY pac.id
                      ";

                      $connection = Yii::app()->db;
                      $command=$connection->createCommand($sql);
                      $resultados=$command->queryall();

                      $this->render('grafico', array('resultados'=>$resultados, 'titulo'=>$model->titulo));
                      exit;
                    }

                    elseif($model->idtiporeporte == 5 || $model->idtiporeporte == '5')//lista pacientes por monto adeudado
                    {
                      $sql="
                      SELECT t.nombres, t.apellidopaterno, t.apellidomaterno, SUM(p.saldo) AS monto_adeudado
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id 
                      GROUP BY pac.id
                      ORDER BY monto_adeudado desc
                      ";
                    }

                    elseif($model->idtiporeporte == 6 || $model->idtiporeporte == '6')//lista pacientes y sus pagos
                    {
                      $sql="
                      SELECT t.apellidopaterno, t.nombres, SUM(p.acuenta) AS monto_pagado
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id
                      GROUP BY pac.id
                      ORDER BY t.apellidopaterno
                      ";
                    }

                    elseif($model->idtiporeporte == 7 || $model->idtiporeporte == '7')//lista de pacientes
                    {
                      $sql="
                      SELECT pac.apellidopaterno, pac.nombres, pac.direccion, pac.numerocelular
                      FROM usuario as pac
                      WHERE pac.idpaciente = 1          
                      ORDER BY pac.apellidopaterno
                      ";
                    }


                    //funciones genericas
                    $connection = Yii::app()->db;
                    $command=$connection->createCommand($sql);
                    $resultados=$command->queryall();

                    if($model->idformatoreporte == 1 || $model->idformatoreporte == '1')//html                   
                    {
                        $objPHPhtml = $this->formarhtmldinamico($resultados, $model->titulo); 
                        echo CHtml::decode($objPHPhtml);
                    }
                    elseif ($model->idformatoreporte == 2 || $model->idformatoreporte == '2')//pdf 
                    {
                        $objPHPpdf = $this->formarpdfdinamico($resultados, $model->titulo); 
                        
                        $pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');
                        $mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
                        $mpdf->WriteHTML($objPHPpdf);
                        $mpdf->Output();
                        exit;                             
                    }
                    elseif($model->idformatoreporte == 3 || $model->idformatoreporte == '3')//excel
                    {
                        $objPHPExcel=$this->formarexceldinamico($resultados); 
                                                            
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="reporte'.date('d_m_Y H:i').'.xls"');
                        header('Cache-Control: max-age=0');
                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                        $objWriter->save('php://output');
                    }
                    /*
                    elseif($model->idformatoreporte == 4 || $model->idformatoreporte == '4')//grafico
                    {
                        $this->render('grafico', array('resultados'=>$resultados));
                    }
                    */


          }
        
    }
public function actionIndex_doctor()
  {
            $model = new Informe;
  
            $this->render('index_doctor',array('model'=>$model));
  }
        
    //reportes
    public function actionReportes_doctor()
    {
        $model = new Informe;

          if(isset($_POST['Informe']))
          {
                $model->attributes = $_POST['Informe'];
                // validate user input and redirect to the previous page if valid
                
                    //var_dump($model);
                    if($model->idtiporeporte == 1 || $model->idtiporeporte == '1')//pagos realizados
                    {
                        $sql="
                            SELECT fechahoraregistro as fecha_pago, numeropieza, costo, acuenta, saldo
                            FROM pago
                            WHERE idpaciente = '".$model->idpaciente."' ORDER BY id desc";
                    }

                    elseif($model->idtiporeporte == 2 || $model->idtiporeporte == '2')//reporte de pagos
                    {
                        $sql="
                            SELECT SUM(acuenta) AS monto_pagado,
                            SUM(saldo) AS monto_adeudado
                            FROM pago 
                            WHERE idpaciente = '".$model->idpaciente."'";
                    }

                    elseif($model->idtiporeporte == 3 || $model->idtiporeporte == '3')//recaudaciones por fechas
                    {
                      $sql="
                      SELECT SUM(acuenta) as total_recaudado, SUM(saldo) total_saldo
                      FROM pago
                      WHERE fechahoraregistro >= '".$model->fechainicio."' and fechahoraregistro <= '".$model->fechafin."'";
                    }

                    elseif($model->idtiporeporte == 4 || $model->idtiporeporte == '4')//grafico recaudaciones por programa
                    {
                      $sql="
                      SELECT t.nombres as descripcion, SUM(p.acuenta) AS valor
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id
                      GROUP BY pac.id
                      ORDER BY pac.id
                      ";

                      $connection = Yii::app()->db;
                      $command=$connection->createCommand($sql);
                      $resultados=$command->queryall();

                      $this->render('grafico', array('resultados'=>$resultados, 'titulo'=>$model->titulo));
                      exit;
                    }

                    elseif($model->idtiporeporte == 5 || $model->idtiporeporte == '5')//lista pacientes por monto adeudado
                    {
                      $sql="
                      SELECT t.nombres, t.apellidopaterno, t.apellidomaterno, SUM(p.saldo) AS monto_adeudado
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id 
                      GROUP BY pac.id
                      ORDER BY monto_adeudado desc
                      ";
                    }

                    elseif($model->idtiporeporte == 6 || $model->idtiporeporte == '6')//lista pacientes y sus pagos
                    {
                      $sql="
                      SELECT t.apellidopaterno, t.nombres, SUM(p.acuenta) AS monto_pagado
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id
                      GROUP BY pac.id
                      ORDER BY t.apellidopaterno
                      ";
                    }


                    //funciones genericas
                    $connection = Yii::app()->db;
                    $command=$connection->createCommand($sql);
                    $resultados=$command->queryall();

                    if($model->idformatoreporte == 1 || $model->idformatoreporte == '1')//html                   
                    {
                        $objPHPhtml = $this->formarhtmldinamico($resultados, $model->titulo); 
                        echo CHtml::decode($objPHPhtml);
                    }
                    elseif ($model->idformatoreporte == 2 || $model->idformatoreporte == '2')//pdf 
                    {
                        $objPHPpdf = $this->formarpdfdinamico($resultados, $model->titulo); 
                        
                        $pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');
                        $mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
                        $mpdf->WriteHTML($objPHPpdf);
                        $mpdf->Output();
                        exit;                             
                    }
                    elseif($model->idformatoreporte == 3 || $model->idformatoreporte == '3')//excel
                    {
                        $objPHPExcel=$this->formarexceldinamico($resultados); 
                                                            
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="reporte'.date('d_m_Y H:i').'.xls"');
                        header('Cache-Control: max-age=0');
                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                        $objWriter->save('php://output');
                    }
                    /*
                    elseif($model->idformatoreporte == 4 || $model->idformatoreporte == '4')//grafico
                    {
                        $this->render('grafico', array('resultados'=>$resultados));
                    }
                    */


          }
        
    }


    public function actionIndex_secre()
  {
            $model = new Informe;
  
            $this->render('index_secre',array('model'=>$model));
  }
        
    //reportes
    public function actionReportes_secre()
    {
        $model = new Informe;

          if(isset($_POST['Informe']))
          {
                $model->attributes = $_POST['Informe'];
                // validate user input and redirect to the previous page if valid
                
                    //var_dump($model);
                    if($model->idtiporeporte == 1 || $model->idtiporeporte == '1')//pagos realizados
                    {
                        $sql="
                            SELECT fechahoraregistro as fecha_pago, numeropieza, costo, acuenta, saldo
                            FROM pago
                            WHERE idpaciente = '".$model->idpaciente."' ORDER BY id desc";
                    }

                   
                    elseif($model->idtiporeporte == 5 || $model->idtiporeporte == '5')//lista pacientes por monto adeudado
                    {
                      $sql="
                      SELECT t.nombres, t.apellidopaterno, t.apellidomaterno, SUM(p.saldo) AS monto_adeudado
                      FROM paciente as pac
                      JOIN usuario as t ON pac.idusuario= t.id
                      LEFT JOIN pago as p ON p.idpaciente = pac.id 
                      GROUP BY pac.id
                      ORDER BY monto_adeudado desc
                      ";
                    }

                   

                    //funciones genericas
                    $connection = Yii::app()->db;
                    $command=$connection->createCommand($sql);
                    $resultados=$command->queryall();

                    if($model->idformatoreporte == 1 || $model->idformatoreporte == '1')//html                   
                    {
                        $objPHPhtml = $this->formarhtmldinamico($resultados, $model->titulo); 
                        echo CHtml::decode($objPHPhtml);
                    }
                    elseif ($model->idformatoreporte == 2 || $model->idformatoreporte == '2')//pdf 
                    {
                        $objPHPpdf = $this->formarpdfdinamico($resultados, $model->titulo); 
                        
                        $pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');
                        $mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
                        $mpdf->WriteHTML($objPHPpdf);
                        $mpdf->Output();
                        exit;                             
                    }
                    elseif($model->idformatoreporte == 3 || $model->idformatoreporte == '3')//excel
                    {
                        $objPHPExcel=$this->formarexceldinamico($resultados); 
                                                            
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="reporte'.date('d_m_Y H:i').'.xls"');
                        header('Cache-Control: max-age=0');
                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                        $objWriter->save('php://output');
                    }
                    /*
                    elseif($model->idformatoreporte == 4 || $model->idformatoreporte == '4')//grafico
                    {
                        $this->render('grafico', array('resultados'=>$resultados));
                    }
                    */


          }
        
    }



        private function formarexceldinamico($array)
        {
        $objPHPExcel = new PHPExcel();
        $objReader = new PHPExcel_Reader_Excel2007(); 
        
        $arraymostrar = array();

        if(count($array) > 0)
        {
           $objeto=$array[0];
        
          foreach($objeto as $key => $val)
          {
              $arraymostrar[$key] = $key;
          }
        }

        $arrayfinal[] = $arraymostrar;
        

        for ($j=0;$j<count($array);$j++)
        {
            
            $objeto=$array[$j];
            
            foreach($objeto as $key => $val)
            {
              $valor = $val;

               if (strpos($valor,'vacio') !== false || strpos($valor,'nulo') !== false)
               {
                  $arraymostrar[$key] = " ";
               }
               else if ($valor == '0')
               {
                  $arraymostrar[$key] = "0";
               }
               else
               {
                  if (strpos($key,'fecha') !== false)
                  {
                    $arraymostrar[$key] = Yii::app()->utiles->formatearFechaHora($valor);
                  }
                  else
                  {
                    $arraymostrar[$key] = $valor;
                  }
               }  
            }
            
            $arrayfinal[] = $arraymostrar;

        }
        
        $objPHPExcel->getActiveSheet()->fromArray($arrayfinal, null, 'A1');
        
        // Rename worksheet
         $objPHPExcel->getActiveSheet()->setTitle('Reporte');

        ob_end_clean();
        ob_start();
        return $objPHPExcel;  

        }

        private function formarpdfdinamico($array, $titulo)
        {
            $html='
                <table align="center" width="100%" border="0">
                <tr>
                  <td align="center"><img src="images/arribaimprimirpdf.png" /></td>
                </tr>
                <br>
                
                <br>
                <tr>
                <td align="center"><h3> '.$titulo.'</h3></td>
                </tr>
                <br>
                
                <tr>
                <td><h6> Fecha/Hora: '.date('d/m/Y  H:i').'</h6></td>
                </tr>
              </table>
              <br> 
            <table style="border-collapse: collapse" border="1" width="100%" align="center">
                <tr>';

        if(count($array) > 0)
        {
           $objeto=$array[0];
        
          foreach($objeto as $key => $val)
          {
              $html.='<Td style="font-weight:bold" align="center">'.$key.'</Td>';
          }
          $html.='</tr>';
        }

        for ($j=0;$j<count($array);$j++)
        {
        $html.='<tr >';    
            $objeto=$array[$j];
            
            foreach($objeto as $key => $val)
            {
              $valor = $val;

               if (strpos($valor,'vacio') !== false || strpos($valor,'nulo') !== false)
               {
                  $html.='<td align="center"></td>';
               }
               else
               {
                  if (strpos($key,'fecha') !== false)
                  {
                    $html.='<td align="center">'.Yii::app()->utiles->formatearFechaHora($valor).'</td>';
                  }
                  else
                  {
                    $html.='<td align="center">'.$valor.'</td>';
                  }
               }  
            }
        $html.='</tr>';
        }
        
        $html.='
             </center>
             </table>
             </font>
             <hr>
             
             </table>
             </body>
          </html>';
        
        return $html;  

        }
          
        private function formarhtmldinamico($array, $titulo)
        {
            $html='
                <table align="center" width="100%" border="0">
                <tr>
                  <td align="center"><img src="images/arribaimprimirpdf.png" /></td>
                </tr>
                <br>
                
                <br>
                <tr>
                <td align="center"><h3> '.$titulo.'</h3></td>
                </tr>
                <br>
                
                <tr>
                <td><h6> Fecha/Hora: '.date('d/m/Y  H:i').'</h6></td>
                </tr>
              </table>
              <br> 
            <table style="border-collapse: collapse" border="1" width="100%" align="center">
                <tr style="color:#FFF;background: #7AB3D4">';

        if(count($array) > 0)
        {
           $objeto=$array[0];
        
          foreach($objeto as $key => $val)
          {
              $html.='<Td style="font-weight:bold" align="center">'.$key.'</Td>';
          }
          $html.='</tr>';
        }

        for ($j=0;$j<count($array);$j++)
        {
            if ($j%2==0) 
            { 
                $html.='<tr style="background-color:#F8F8F8">';
            } 
            else 
            {
                $html.='<tr style="background-color:#E5F1F4">';
            }
            
            $objeto=$array[$j];
            
            foreach($objeto as $key => $val)
            {
              $valor = $val;

               if (strpos($valor,'vacio') !== false || strpos($valor,'nulo') !== false)
               {
                  $html.='<td align="center"></td>';
               }
               else
               {
                  if (strpos($key,'fecha') !== false)
                  {
                    $html.='<td align="center">'.Yii::app()->utiles->formatearFechaHora($valor).'</td>';
                  }
                  else
                  {
                    $html.='<td align="center">'.utf8_decode($valor).'</td>';
                  }
               }  
            }
        $html.='</tr>';
        }
        
        $html.='
             </center>
             </table>
             </font>
             <hr>
             
             </table>
             </body>
          </html>';
        
        return $html;  

        }
}
?>