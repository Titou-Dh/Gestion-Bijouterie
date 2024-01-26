function alphanum(ch){
    var a = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789"
	for (var i = 0 ; i <= ch.length ; i++)
	{
		if (a.indexOf(ch.charAt(i)) == -1)
		{
			return false;
		}
	}
	return true;
}
function verifcat() {
    var cat = document.getElementById("cat").value;
    if(!(alphanum(cat) && cat.length!=0))
    {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier la catégorie!'
        })
        return false;
    }
}
function verifajout() {
    var pu = document.getElementById("pu").value;
    var ns = document.getElementById("ns").value;
    var pd = document.getElementById("pd").value;
    var poi = document.getElementById("poi").value;
    var qte = document.getElementById("qt").value;
    if (document.getElementById("categorie").value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Sélectionner une catégorie SVP!'
        })
        return false;
    }
    else if (document.getElementById("karat").value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Sélectionner un Carat SVP!'
        })
        return false;
    }
    else if(!(alphanum(ns) && ns.length!=0))
    {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier le numéro de série!'
        })
        return false;
    }
    else if (isNaN(poi) || poi<= 0)  {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier le poids SVP!'
        })
        return false;
    }
    else if(!(alphanum(pd) && pd.length!=0))
    {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier le libellé!'
        })
        return false;
    }
    else if (qte <= 0 ) {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier la quantité SVP!'
        })
        return false;
    }
    else if (pu <=0 || isNaN(pu)) {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier le prix SVP!'
        })
        return false;
    }

}
function verifvente() {
    var pv = document.getElementById("pv").value;
    var pu = document.getElementById("pu").value;
    var qv = document.getElementById("qv").value;
    var qte = Number(document.getElementById("qte").value);
    if ((pv < pu) || (isNaN(pv) == true)) {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Vérifier le prix de vente SVP!'
        })
        return false;
    }
    if (qv > qte) {
        Swal.fire({
            icon: 'error',
            title: 'Désolé',
            text: 'Stock non disponible!!!'
        })
        return false;
    }

}
/*function copyToClipboard() {
    var copyText = document.getElementById("cop");
    copyText.select();
    document.execCommand("copy");
    Swal.fire({
        icon: 'success',
        title: 'Copie',
        text: 'Copier avec succée'
    })
}*/






