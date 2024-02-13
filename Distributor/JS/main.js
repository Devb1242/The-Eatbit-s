let valueDisplays=document.querySelectorAll(".num");
let interval=4000;

valueDisplays.forEach((valueDisplay)=>{
	
	let endValue=parseInt(valueDisplay.getAttribute("data-val"));
	
	let startValue=endValue-600;
	
	let duration=Math.floor(interval / endValue);
	let counter=setInterval(function(){
		startValue += 1;
		valueDisplay.textContent=startValue.toLocaleString();
		if(startValue == endValue){
			clearInterval(counter);
		}
	},duration);
});

let valueDisplays2=document.querySelectorAll(".smNum");
let interval2=4000;

valueDisplays2.forEach((valueDisplay2)=>{
	
	let endValue2=parseInt(valueDisplay2.getAttribute("data-val"));
	
	let startValue2=0;
	
	let duration2=Math.floor(interval2 / endValue2);
	let counter2=setInterval(function(){
		startValue2 += 1;
		valueDisplay2.textContent=startValue2;
		if(startValue2 == endValue2){
			clearInterval(counter2);
		}
	},duration2);
});