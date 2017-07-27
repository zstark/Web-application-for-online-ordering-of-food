window.__ONLOADMETHODS = [];
window.__ONRESIZEMETHODS = [];
document.__ONLOADMETHODS = [];



function centerFloatThumbnails(){
	var UNFIXED_CONTENT = document.querySelectorAll('content.unfixed');
	var x;
	for(var i=0; i<UNFIXED_CONTENT.length; i++){
		x = UNFIXED_CONTENT[i]
		if(x){
			var fixer = x.getElementsByTagName("fixer");
			if(fixer){
				fixer = fixer[0];
				var w = Math.floor(x.clientWidth/174)*174;
				fixer.style.width = w+"px";
			}
		}
	}
}

window.__ONLOADMETHODS.push(centerFloatThumbnails);
window.__ONRESIZEMETHODS.push(centerFloatThumbnails);

document.__ONLOADMETHODS.push(centerFloatThumbnails);