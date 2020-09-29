function isEmpty(value)
{
  return (value == null || value.length === 0);
}

function onlyLetters(str) 
{
  return str.match("^[a-zA-Z ñÑáÁéÉíÍóÓúÚ,.]+$");
}

function onlyLettersAndNumbers(str) 
{
  return str.match("^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚ,.]+$");
}

function onlyNumbersAndGuion(str) 
{
  return str.match("^[0-9 -]+$");
}

function onlyDates(fechainicio, fechafin)
{
    var dt1  = fechainicio.substring(0,2); 
    var mon1 = fechainicio.substring(3,5); 
    var yr1  =fechainicio.substring(6,10); 

    var dt2  = fechafin.substring(0,2); 
    var mon2 = fechafin.substring(3,5); 
    var yr2  = fechafin.substring(6,10); 
    var date1 = new Date(yr1, mon1-1, dt1); 
    var date2 = new Date(yr2, mon2-1, dt2); 

    if(date1 > date2)
    {
        return false;
    }
    else
    {
        return true;
    }


}

 function onlyNumbers(str) 
{
  return str.match("^[0-9]+$");
}

function onlyNumbersAndPoint(str) 
{
  return str.match("^[0-9 .]+$");
}

function onlyNumbersBetween0and100(str) 
{
  if(onlyNumbersAndPoint(str))
  {
      if(str >= 0 && str<= 100)
      {
         return true;
      }
      else
      {
         return false;
      }
  }
  else
  {
     return false;
  }
}

function onlyNumbersBetween0and50(str) 
{
  if(onlyNumbersAndPoint(str))
  {
      if(str >= 0 && str<= 50)
      {
         return true;
      }
      else
      {
         return false;
      }
  }
  else
  {
     return false;
  }
}

function onlyNumbersBetween0and25(str) 
{
  if(onlyNumbersAndPoint(str))
  {
      if(str >= 0 && str<= 25)
      {
         return true;
      }
      else
      {
         return false;
      }
  }
  else
  {
     return false;
  }
}