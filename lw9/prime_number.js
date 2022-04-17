"use strict";
let data = prompt('Введите положительное число или массив чисел');
function ConditionCheck(data){
	let dataArray = [];
	if (Boolean(data) === false){
		return false;
	}
	if ((data[0] == '[') && (data[data.length - 1] == ']')){
		data = data.substring(0, data.length - 1); //удаляем последний символ: ]
		data = data.slice(1); //удаляем первый символ: [
		if (data.includes(' ,')){
			dataArray = data.split(' ,');//проверяем,как разделены числа в строке
		} else{ 
		    if (data.includes(',')){
			  dataArray = data.split(',');
		    } else{
			    dataArray = data.split();
		      }
		  }
		for(let i = 0; i <= (dataArray.length - 1); i++){//проверяем элементы массива
		if ((Number.isInteger(Number(dataArray[i])) === false) || ((Number(dataArray[i])) <= 1)){
				return false; 
			} 
		}
        return dataArray;		
	} else{
		if ((Number.isInteger(Number(data)) === false) || ((Number(data)) <= 1)){ //проверяем, число ли это
		       return false;
			}
			else{return data;}
	  }
}
function isPrimeNumber(data){
	let countDenominator = 1;
	if (typeof data == 'object'){
		for(let i = 0; i <= (data.length - 1); i++){
		    for(let denominator = 1; denominator <= Math.ceil(Math.sqrt(data[i])); denominator++){
				if (data[i]%denominator == 0){
					countDenominator++;
				}
			}
            if (countDenominator > 2){
				console.log(data[i], ' не является простым числом');
			} else{
				console.log(data[i], ' - простое число');
			}
		}
	} else{
		for(let denominator = 1; denominator <= Math.ceil(Math.sqrt(data)); denominator++){
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
}
if (ConditionCheck(data) != false){
	data = ConditionCheck(data);
	isPrimeNumber(data);
	} else{
		console.log('Введенная строка не удолетворяет заданным условиям');
	}