//adresse des images
myPix = new Array("image/Cuisine.jpg","image/Cave.jpg","image/Chambre.jpg")

//changement manuel
thisPic = 0
imgCt = myPix.length - 1
function chgSlide(direction) {
  if (document.images) {
     thisPic = thisPic + direction
     if (thisPic > imgCt) {
        thisPic = 0
     }
     if (thisPic < 0) {
        thisPic = imgCt
     }
     document.Puzzle.src = myPix[thisPic]
  }
}


//prechargement des images de Dreamweaver
function preload() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
  var i,j=d.MM_p.length,a=preload.arguments; for(i=0; i<a.length; i++)
  if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}