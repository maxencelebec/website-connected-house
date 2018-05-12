var Images = new Array('Cave.jpg', 'Chambre.jpg');
var TimeRate=3000;
var Pointeur=0;

function Diaporama() {
    
    var d = new Date();
    var n = d.getTime();
    var nbImages = Images.length;
	Pointeur++;
	
	if (Pointeur=nbImages+1) {
	    Pointeur=0;
	}
	
	var element = Images[Pointeur];
	var m = d.getTime();
	
	while (m-n<TimeRate) {
	    document.getElementById('element') = element;
	    m = d.getTime();
	}
	Diaporama();
}