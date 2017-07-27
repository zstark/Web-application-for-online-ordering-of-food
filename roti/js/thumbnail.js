function fixThumbnails(){
	var elm = document.querySelectorAll('.thumbnail.image:not(.heading)');
	for(var i=0;i<elm.length;i++){
		elm[i].style.height = (elm[i].getElementsByTagName("img")[0].clientHeight - 20)+"px";
	}
	elm = document.querySelectorAll('.thumbnail.unfixed');
	var x
	var y;
	for(var i=0;i<elm.length;i++){
		y = elm[i].querySelectorAll('.thumbnail-cover');
		x = elm[i].querySelectorAll('.thumbnail-text');
		x=(x[0].clientHeight+20)+"px";
		y=y[0];
		y.style.height = x;
		elm[i].style.height = x;
	}
}
window.__ONLOADMETHODS.push(fixThumbnails);
window.__ONRESIZEMETHODS.push(fixThumbnails);