console.log('Введите положительное целое число больше единицы или массив таких чисел');
function ConditionCheck(data){
	if (Boolean(data) === false){
		return false;
	}
	if (typeof data == 'object'){
		for(let i = 0; i <= (data.length - 1); i++){//проверяем элементы массива
		if ((Number.isInteger(Number(data[i])) === false) || ((Number(data[i])) <= 1)){
				return false; 
			} 
		}
        return data;		
	} else{
		if ((Number.isInteger(Number(data)) === false) || ((Number(data)) <= 1)){ //проверяем, число ли это
		       return false;
			}
			else{return data;}
	  }
}
function isPrimeNumber(data){
	let countDenominator = 2;
	if (ConditionCheck(data) != false){
	  data = ConditionCheck(data);
	  if (typeof data == 'object'){
		  for(let i = 0; i <= (data.length - 1); i++){
		      for(let denominator = 2; denominator <= Math.ceil(Math.sqrt(data[i])); denominator++){
				  if (data[i]%denominator == 0){
					  countDenominator++;
					  
				  }
			  }
              if (countDenominator > 2){
				  console.log(data[i], ' не является простым числом');
				  countDenominator = 2;
			  } else{
				  console.log(data[i], ' - простое число');
			  }
		  }
	  } else{
		  for(let denominator = 2; denominator <= Math.ceil(Math.sqrt(data)); denominator++){
				  if (data%denominator == 0){
					  countDenominator++;
				  }
			  }
          if (countDenominator > 2){
		  console.log(data, ' не является простым');
	      } else {
		      console.log(data, '- число простое');
	           }			
	  }
	} else {
		console.log('Введенная строка не удолетворяет заданным условиям');
		}
	
}
